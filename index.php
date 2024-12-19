<?php
define('API_KEY', '6105807662:AAEe1Cm_SFMP1BhVNYO0iQHtMoCXaYfmUDU');

$admin = "-1001782995893"; // admin idsi
$adminuser = ""; // admin user



function bot($method, $datas = [])
{
	$url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
	$res = curl_exec($ch);
	if (curl_error($ch)) {
		var_dump(curl_error($ch));
	} else {
		return json_decode($res);
	}
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$cid = $message->chat->id;
$cidtyp = $message->chat->type;
$miid = $message->message_id;
$name = $message->chat->first_name;
$user = $message->from->username;
$tx = $message->text;
$callback = $update->callback_query;
$mmid = $callback->inline_message_id;
$mes = $callback->message;
$mid = $mes->message_id;
$cmtx = $mes->text;
$mmid = $callback->inline_message_id;
$idd = $callback->message->chat->id;
$cbid = $callback->from->id;
$cbuser = $callback->from->username;
$data = $callback->data;
$ida = $callback->id;
$cqid = $update->callback_query->id;
$cbins = $callback->chat_instance;
$cbchtyp = $callback->message->chat->type;
// mkdir("step");

$otex = "😔 Bekor qilish";


$otmen = json_encode([
	'resize_keyboard' => true,
	'keyboard' => [
		[['text' => "$otex"],],
	]
]);






if ($tx == "/start") {
	bot('sendMessage', [
		'chat_id' => $cid,
		'text' => "Assalomu alaykum,<b> $name! </b>Sizga qanday yordam bera olishim mumkin?",
		'parse_mode' => 'HTML',
		
	]);
}else{
	include_once 'api.php';
}