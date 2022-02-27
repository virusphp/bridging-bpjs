<?php

return [
	'api' => [
		'endpoint'  => env('API_BPJS_VCLAIM','ENDPOINT-KAMU'),
		'consid'  => env('CONS_ID','CONSID-KAMU'),
		'secretkey' => env('SECRET_KEY', 'SECRET-KAMU'),
		'userkey' => env('USER_KEY_VCLAIM', 'SECRET-KAMU'),
	]
];