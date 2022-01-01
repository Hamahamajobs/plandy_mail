<?php
$to = "jobs1050102@gmail.com";
$subject = "TEST";
$message = "This is TEST.\r\nHow are you?";
$headers = "From: hama1050102@gmail.com";

print(mail($to, $subject, $message, $headers));


