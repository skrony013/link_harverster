<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

use App\Models\Url;
use App\Models\Domain;

class ProcessUrls implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
    */
    protected $urls;
    public function __construct($urls)
    {
        $this->urls = $urls;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Log::info('ProcessUrls job started.');

        $urlsArray = explode("\n", $this->urls);

        foreach ($urlsArray as $url) {
            $url = trim($url);
            // Log::info('Processing URL: ' . $url);

            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $domainName = parse_url($url, PHP_URL_HOST);
                // Log::info('Valid URL: ' . $url . ' with domain: ' . $domainName);

                DB::transaction(function () use ($domainName, $url) {
                    $domain = Domain::firstOrCreate(['name' => $domainName]);
                    // Log::info('Domain stored: ' . $domain->name);

                    Url::updateOrCreate(['url' => $url, 'domain_id' => $domain->id]);
                    // Log::info('URL stored: ' . $url);
                });
            }
        }

        // Log::info('ProcessUrls job finished.');
    }
}
