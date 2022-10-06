<?php

namespace TapPayments\Requests;

/**
 * Trait for updateable resources. Adds a `update()` static method to the class.
 *
 * This trait should only be applied to classes that derive from GoSellObjects.
 */
trait AllForParent
{
    
    public static function all($parent_id, $params = null, $options = null)
    {
        self::_validateKey();
        self::_validateQueryString($parent_id);
        self::_validateParams('POST',$params);
        
        $url = static::baseUrl().static::classUrl().'/'.$parent_id;

        $response = static::_staticRequest('GET', $url, $params, $options);

        return $response;
    }

}