<?php

namespace TapPayments\Requests;

/**
 * Trait for creatable resources. Adds a `create()` static method to the class.
 *
 * This trait should only be applied to classes that derive from GoSellObjects.
 */
trait CreateForParent
{
    
    public static function create($parent_id, $params = null, $options = null)
    {
        self::_validateKey();
        self::_validateQueryString($parent_id);
        self::_validateParams('POST',$params);
        $url = static::baseUrl().static::classUrl().'/'.$parent_id;

        $response = static::_staticRequest('POST', $url, $params, $options);

        return $response;
    }

}