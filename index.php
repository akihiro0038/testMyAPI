<?php
// アプリケーション設定
define('CUSTOMER_NO','00000001');
define('SECRET_KEY', 'Hackathon2016@MY');
// URL
define('AUTH_URL', 'https://my-hackathon2016-api.mybluemix.net/auth');
define('TOKEN_URL', 'https://public-test01.ebisubook.com:41030/oauth/token');
//証書番号
define('POLICY_NO','00000001');



//--------------------------------------
// ページにリダイレクト
//--------------------------------------
$options = array(
	'customerNo' => CUSTOMER_NO,
	'secret' => SECRET_KEY,
);

// POST送信
$res = file_get_contents(AUTH_URL, false, stream_context_create($options));

// レスポンス取得
$token = json_decode($res, true);
if(isset($token['error'])){
	echo 'エラー発生';
	exit;
}
$access_token = $token['access_token'];
