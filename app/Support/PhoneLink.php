<?php

namespace App\Support;

class PhoneLink
{
    public static function digits(?string $phone): string
    {
        return preg_replace('/[^0-9]/', '', (string) $phone) ?: '';
    }

    public static function whatsapp(?string $phone): ?string
    {
        $digits = self::digits($phone);
        if (!$digits) {
            return null;
        }
        if (strlen($digits) === 10) {
            $digits = '57' . $digits;
        }
        return 'https://wa.me/' . $digits;
    }

    public static function tel(?string $phone): ?string
    {
        $digits = self::digits($phone);
        return $digits ? 'tel:' . $digits : null;
    }
}
