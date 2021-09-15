Service-Bridging
=============
Service-bridging adalah sebuah packeges di desain untuk mempermudah pengguna framework php untuk melakukan generate signature maupun token 
untuk akses ke service bpjs baik versi 1 maupun versi 2 yang akan datang, semoga packages ini dapat membantu teman teman dalam melakukan develop terhadap perkembangan service bpjs kesehatan

## FEATURE
- Custome Url
- Generate Signature
- Generate Timestamp Bpjs
- Generate keyString
- Decrypt String
- Decompress with (Lz-String)

## Usage
```php
//Confirasi Env
API_BPJS=https://dvlp.bpjs-kesehatan.go.id/vclaim-rest-1.1/
CONS_ID=xxxxx
SECRET_KEY=xxxx

<?php
// configurasi config
return [
	'api' => [
		'endpoint'  => env('API_BPJS','ENDPOINT-KAMU'),
		'consid'  => env('CONS_ID','CONSID-KAMU'),
		'seckey' => env('SECRET_KEY', 'SECRET-KAMU'),
	]
]

```

```php
<?php

use Virusphp\BridgingBpjs\Bpjs;
use Virusphp\BridgingBpjs\BridgingBpjs;

Class SomeController extends Bpjs
{
	protected $bridging;

	public function __construct()
	{
		parent::__construct();
		$this->bridging = new BridgingBpjs($this->consid, $this->timestamp, $this->signature, $this->key);
	}

	// Example To use get Referensi diagnosa
	// Name of Method example
	public function getDiagnosa($kode)
	{
		$endpoint = 'referensi/diagnosa/'. $kode;
		return $this->bridging->getRequest($endpoint);
	}
}
```

## Installation

### Composer
```cmd
composer require virusphp/service-bpjs
```

## Publish Config
```cmd
php artisan vendor:publish --provider="Vclaim\Bridging\BridgingBpjsServiceProvider" --tag=config
```

## Changelog

### 2021-09-14
- v0.2-beta Refactor code and add documentation readme

### 2021-09-14
- v0.1-beta Upgraded codebase to be compatible to PHP 8.

### 2021-09-14 
- Added v0.1-beta to packagist/composer virusphp/service-bridging

### 2021-09-14 
- Using the Guzzle and Lz-string repositories (guzzlehttp/guzzle) and (nullpunkt/lz-string-php)

### 2021-09-14
- Overhaul and refactor generate signature service BPJS by virusphp