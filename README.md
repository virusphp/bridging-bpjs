# Service-Bridging

Service-bridging adalah sebuah packeges di desain untuk mempermudah pengguna framework php untuk melakukan generate signature maupun token
untuk akses ke service bpjs baik versi 1 maupun versi 2 yang akan datang, semoga packages ini dapat membantu teman teman dalam melakukan develop terhadap perkembangan service bpjs kesehatan

## FEATURE

- Custome Url
- Generate Signature
- Generate Timestamp Bpjs
- Generate keyString
- Decrypt String
- Decompress with (Lz-String)

## Installation

### Composer

```cmd
composer require virusphp/bridging-bpjs
```

## Publish Config

```cmd
php artisan vendor:publish --provider="Vclaim\Bridging\BridgingBpjsServiceProvider" --tag=config
```

## Usage

```env
//Confirasi .env untuk vclaim bpjs
API_BPJS=https://dvlp.bpjs-kesehatan.go.id/vclaim-rest-1.1/
CONS_ID=xxxxx
SECRET_KEY=xxxX
USER_KEY=xxxx

//Configurasi .env untuk sirs kemkes
USER_ID=xxxx
PASS_ID=xxxx
API_KEMKES=http://sirs.kemkes.go.id/fo/index.php/

```

```php
<?php
// configurasi config (Support laravel 7 ke atas)
return [
	'api' => [
		'endpoint'  => env('API_BPJS','ENDPOINT-KAMU'),
		'consid'  => env('CONS_ID','CONSID-KAMU'),
		'seckey' => env('SECRET_KEY', 'SECRET-KAMU'),
		'user_key' => env('USER_KEY', 'SECRET-KAMU'),
	]
]

```

```php
<?php
// Example Controller bridging to Vclaim BPJS  (Laravel 7 ke atas)
use Vclaim\Bridging\BridgingBpjs;

Class SomeController
{
	protected $bridging;

	public function __construct()
	{
		$this->bridging = new BridgingBpjs();
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

```php
<?php
// Example Controller bridging to SIRS Kemkes  (Laravel 7 ke atas)
use Kemkes\Bridging\BridgingKemkes;

Class SomeController
{
	protected $bridging;

	public function __construct()
	{
		$this->bridging = new BridgingKemkes();
	}

	// Example To use get Referensi diagnosa
	// Name of Method example
	public function getFasyankes($kode)
	{
		$endpoint = 'Fasyankes'. $kode;
		return $this->bridging->getRequest($endpoint);
	}
}
```

# Changelog

#### 2022-01-12

- v1.3.2 and v.13.3 fix bug response and add support php version 8

- v1.3.1 fix bug response json to encode

#### 2022-01-04

- v1.3 fix bug and single generate timestamp to open key

#### 2021-12-31

- v1.2 fixed bug minor

#### 2021-12-28

- v1.1 fixed bug minor

### 2021-12-27

- v1.0 Add user_key to bridging versi 2 and fix bug

### 2021-11-22

- v0.8-beta fix bug minor

### 2021-09-19

- v0.7-beta fix bug minor both briding old and new version

### 2021-09-19

- v0.6-beta Refactor and new fitur bridging kemkes

### 2021-09-15

- v0.5-beta Refactor and update documentation

### 2021-09-15

- v0.2-beta Refactor code and add documentation readme

### 2021-09-14

- v0.1-beta Upgraded codebase to be compatible to PHP 8.

### 2021-09-14

- Added v0.1-beta to packagist/composer virusphp/service-bridging

### 2021-09-14

- Using the Guzzle and Lz-string repositories (guzzlehttp/guzzle) and (nullpunkt/lz-string-php)

### 2021-09-14

- Overhaul and refactor generate signature service BPJS by virusphp
