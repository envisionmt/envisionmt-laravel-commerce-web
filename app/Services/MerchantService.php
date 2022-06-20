<?php


namespace App\Services;


use App\Traits\ConsumeExternalService;

class MerchantService
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
    }

    public function createTransaction($url, $data)
    {
        return $this->performRequest('POST', $url, $data);
    }

    public function callback($url, $data)
    {
        return $this->performRequest('POST', $url, $data);
    }

}
