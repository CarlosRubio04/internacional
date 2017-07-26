<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');

$empresa = $_POST['empresa'];
$sector = $_POST['sector'];
$empleados  = $_POST['empleados'];
$nombre  = $_POST['nombre'];
$cargo  = $_POST['cargo'];
$telefono  = $_POST['telefono'];
$correo  = $_POST['correo'];
$partnerId  = $_POST['partnerId'];
$type  = $_POST['type'];

if (empty($_POST['campaignId'])) {
	$campaignId = "1";
}else {
	$campaignId = $_POST['campaignId'];
}
if (empty($_POST['partnerId'])) {
	$partnerId = "1";
}else {
	$partnerId  = $_POST['partnerId'];
}
if (empty($_POST['type'])) {
	$type = "Direct";
}else {
	$type  = $_POST['type'];
}

$url='http://ares.3dm.com.co/bobm/Views/WS/?sector='.urlencode($sector).'&campaignId='.urlencode($campaignId).'&partnerId='.urlencode($partnerId).'&type='.urlencode($type).'&empresa='.urlencode($empresa).'&empleados='.urlencode($empleados).'&nombre='.urlencode($nombre).'&cargo='.urlencode($cargo).'&telefono='.urlencode($telefono).'&correo='.urlencode($correo);
$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,$url);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Title');
$query = curl_exec($curl_handle);
curl_close($curl_handle);

//print "Query:n$url n";

//print "Reply: $query";

$account="crubio@bmdigital.co";
$password="charlie16";
if ($sector == "PYME") {
	$to="carlosblondsk8@gmail.com";
}elseif ($sector == "CORPORATIVO") {
	$to="carlosrubioweb@yahoo.com";
}elseif ($sector == "GOBIERNO") {
	$to="carlosr@3dm.com.co";
}
$from="no-replay@javerianaempresarial.com";
$from_name="Javerianaempresarial.com";
$msg="
<p><b>Empresa:</b> $empresa</p>
<p><b>Sector:</b> $sector</p>
<p><b>Empleados:</b> $empleados</p>
<p><b>Nombre:</b> $nombre</p>
<p><b>Cargo:</b> $cargo</p>
<p><b>Telefono:</b> $telefono</p>
<p><b>Correo:</b> $correo</p>
"; // HTML message
$subject="Nuevo mensaje de Javerianaempresarial.com";
/*End Config*/

include("phpmailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth= true;
$mail->Port = 587;
$mail->Username= $account;
$mail->Password= $password;
$mail->SMTPSecure = 'tls';
$mail->From = $from;
$mail->FromName= $from_name;
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $msg;
$mail->addAddress($to);
if(!$mail->send()){
 echo "Mailer Error: " . $mail->ErrorInfo;
}else{
 echo "Estamos Validando tu Información $nombre";
}
?>