<?php

namespace Kemkes\Bridging;

use Kemkes\Bridging\Sirs\BridgeSirs;

class TempatTidurController
{
    protected $bridging;

    public function __construct()
    {
        $this->bridging = new BridgeSirs;
    }

    public function getTempatTidur()
    {
        $url = 'Fasyankes';
        $tempattidur = $this->bridging->getRequest($url);
        return $tempattidur;
    }

    public function getReferensi()
    {
        $endpoint = "Referensi/tempat_tidur";
        $referensi = $this->bridging->getRequest($endpoint);
        return $referensi;
    }
}
