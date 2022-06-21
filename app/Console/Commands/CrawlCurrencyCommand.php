<?php


namespace App\Console\Commands;


use App\Notifications\AlertErrorNotification;
use App\Services\CurrencyService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CrawlCurrencyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawl Currency';
    protected $currencyService;


    public function __construct(CurrencyService $currencyService)
    {
        parent::__construct();
        $this->currencyService = $currencyService;
    }

    public function handle()
    {
        try {
            $currencyName = env('CURRENCY_ORIGIN', 'CNY');
            $response = json_decode($this->currencyService->currencies());
            foreach ($response->data as $item) {
                $key = $currencyName . ',' . $item->currency;
                Cache::put($key, $item->rate);
            }

        } catch (\Exception $e) {
            Log::error('error_currency', [$e->getMessage()]);
        }

    }
}
