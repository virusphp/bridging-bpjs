<?php

namespace Bpjs\Bridging\Antrol;

use LZCompressor\LZString;
use Bpjs\Bridging\GenerateBpjs;

class ResponseAntrol
{
    public function responseAntrol($response, $key)
    {
        $result = json_decode($response);
		if (($result->metadata->code == "200" || $result->metadata->code = "1") && isset($result->response) && is_string($result->response)) {
            return self::doMaping($result->metadata, $result->response, $key);
        }
        return json_encode($result);
    }

    public function doMaping($metadata, $response, $key)
    {
        $data = [
            "metadata" => $metadata,
            "response" => json_decode($this->decompressed(GenerateBpjs::stringDecrypt($key, $response)))
        ];
		return json_encode($data);
    }

    protected function decompressed($dataString)
    {
        return LZString::decompressFromEncodedURIComponent($dataString);
    }
}