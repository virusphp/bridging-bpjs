# Service-Bridging

Service-bridging adalah sebuah package yang di desain untuk mempermudah pengguna framework php untuk melakukan generate signature maupun token untuk akses ke service BPJS baik versi 1 maupun versi 2 yang akan datang, semoga package ini dapat membantu teman-teman dalam melakukan develop terhadap perkembangan service BPJS kesehatan

## FEATURE

- Custom Url
- Generate Signature
- Generate Timestamp BPJS
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
//Confirasi .env BPJS
CONS_ID=xxxxx
SECRET_KEY=xxxX

// Config untuk Vclaim BPJS
API_BPJS_VCLAIM=https://apijkn-dev.bpjs-kesehatan.go.id/vclaim-rest-dev/
USER_KEY_VCLAIM=xxxx

// Config untuk Antrol BPJS
API_BPJS_ANTROL=https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev/
USER_KEY_ANTROL=xxxx


//Configurasi .env untuk sirs kemkes
USER_ID=xxxx
PASS_ID=xxxx
API_KEMKES=http://sirs.kemkes.go.id/fo/index.php/

```

```php
<?php
// configurasi config (Support laravel 7 ke atas)
config/vclaim.php
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
use Bpjs\Bridging\Vclaim\BridgeVclaim;

Class SomeController
{
	protected $bridging;

	public function __construct()
	{
		$this->bridging = new BridgeVclaim();
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

## Channel

KLIK UNTUK SUPORT

[![Watch the video](https://yt3.ggpht.com/ytc/AMLnZu8mCU3GUNwlmATLo2gLb0K_jaWjahlc_qmbRxEl=s88-c-k-c0x00ffffff-no-rj)](https://www.youtube.com/watch?v=Gq8-YOnsR-k&t=257s)

## DONASI

https://saweria.co/setsuga

# Changelog

#### 2022-11-26

- v2.1.1 Fixed bug duplication encode string
-

#### 2022-10-15

- v2.0.9 Refactoring Guzzle to curl and replace all guzzle

#### 2022-10-07

- v2.0.9 fixed delete method for sep, surat kontrol, and rujukan

#### 2022-02-26

- v2.0.0 Release Mayor Refactoring all service (New Service Antrol)

#### 2022-01-29 - 2022-02-07

- v1.3.7 add support use to native php

#### 2022-01-25

- v1.3.4 bug response antrol not same vclaim and add response antrol

#### 2022-01-25

- v1.3.2 and v.13.3 fix bug response and add support php version 8

#### 2022-01-12

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
