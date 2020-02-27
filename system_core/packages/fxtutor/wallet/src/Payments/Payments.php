<?php
namespace Fxtutor\Wallet\Payments;

use GuzzleHttp\Client;
use Fxtutor\Wallet\Deposit;
use Illuminate\Http\Request;

abstract class Payments
{
    /**
     * payment request function
     * this function will request payment api and send url with session and form generate array
     *
     * @return array [redirect, form]
     */
    abstract public function depositRequest(Deposit $depodit);



    public function __construct()
    {
        return $this;
    }

    
    /**
     * Get data from the url.
     *
     * @param string $url
     * @param array  $params
     *
     * @return string
     */
    protected function post($url, $params)
    {
        $client = new Client();
        return $client->request('POST', $url, [
            'form_params' => $params,
        ])->getBody()->getContents();
    }

    /**
     * Get data from the url.
     *
     * @param string $url
     * @param array  $params
     *
     * @return string
     */
    protected function get($url, $params)
    {
        $client = new Client();
        return $client->request('GET', $url, [
            'form_params' => $params,
        ])->getBody()->getContents();
    }
}
