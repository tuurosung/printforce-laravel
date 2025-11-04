<?php

namespace App\Services\Alerts;

use Http;
use Illuminate\Support\Facades\Log;

class MessagingService
{


    protected string $clientId;
    protected string $clientSecret;
    protected string $from;
    protected string $baseUrl;

    protected const GHANA_COUNTRY_CODE = '233';
    protected const VALID_PREFIXES = [
        "024", "054", "055", "059", "053", //MTN
        "020", "050", //Vodafone
        "027", "057", // Tigo
        "026", "056", //Airtel
        "023",  "028" // Glo, Expresso
    ];


    public function __construct()
    {
        $this->clientId = config('services.hubtel.client_id');
        $this->clientSecret = config('services.hubtel.client_secret');
        $this->from = config('services.hubtel.from');
        $this->baseUrl = config('services.hubtel.base_url');
    }


    public function send(string $recipient, string $message): bool
    {
        try {

            $this->validatePhoneNumber($recipient);
            $formattedPhone = $this->formattedPhoneNumber($recipient);

            $response = $this->makeRequest($formattedPhone, $message);

            return true;

        } catch (\Exception $e) {
            throw $e;
        }
    }


    protected function makeRequest(string $recipient, string $message): array
    {

        $response = Http::get("{$this->baseUrl}/messages/send", [
            'clientid' => $this->clientId,
            'clientsecret' => $this->clientSecret,
            'from' => $this->from,
            'to' => $recipient,
            'content' => $message
        ]);

        if ($response->failed()) {
            throw new \Exception('Failed to send message: '. $response->body());
        }

        return $response->json();
    }


    protected function formattedPhoneNumber(string $phoneNumber): string
    {
        // remove any spaces, dashes or special characters
        $cleaned = preg_replace('/[^0-9]/', '', $phoneNumber);

        // replace leading zero with country code
        if (str_starts_with($cleaned, '0')) {
            $cleaned = substr_replace($cleaned, self::GHANA_COUNTRY_CODE, 0, 1);
        }

        // if the phone number already starts with the country code
        if (str_starts_with($cleaned, self::GHANA_COUNTRY_CODE)) {
            return $cleaned;
        }

        return self::GHANA_COUNTRY_CODE . $cleaned;
    }


    private function validatePhoneNumber(string $phoneNumber): void
    {

        // if the phone number provided is neither 10 digits nor 12 digits
        if (strlen($phoneNumber) !== 10 && strlen($phoneNumber) !== 12) {
            throw new \Exception('Invalid phone number');
        }

        // if the phone number neither starts with a zero or the country code
        if (!str_starts_with($phoneNumber, '0') && !str_starts_with($phoneNumber, self::GHANA_COUNTRY_CODE)) {
            throw new \Exception('Invalid phone number');
        }

        // convert to 10 digits if its 12 digits
        if (strlen($phoneNumber) === 12) {
            $phoneNumber = substr_replace($phoneNumber, '', 0, 3);
        }

        // if the phone number is 10 digits, check if the prefix is valid
        if (strlen($phoneNumber) === 10) {

            // extract the 3 digit prefix and check if it is valid
            if (!in_array(substr($phoneNumber, 0, 3), self::VALID_PREFIXES, true)) {
                throw new \Exception('Invalid phone number');
            }
        }
    }


    public function isValidGhanaNumber(string $phoneNumber): bool
    {
        try {

            $formatted = $this->formattedPhoneNumber($phoneNumber);
            $this->validatePhoneNumber($formatted);
            return true;

        } catch (\Exception $e) {
            return false;
        }
    }


    public function sendBulk(array $recipients, string $message): array
    {
        $results = [];

        foreach ($recipients as $recipient) {
            try {
                $this->send($recipient, $message);
                $results[$recipient] = ['success' => true];
            } catch (\Exception $e) {
                $results[$recipient] = [
                    'success' => false,
                    'error' => $e->getMessage()
                ];
            }
        }

        return $results;
    }


    public function getBalance(): ?float
    {
        try {
            $response = Http::get("{$this->baseUrl}/account/balance", [
                'clientid' => $this->clientId,
                'clientsecret' => $this->clientSecret,
            ]);

            return $response->json('balance');
        } catch (\Exception $e) {
            Log::error('Failed to get SMS balance', ['error' => $e->getMessage()]);
            return null;
        }
    }

}
