<?php

$authentication_password = [
	'id' => null,
	'name' => null,
	'username' => null,
	'password' => null,
	'time' => [
		'created' => null,
		'last_updated' => null,
		'last_used' => null,
	],
	'stats' => [
		'uses' => null,
		'errors' => null,
	],
];

$authentication_key = [
	'id' => null,
	'name' => null,
	'username' => null,
	'key' => [
		'encryption' => null,
		'public' => null,
		'private' => null,
		'passphrase' => null,
	],
	'time' => [
		'created' => null,
		'last_updated' => null,
		'last_used' => null,
	],
	'stats' => [
		'uses' => null,
		'errors' => null,
	],
];

$stored_connection = [
	'id' => null,
	'name' => null,
	'type' => null,
	'authentication' => null,
	'host' => null,
	'port' => null,
	'authentication' => [
		'username' => null,
		'password' => null,
		'key' => [
			'type' => null,
			'public' => null,
			'private' => null,
			'passphrase' => null,
		],
		'' => null,
		'' => null,
	],
	'user' => null,	
	'parent_connection' => null,
	'time' => [
		'created' => null,
		'last_updated' => null,
		'last_used' => null,
	],
	'stats' => [
		'uses' => null,
		'errors' => null,
	],
	'history' => [],
];

$process = [
	'id' => null,
	'command' => null,
	'user' => [
		'username' => null,
		'ip' => null,
	],
	'time' => [
		'start' => null,
		'end' => null,
		'last_input' => null,
		'last_output' => null,
	],
	'env' => null,
	'size' => [
		'width' => null,
		'height' => null,
	],
	'title' => null,
	'description' => null,
	'running' => false,
	'process' => null,
	'pipes' => [],
	'stdio_processes' => [
		'in' => null,
		'out' => null,
		'err' => null,
	],
	'permissions' => [
		'read' => [],
		'write' => [],
	],
	'scrollback_buffer' => null,
	'history' => [],
];

$message = [
	'id' => null,
	'user' => null,
	'time' => [
		'created' => null,
		'updated' => null,
	],
	'data' => null,
	'target' => null,
];

$user = [
	'id' => null,
	'ip' => null,
	'username' => null,
	'authenticated' => null,
];

$room = [
	'id' => null,
	'name' => null,
	'description' => null,
	'members' => [
		'admins' => [],
		'users' => [],
		'guests' => [],
	],
	'permissions' => [
	],
];
