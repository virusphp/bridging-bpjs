<?php

namespace Bpjs\Bridging;

date_default_timezone_set('UTC');

class GenerateBpjs
{
    public CONST ENCRYPT_METHOD = 'AES-256-CBC';

	public static function generateSignature($conId, $secId)
	{
		return base64_encode(hash_hmac('sha256', $conId."&".self::bpjsTimestamp(), $secId, true));
	}

	public static function stringDecrypt($key, $string)
	{
		$encrtyp_method = 'AES-256-CBC';

        $key_hash = hex2bin(hash('sha256', $key));

        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);

        $output = openssl_decrypt(base64_decode($string), $encrtyp_method, $key_hash, OPENSSL_RAW_DATA, $iv);

        return $output;
	}

	public static function bpjsTimestamp()
	{
		return strval(time()-strtotime('1970-01-01 00:00:00'));
	}

	public static function keyString($conId, $secId) 
	{
		return $conId.$secId.self::bpjsTimestamp();
	}

	public static function keyHash($key)
	{
		return hex2bin(hash('sha256', $key));
	}

	public static function ivDecrypt($key)
	{
		return substr(hex2bin(hash('sha256', $key)), 0, 16);
	}
}