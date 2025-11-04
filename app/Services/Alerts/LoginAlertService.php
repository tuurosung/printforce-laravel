<?php

namespace App\Services\Alerts;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginAlertService
{

    /**
     * Create a new class instance.
     */
    public function __construct(
        private $messagingService = new MessagingService()
    ){}


    public function send($request): bool
    {
        $phoneNumber = $this->getUserPhoneNumber();
        $message = $this->buildLoginMessage($request);

        $sent = $this->messagingService->send($phoneNumber, $message);

        return $sent;
    }


    protected function getUserPhoneNumber()
    {
        return Auth::user()->phone_number;
    }


    protected function buildLoginMessage($request): string
    {
        $ipAddress = $request->server('REMOTE_ADDR');
        $operatingSystem = $request->server('HTTP_USER_AGENT');

        return "Someone logged into your Printforce account from {$ipAddress} using a {$operatingSystem}";
    }


    protected function getCompanyName(): string
    {
        return Auth::user()->company->company_name ?? config('app.name');
    }


    protected function getRequestParameters($request)
    {

    }

}
