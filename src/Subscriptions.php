<?php

namespace TapPayments\GoSell;
use \TapPayments\Api;
class Subscriptions extends Api
{
    use \TapPayments\Requests\Create;
    use \TapPayments\Requests\Retrieve;
    use \TapPayments\Requests\Delete;
    use \TapPayments\Requests\All;
    protected static $endpoint='/v2/subscription/v1';
    private static function classUrl()
    {
        return self::$endpoint;
    }

    public static function update($id = null, $params = null, $options = null)
    {
        self::_validateKey();
        self::_validateParams('PUT',$params);
        self::_validateQueryString($id);
        $url = static::baseUrl().static::classUrl();
        $params['subscription_id'] = $id;

        $response = static::_staticRequest('PUT', $url, $params, $options);

        return $response;
    }
}