<?php

// POSTされたJSON文字列を取り出し
$json = file_get_contents("php://input");

if (is_null($json)) {
    # error データが無い
    http_response_code(500);        //HTTPレスポンスコード(500サーバーエラー)
    echo "no data (JSON)";
    exit();
}

$params = json_decode($json, true);   //JSONに変換　第二引数をTrueにすると連想配列になる

if (is_null($params)) {
    # error JSONをデコードできない
    http_response_code(500);        //HTTPレスポンスコード(500サーバーエラー)
    echo "JSON error";
    exit();
}


$email_to = $params['email_to']; // メール送信先 
$date_spot_list = $params['date_spot_list']; // メール送信先 
$email_message = "";

// メールのメッセージ作成
foreach($date_spot_list as $date_spot){
    $email_message .= "デートスポット:";
    $email_message .= $date_spot["spot_title"];
    $email_message .= ".\r\n";
    $email_message .= "デートスポットのサイト:";
    $email_message .= $date_spot["spot_url"];
    $email_message .= ".\r\n"; 
}

// $to = "jobs1050102@gmail.com";
$subject = "【Plandy】あなたのデートプランのお知らせ";
// $message = "This is TEST.\r\nHow are you?";
$headers = "From: hama1050102@gmail.com";

// $result = mail($email_to, $subject, $email_message, $headers);

http_response_code(200);
header("Content-Type: application/json; charset=utf-8");
echo json_encode($email_message);

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

