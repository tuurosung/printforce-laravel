<?php

namespace App\Services;

class PhoneNumberValidationService
{
    private const VALID_PREFIXES = [
        // MTN
        '024', '054', '055', '059', '053',
        // Vodafone
        '020', '050',
        // AirtelTigo
        '026', '056', '027', '057', '023', '028'
    ];

    private const PHONE_NUMBER_LENGTH = 10;

    public function isValid(string $phoneNumber): bool
    {
        $phoneNumber = $this->sanitizePhoneNumber($phoneNumber);

        return $this->hasValidLength($phoneNumber)
            && $this->startsWithZero($phoneNumber)
            && $this->hasValidPrefix($phoneNumber);
    }

    private function sanitizePhoneNumber(string $phoneNumber): string
    {
        return preg_replace('/\s+/', '', trim($phoneNumber));
    }

    private function hasValidLength(string $phoneNumber): bool
    {
        return strlen($phoneNumber) === self::PHONE_NUMBER_LENGTH
            && ctype_digit($phoneNumber);
    }

    private function startsWithZero(string $phoneNumber): bool
    {
        return str_starts_with($phoneNumber, '0');
    }

    private function hasValidPrefix(string $phoneNumber): bool
    {
        $prefix = substr($phoneNumber, 0, 3);
        return in_array($prefix, self::VALID_PREFIXES, true);
    }
}
