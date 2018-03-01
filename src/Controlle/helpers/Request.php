<?php

namespace Controlle\helpers;

use \Httpful\Request as R;
use \Exception;

class Request
{
    public static function get($url)
    {
        $config = Config::getInstance()->get();

        $response = self::prepareRequest(R::get($config->uri . $url))
            ->send();
        
        if ($response->code != 200) {
            throw new Exception($response->body->error);
        }
        
        return $response->body;
    }

    public static function post($url, array $params = [])
    {
        $config = Config::getInstance()->get();

        $response = self::prepareRequest(R::post($config->uri . $url))
            ->body(\json_encode($params))
            ->send();
        
        if ($response->code != 200 && $response->code != 201) {
            throw new Exception($response->body->error);
        }
        
        return $response->body;
    }

    public static function put($url, array $params = [])
    {
        $config = Config::getInstance()->get();

        $response = self::prepareRequest(R::put($config->uri . $url))
            ->body(\json_encode($params))
            ->send();
        
        if ($response->code != 200 && $response->code != 201) {
            throw new Exception($response->body->error);
        }
        
        return $response->body;
    }

    public static function delete($url)
    {
        $config = Config::getInstance()->get();

        $response = self::prepareRequest(R::delete($config->uri . $url))
            ->send();
        
        if ($response->code != 200) {
            throw new Exception($response->body->error);
        }
        
        return $response->body;
    }

    private static function prepareRequest($request)
    {
        $config = Config::getInstance()->get();

        return $request
            ->sendsJson()
            ->addHeader('User-Agent', $config->userAgent)
            ->authenticateWith($config->username, $config->apitoken)
            ->expectsJson();
    }
}