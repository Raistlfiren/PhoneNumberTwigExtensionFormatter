<?php

namespace Bolt\Extension\Raistlfiren\PhoneNumberTwigExtensionFormatter;

use Bolt\Application;
use Bolt\BaseExtension;

class Extension extends BaseExtension
{

    public function initialize() {
        $this->addTwigFilter('phone', 'phoneNumberFilter');
    }

    public function phoneNumberFilter($phone)
    {
        $phone = preg_replace(
            '~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3',
            $phone
        );

        return new \Twig_Markup($phone, 'UTF-8');
    }

    public function getName()
    {
        return "phone";
    }

}






