<?php

// POSTされたJSON文字列を取り出し
// $json = file_get_contents("php://input");

// JSON文字列をobjectに変換
//   ⇒ 第2引数をtrueにしないとハマるので注意
// $contents = json_decode($json, true);



$to = "jobs1050102@gmail.com";
$subject = "TEST";
$message = "This is TEST.\r\nHow are you?";
$headers = "From: hama1050102@gmail.com";

$array = [
    'tokyo' => [
        '品川',
        '五反田',
        '三軒茶屋',
        '四谷'
    ],
    'kanagawa' => [
        '横浜',
        '相模原',
        '湘南',
        '鎌倉'
    ],
    'saitama' => [
        '所沢',
        '狭山',
        '川口',
        '浦和',
        '小手指',
        '飯能'
    ]
];

// print(mail($to, $subject, $message, $headers));
header("Content-Type: application/json; charset=utf-8");
echo json_encode($array);

