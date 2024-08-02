<?php

namespace Kemkes\Bridging\Sirs;

use Dotenv\Dotenv;
use Kemkes\Bridging\ManageService;

class ConfigSirs extends ManageService
{
    protected $urlEndpoint;
    protected $user;
    protected $pass;
    protected $header;
    protected $timestamps;

    public function __construct()
    {
        $dotenv = Dotenv::createUnsafeImmutable(getcwd());
        $dotenv->safeLoad();

        $this->urlEndpoint = getenv('API_SIRS');
        $this->user = getenv('USER_SIRS');
        $this->pass = getenv('PASS_SIRS');
    }

    public function setUrl()
    {
        return $this->urlEndpoint;
    }

    public function setUser()
    {
        return $this->user;
    }

    public function setPass()
    {
        return $this->pass;
    }

    public function setTimestamp()
    {
        return strval(time() - strtotime('1970-01-01 00:00:00'));
    }

    public function setUrlJson()
    {
        return array('Content-Type' => 'Application/Json');
    }

    public function setHeader()
    {
        return [
            'Accept' => 'application/json',
            'X-rs-id'   => $this->setUser(),
            'X-timestamp' => $this->setTimestamp(),
            'X-pass' => $this->setPass(),
        ];
    }
}
