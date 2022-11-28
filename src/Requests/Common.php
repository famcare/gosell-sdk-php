<?php

namespace TapPayments\Requests;

use Illuminate\Support\Facades\Http;

/**
 * Trait for resources that need to make API requests.
 */
trait Common
{

    public static function testingTrait()
    {
        self::_validateParams('POST', []);
    }

    protected static function _staticRequest($method, $url, $params, $options)
    {
        $body = $params === null ? null : json_encode($params);
        return Http::withToken(static::getKey())
            ->withBody($body, 'application/json')
            ->send($method, $url)
            ->throw()
            ->object();
    }

    /**
     * @param  array|null|mixed  $params  The list of parameters to validate
     *
     * @throws Exception if $params exists and is not an array
     */
    protected static function _validateParams($method, $params = null)
    {

        if (empty($params) && !is_array($params)) {
            $message = "You must pass an array as the ".($method == 'POST') ? 'first' : 'second'." argument to GoSell API SDK"
                ." create method calls.  (HINT: an example call to create a charge "
                ."would be: \"GoSell\\Charges::create(['amount' => 100, "
                ."'currency' => 'usd', 'source' => 'tok_1234'])\")";
            throw new \Exception($message);
        }
    }

    /**
     * @param  array|null|mixed  $params  The list of parameters to validate
     *
     * @throws Exception if $params exists and is not an array
     */
    protected static function _validateQueryString($params = null)
    {

        if (empty($params) && !is_array($params)) {
            $message = "You must pass first argument as string to GoSell API SDK"
                ."to retrieve, update, delete method calls.  (HINT: an example call to create a charge "
                ."would be: \"GoSell\\Charges::retieve('chg_Hw422020201340Jh9g0302671'])\")";
            throw new \Exception($message);
        }
    }


    protected static function _validateKey()
    {
        $key = static::getKey();
        //var_dump($key);exit;
        if (empty($key)) {
            throw new \Exception("You must pass a private secret Key by calling setPrivateKey. Example: GoSell::setPrivateKey(\"sk_test_XKokBfNWv6FIYuTMg5sLPjhJ\")");
        }
        if (strlen($key) !== 32) {
            throw new \Exception("Invalid private secret Key");
        }
    }
}