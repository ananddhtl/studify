<?php

namespace App\Services;

use GuzzleHttp\Client;

class SparrowService
{
    protected $client;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function sendSMS($to, $message)
    {
       if ( is_null($to) || is_null($message) ){

           return json_encode(['response_code' => 404, 'response' => 'Number and message are required!']);
        
         } else {

          $response = $this->client->get(config('sparrow-sms.base_url'), [
            'query' => [
                'token' => config('sparrow-sms.key'),
                'from' => config('sparrow-sms.from'),
                'to' => $to,
                'text' => $message,
            ],
        ]);

        return $response->getBody()->getContents();
      }
    
    }
}