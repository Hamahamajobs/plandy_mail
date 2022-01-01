<?php

// POSTされたJSON文字列を取り出し
$body = file_get_contents("php://input");

if (is_null($body)) {
    # error データが無い
    http_response_code(500);        //HTTPレスポンスコード(500サーバーエラー)
    echo "no data (JSON)";
    exit();
}

$json = json_decode($body, true);   //JSONに変換　第二引数をTrueにすると連想配列になる

if (is_null($json)) {
    # error JSONをデコードできない
    http_response_code(500);        //HTTPレスポンスコード(500サーバーエラー)
    echo "JSON error";
    exit();
}


$email_to = $json['email_to']; // メール送信先 

http_response_code(200);
header("Content-Type: application/json; charset=utf-8");
echo $email_to;

// JSON文字列をobjectに変換
//   ⇒ 第2引数をtrueにしないとハマるので注意
// $contents = json_decode($body, true);


// $to = "jobs1050102@gmail.com";
// $subject = "TEST";
// $message = "This is TEST.\r\nHow are you?";
// $headers = "From: hama1050102@gmail.com";

// print(mail($to, $subject, $message, $headers));
// header("Content-Type: application/json; charset=utf-8");
// echo json_encode($contents);

