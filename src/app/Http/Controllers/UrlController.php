<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUrlsRequest;
use App\Jobs\ProcessUrls;
use App\Models\URL;


class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.add_urls');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUrlsRequest $request)
    {
        ProcessUrls::dispatch($request->urls);
        return redirect()->back()->with('status', 'URLs are being processed!');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $urls = URL::with('domain')
        ->when($request->search, function ($query, $search) {
            return $query->where('url', 'like', "%$search%");
        })
        ->orderBy($request->sort_by ?? 'created_at', $request->sort_order ?? 'desc')
        ->paginate(5);

        return view('frontend.show_urls', compact('urls'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
