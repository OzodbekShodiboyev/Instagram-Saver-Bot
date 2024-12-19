<?php

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://instagram-post-reels-stories-downloader-api.p.rapidapi.com/instagram/?url=$tx",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "x-rapidapi-host: instagram-post-reels-stories-downloader-api.p.rapidapi.com",
        "x-rapidapi-key: bde943f487msh0c6179d7a33bc62p1c9f80jsn5dd67db58826"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $result = json_decode($response, true);
    $url = $result['result'][0]['url'];
}
bot('sendVideo', [
    'chat_id' => $cid,
    'video' => $url,
    'caption' => "Botimizga obuna bo'ling!\n@saver_uzb_bot",
    'parse_mode' => 'HTML',
    'reply_markup' => json_encode([
        'inline_keyboard' => [
            [["text" => "➕ Obuna bo'lish", "url" => "https://t.me/saver_uzb_bot"],],

        ]
    ]),
]);
