<?php

namespace Bpjs\Bridging\Antrol;

use Bpjs\Bridging\ManageService;
use Bpjs\Bridging\GenerateBpjs;
use Dotenv\Dotenv;

class ConfigAntrol extends ManageService
{
    protected $urlEndpoint;
    protected $consId;
    protected $secretKey;
    protected $userKey;
    protected $header;
    protected $timestamps;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(base_path());
        $dotenv->load();

        $this->urlEndpoint = $_ENV['API_BPJS_ANTROL'] ?? null;
        $this->consId = $_ENV['CONS_ID'] ?? null;
        $this->secretKey = $_ENV['SECRET_KEY'] ?? null;
        $this->userKey = $_ENV['USER_KEY_ANTROL'] ?? null;

        $this->header = $this->setHeader();
    }

    public function setUrl()
    {
        return $this->urlEndpoint;
    }

    public function setConsId()
    {
        return $this->consId;
    }

    public function setSecretKey()
    {
        return $this->secretKey;
    }

    public function setUserKey()
    {
        return $this->userKey;
    }

    public function setTimestamp()
    {
        return GenerateBpjs::bpjsTimestamp();
    }

    public function setsignature()
    {
        return GenerateBpjs::generateSignature($this->setConsId(), $this->setSecretKey());
    }

    public function setUrlEncode()
    {
        return array('Content-Type' => 'Application/x-www-form-urlencoded');
    }

    public function setUrlJson()
    {
        return array('Content-Type' => 'Application/Json');
    }

    public function setHeader()
    {
        return [
            'X-cons-id' => $this->setConsid(),
            'X-timestamp' => $this->setTimestamp(),
            'X-signature' => $this->setSignature(),
            'user_key' => $this->setUserKey()
        ];
    }

    public function keyDecrypt()
    {
        return $this->setConsid() . $this->setSecretKey() . $this->header['X-timestamp'];
    }

    public function setHeaders()
    {
        return array_merge($this->header, $this->setUrlEncode());
    }
}