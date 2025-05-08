<?php

namespace Kemkes\Bridging;

class CurlFactory
{
	public function request($endpoint, $headers, $method = "", $payload = "")
	{
		$headers = $this->setHeader($headers);

		$optf = [
			CURLOPT_VERBOSE => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_TIMEOUT => 10,
			CURLOPT_CONNECTTIMEOUT => 10,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => $headers
		];

		if (!empty($method)) {
			$optf[CURLOPT_CUSTOMREQUEST] = $method;
			$optf[CURLOPT_POSTFIELDS] = $payload;
			$optf[CURLOPT_HTTPHEADER][] = 'Content-Type: Application/x-www-form-urlencoded';
		} else {
			$optf[CURLOPT_HTTPHEADER][] = 'Content-Type: Application/json';
		}

		$ch = curl_init($endpoint);
		curl_setopt_array($ch, $optf);
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);
		// dd($info);
		curl_close($ch);

		return $result;
	}

	protected function setHeader($headers)
	{
		$header = [];
		$header[] = 'Accept: application/json';
		$header[] = 'X-rs-id:' . $headers['X-rs-id'];
		$header[] = 'X-timestamp:' . $headers['X-timestamp'];
		$header[] = 'X-pass:' . $headers['X-pass'];
		return $header;
	}
}
