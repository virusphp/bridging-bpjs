<?php

namespace Kemkes\Bridging;

class GenerateKemkes 
{
    public static function kemkesTimestamp()
    {
        return strval(time()-strtotime('1970-01-01 00:00:00'));
    }
}