<?php

namespace Controlle\helpers;

use \Exception;

class Config
{
    private $username;
    private $apitoken;
    private $userAgent;
    private $uri;

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    public function get()
    {
        $config = new \stdClass();
        $config->username = $this->username;
        $config->apitoken = $this->apitoken;
        $config->userAgent = $this->userAgent;
        $config->uri = $this->uri;

        return $config;
    }

    public function set(array $config = [])
    {
        if (!isset($config['username'])) {
            throw new Exception('username is required,  set $ config [\'username\']');
        }

        if (!isset($config['apitoken'])) {
            throw new Exception('apitoken is required,  set $ config [\'apitoken\']');
        }

        if (!isset($config['user-agent'])) {
            throw new Exception('user-agent is required,  set $ config [\'user-agent\']');
        }

        $this->username = $config['username'];
        $this->apitoken = $config['apitoken'];
        $this->userAgent = $config['user-agent'];
        $this->uri = 'https://api.controlle.com/rest/v2/';
    }
}
