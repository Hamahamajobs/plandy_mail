<?php
// endpoint
// https://harumakiii.com/harumaki_api/plandy_mail/
// POSTでなげる


// POSTされたJSON文字列を取り出し
$json = file_get_contents("php://input");

if (is_null($json)) {
    # error データが無い
    http_response_code(500);        //HTTPレスポンスコード(500サーバーエラー)
    echo "no data (JSON)";
    exit();
}

$params = json_decode($json, true);   //JSONに変換　第二引数をTrueにすると連想配列になる

if (is_null($params['email_to'])) {
    # error JSONをデコードできない
    http_response_code(500);        //HTTPレスポンスコード(500サーバーエラー)
    echo "JSON error 宛先メールが設定されてません";
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

$subject = "【Plandy】あなたのデートプランのお知らせ";
$headers = "From: hama1050102@gmail.com";


// メール送信
$result = mail($email_to, $subject, $email_message, $headers);


http_response_code(200);
header("Content-Type: application/json; charset=utf-8");
if ($result) {
    $res['status'] = "200:メール送信に成功";
    
}
else {
    $res['status'] = "メール送信に失敗しました";
}
echo json_encode($res);
