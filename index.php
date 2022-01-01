<?php

// POSTされたJSON文字列を取り出し
$body = file_get_contents("php://input");
echo $body;

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

http_response_code(200);
header("Content-Type: application/json; charset=utf-8");
echo json_encode($json);

// JSON文字列をobjectに変換
//   ⇒ 第2引数をtrueにしないとハマるので注意
// $contents = json_decode($body, true);


// $to = "jobs1050102@gmail.com";
// $subject = "TEST";
// $message = "This is TEST.\r\nHow are you?";
// $headers = "From: hama1050102@gmail.com";

// $array = [
//     'tokyo' => [
//         '品川',
//         '五反田',
//         '三軒茶屋',
//         '四谷'
//     ],
//     'kanagawa' => [
//         '横浜',
//         '相模原',
//         '湘南',
//         '鎌倉'
//     ],
//     'saitama' => [
//         '所沢',
//         '狭山',
//         '川口',
//         '浦和',
//         '小手指',
//         '飯能'
//     ]
// ];

// print(mail($to, $subject, $message, $headers));
// header("Content-Type: application/json; charset=utf-8");
// echo json_encode($contents);

