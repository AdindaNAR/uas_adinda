<?php
include '../controller/Auth.php';
$ctrl = new Auth();
session_start();

$code = $ctrl->acakCaptcha();
$_SESSION["code"] = $code;
$wh = imagecreatetruecolor(173, 50);
 
//background color biru
$bgc = imagecolorallocate($wh, 22, 86, 165);
 
//text color abu-abu
$fc = imagecolorallocate($wh, 223, 230, 233);
imagefill($wh, 0, 0, $bgc);
 
//( $image , $fontsize , $string , $fontcolor )
imagestring($wh, 10, 50, 15,  $code, $fc);
 
//buat gambar
header('content-type: image/jpg');
imagejpeg($wh);
imagedestroy($wh);
?>