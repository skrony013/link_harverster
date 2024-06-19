
# Link Harvester
Link Harvester is a simple app that collects links from users. Any user can submit links that are validated and stored by the application. Users can see the submitted (links/domains) and search, and sort those data. The results are displayed in a paginated table.




## Step-01: Setup Laravel Project

#### 01. Create a new laravel project

```bash
composer create-project --prefer-dist laravel/laravel src
```
#### 02. Navigate to the project directory
```bash
cd src
```



## Step-02: Add URLs Page

#### 01. Front-End Design with Alpine.js by cdn

```bash
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

```
### ***Add Urls Page Screenshot 
![App Screenshot](https://ronyahmed.xyz/upload/service/page-01.png)



## Step-03: URL Validation and Processing

#### 01. Implement FormRequest validation to validate the submitted URLs.

```bash
php artisan make:request UrlRequest

```
#### 02. Create a Laravel Job to process the URLs and store them in the database
```bash
php artisan make:Job ProcessUrls
```
#### 03. Finally Process the job
```bash
php artisan queue:work
```


## Step-04 Create the Database Tables

### 1. Define migrations for two tables: domains and urls.

### 2. In the domains table, store the unique base domain names.

### 3. In the urls table, store the URLs along with a foreign key linking to the domains table.

```bash
  public function up() {
    Schema::create('domains', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique();
        $table->timestamps();
    });
}
```

```bash
public function up() {
    Schema::create('urls', function (Blueprint $table) {
        $table->id();
        $table->string('url')->unique();
        $table->foreignId('domain_id')->constrained('domains');
        $table->timestamps();
    });
}
```


## Step-05 Show URLs Page with search, sort and pagination

### ***Show Urls Page Screenshot 

![App Screenshot](https://ronyahmed.xyz/upload/service/page-02.png)



## Step-06 Containerize the Application Using Docker

### 01. Create a Dockerfile in the project root:

```bash 
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www/html

# Copy existing application directory permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
```
### 02. Create a docker-compose.yml in the project root:

```bash
version: '3.8'

services:
  app:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: app
    working_dir: /var/www/html
    volumes:
      - ./src:/var/www/html
    environment:
      - DB_HOST=mysql
      - DB_PORT=3306
      - DB_DATABASE=link_harvester
      - DB_USERNAME=root
      - DB_PASSWORD=password
    networks:
      - app-network

  nginx:
    image: nginx:alpine
    container_name: nginx
    ports:
      - "80:80"
    volumes:
      - ./nginx/conf.d:/etc/nginx/conf.d
      - ./src:/var/www/html
    networks:
      - app-network

  db:
    image: mysql:8.0
    container_name: mysql
    environment:
      MYSQL_ROOT_PASSWORD: password
      MYSQL_DATABASE: link_harvester
    volumes:
      - mysql-data:/var/lib/mysql
    networks:
      - app-network

  redis:
    image: redis:alpine
    container_name: redis
    networks:
      - app-network

  scheduler:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: scheduler
    working_dir: /var/www/html
    command: php artisan schedule:run
    volumes:
      - ./src:/var/www/html
    networks:
      - app-network

volumes:
  mysql-data:

networks:
  app-network:
    driver: bridge
```

### 03. Create an nginx > conf.d > default.conf file in the project root:

```bash
server {
    listen 80;
    index index.php index.html;
    server_name localhost;
    root /var/www/html/public;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_intercept_errors on;
        fastcgi_pass app:9000;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }

    location ~ /\.ht {
        deny all;
    }
}
```
### 04. Build and run the Docker containers:

```bash
docker-compose up --build -d
```
## How to Install and Run the Project

```bash 
1. git clone https://github.com/skrony013/link_harverster.git

2. cp .env.example .env

3. docker-compose up --build -d

4. You can see the project on: http://localhost/
```