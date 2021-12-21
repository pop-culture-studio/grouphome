<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Client\Response;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DownloadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $responses = Http::pool(function (Pool $pool) {
            return collect(config('pref'))
                ->reject(fn ($pref) => empty($pref['sheets']))
                ->map(fn (
                    $pref,
                    $key
                ) => $pool->as($key)->get('https://docs.google.com/spreadsheets/d/'.$pref['sheets'].'/export?format=csv'))
                ->toArray();
        });

        collect($responses)->each(function (Response $response, $key) {
            if ($response->successful()) {
                info('Download : '.$key);

                Storage::put("csv/$key.csv", $response->body());
            } else {
                logger()->error($response->reason());
            }
        });
    }
}
