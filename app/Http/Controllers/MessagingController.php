<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

class MessagingController extends Controller
{
    const CLIENT_ID = 'bespjkyy';
    const CLIENT_SECRET = ' ';
    const FROM = 'PRINTFORCE';

    public $receipient;
    public $message;

    public function send()
    {
        $this->validatePhoneNumber();
        $response = $this->makeRequest();
        return $response;
    }

    private function makeRequest()
    {
        if (empty($this->receipient)) {
            throw new \InvalidArgumentException('receipient phone number is empty');
        }

        if (empty($this->message)) {
            throw new \InvalidArgumentException('message to be sent is empty');
        }

        $curl = curl_init();

        // check if curl is available
        if (!$curl) {
            throw new \Exception("cURL is not available");
        }

        $payload = [
            "from" => self::FROM,
            "to" => $this->receipient,
            "content" => $this->message
        ];

        $query = [
            "clientid" => self::CLIENT_ID,
            "clientsecret" => self::CLIENT_SECRET,
            "from" => self::FROM,
            "to" => $this->receipient,
            "content" => $this->message
        ];

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://smsc.hubtel.com/v1/messages/send?" . http_build_query($query),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            throw new \Exception("cURL Error #:" . $error);
        }

        // $response = json_decode($response);

        return $response;
    }

    private function validatePhoneNumber()
    {
        if (empty($this->receipient) || strlen($this->receipient) !== 10 || $this->receipient[0] !== "0") {
            throw new \InvalidArgumentException('Invalid phone number');
        }

        $prefixes = ["024", "054", "055", "059", "053", "020", "050", "027", "057", "023", "026", "056", "028"];

        if (!in_array(substr($this->receipient, 0, 3), $prefixes, true)) {
            throw new \InvalidArgumentException('Invalid phone number');
        }
    }

    public function reWritePhone($phoneNumber)
    {
        $country_code = '233';
        $new_number = preg_replace('/^0?/', $country_code, $phoneNumber);
        return $new_number;
    }

}
