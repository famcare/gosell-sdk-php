<?php

namespace TapPayments\GoSell;
use \TapPayments\Api;
class Cards extends Api
{
	use \TapPayments\Requests\CreateForParent;
	use \TapPayments\Requests\RetrieveForParent;
	use \TapPayments\Requests\UpdateForParent;
	use \TapPayments\Requests\AllForParent;
    protected static $endpoint='/v2/card';
    private static function classUrl()
    {
        return self::$endpoint;
    }
}