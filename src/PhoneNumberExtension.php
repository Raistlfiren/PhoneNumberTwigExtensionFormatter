<?php

namespace Raistlfiren\PhoneNumberExtension;

use Bolt\Extension\SimpleExtension;

class PhoneNumberExtension extends SimpleExtension
{
    protected function registerTwigFilters()
    {
        return [
            'phone' => 'phoneNumberFilter'
        ];
    }

    public function phoneNumberFilter($phone)
    {
        $phone = preg_replace(
            '~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~',
            '($1) $2-$3',
            $phone
        );

        return $phone;
    }
}
