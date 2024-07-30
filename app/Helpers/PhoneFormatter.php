<?php

namespace App\Helpers;

class PhoneFormatter
{
    public static function formatPhoneNumber($phone)
    {
        // Replace 62 with 0
        $phone = preg_replace('/^62/', '0', $phone);

        // Add hyphens (e.g., 0812-244-421-119)
        $formattedPhone = preg_replace('/(\d{4})(\d{3})(\d{3})(\d+)/', '$1-$2-$3-$4', $phone);

        return $formattedPhone;
    }
}
