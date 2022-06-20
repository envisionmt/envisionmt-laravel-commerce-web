<?php


namespace App\Services;


use App\Traits\ConsumeExternalService;

class CurrencyService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume authors service
     * @var string
     */
    public $baseUri;

    /**
     * Authorization secret to pass to book api
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = env('FX_CURRENCY_RATE_URL');
    }

    public function currencies()
    {
        return $this->performRequest('GET', 'currencies');
    }

}
