<?php
$to = "jobs1050102@gmail";
$subject = "TEST";
$message = "This is TEST.\r\nHow are you?";
$headers = "From: hama1050102@gmail";

mail($to, $subject, $message, $headers);
