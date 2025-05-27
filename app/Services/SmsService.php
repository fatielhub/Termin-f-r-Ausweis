<?php

namespace App\Services;

use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class SmsService
{
    protected $client;

    public function __construct()
    {
        try {
            $credentials = new Basic(
                config('services.vonage.key'),
                config('services.vonage.secret')
            );

            // Create Guzzle client with specific SSL configuration
            $guzzleClient = new GuzzleClient([
                'verify' => false, // Disable SSL verification temporarily
                'timeout' => 30,
                'connect_timeout' => 10,
                'http_errors' => false,
                'curl' => [
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false,
                ]
            ]);

            $this->client = new Client($credentials, [
                'http_client' => $guzzleClient,
                'debug' => true
            ]);

            Log::info('SmsService initialized successfully');
        } catch (\Exception $e) {
            Log::error('Failed to initialize SmsService: ' . $e->getMessage());
            throw $e;
        }
    }

    public function sendSms($to, $text)
    {
        try {
            Log::info('Attempting to send SMS to: ' . $to);
            
            $response = $this->client->sms()->send(
                new SMS($to, config('services.vonage.from'), $text)
            );

            $message = $response->current();
            $status = $message->getStatus();

            Log::info('SMS send response status: ' . $status);

            return $status == 0
                ? 'Message sent successfully'
                : 'Message failed with status: ' . $status;
        } catch (RequestException $e) {
            Log::error('SMS sending failed: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            return 'Failed to send message: ' . $e->getMessage();
        } catch (\Exception $e) {
            Log::error('Unexpected error while sending SMS: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            return 'Unexpected error: ' . $e->getMessage();
        }
    }
}
