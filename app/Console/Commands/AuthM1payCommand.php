<?php


namespace App\Console\Commands;


use App\Services\CommonService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AuthM1payCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'm1pay:auth';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'M1Pay Auth';
    protected $commonService;

    public function __construct(CommonService $commonService)
    {
        parent::__construct();
        $this->commonService = $commonService;
    }

    public function handle()
    {
        try {
            $attributes = [
                'grant_type' => 'client_credentials',
                'client_id' => env('CLIENT_ID_M1PAY'),
                'client_secret' => env('CLIENT_SECRET_M1PAY')
            ];
            $data = $this->commonService->post($attributes, env('OAUTH_URL_M1PAY'));
            $dataJson = json_decode($data);
            Cache::put('OAUTH_KEY', $dataJson->access_token);
        } catch (\Exception $e) {
            Log::error('error_callback', [$e->getMessage()]);
        }

    }
}
