<?php

namespace Kemkes\Bridging;

class TempatTidurController
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgingKemkes;
    }

    public function getTempatTidur()
    {
        $url = 'Fasyankes';
        $tempattidur = $this->bridging->getRequest($url);
    }
}