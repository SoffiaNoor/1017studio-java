<?php

namespace App\Helpers;

class PhoneFormatter
{
    public static function formatPhoneNumber($phone)
    {
        // Replace 62 with 0
        $phone = preg_replace('/^62/', '0', $phone);

        // Add spaces (e.g., 0812 2444 2111)
        $formattedPhone = preg_replace('/(\d{4})(\d{4})(\d{4})/', '$1 $2 $3', $phone);

        return $formattedPhone;
    }
}
