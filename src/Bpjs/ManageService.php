<?php

namespace Bpjs\Bridging;

abstract class ManageService 
{
    protected $urlEndpoint;

    protected $constId;

    protected $secretKey;

    protected $userKey;

    /**
     * abstract method getUrl
     */
    abstract public function setUrl();

    /**
     * abstract method getConsId
     */
    abstract public function setConsId();
    
    /**
     * abstract method getSecretKey
     */
    abstract public function setSecretKey();

    /**
     * abstract method getUserKey
     */
    abstract public function setUserKey();
}