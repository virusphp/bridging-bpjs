<?php

namespace Bpjs\Bridging\Icare;

use LZCompressor\LZString;
use Bpjs\Bridging\GenerateBpjs;

class ResponseIcare
{
    public function responseIcare($response, $key)
    {
        $result = json_decode($response);
		if ($result->metaData->code == "200" && is_string($result->response)) {
            return self::doMaping($result->metaData, $result->response, $key);
        }
        return json_encode($result);
    }

    public function doMaping($metaData, $response, $key)
    {
        $data = [
            "metaData" => $metaData,
            "response" => json_decode($this->decompressed(GenerateBpjs::stringDecrypt($key, $response)))
        ];
		return json_encode($data);
    }

    protected function decompressed($dataString)
    {
        return LZString::decompressFromEncodedURIComponent($dataString);
    }
}