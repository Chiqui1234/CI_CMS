<?php
// Este script sirve para permitir a un visitante que envíe un email a la organización, desde su web oficial.
// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c0400190.ferozo.com";  // Dominio alternativo brindado en el email de alta
$smtpUsuario = "admin@olivaires.com.ar";  // Mi cuenta de correo
$smtpClave = "Lilolilo10";  // Mi contraseña

function enviarEmail($asunto, $mensaje) {
  // Email donde se enviaran los datos cargados en el formulario de contacto
  $emailDestino = $emailContactoAdm;
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->Port = 587;
  $mail->IsHTML(true);
  $mail->CharSet = "utf-8";
  $mail->Host = $smtpHost;
  $mail->Username = $smtpUsuario;
  $mail->Password = $smtpClave;
  $mail->From = $smtpUsuario; // Email desde donde envío el correo.
  $mail->FromName = $nombreContacto;
  $mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario
  $mail->AddReplyTo($emailContacto); // Esto es para que al recibir el correo y poner Responder, lo haga a la cuenta del visitante.
  $mail->Subject = $asunto; // Este es el titulo del email.
  $mensajeContactoHtml = nl2br($mensajeContacto);
  $mail->Body = "{$mensajeContactoHtml} <br /><br />"; // Texto del email en formato HTML
  $mail->AltBody = "{$mensajeContacto} <i>Formulario hecho por PHPMailer, de GitHub</i>"; // Texto sin formato HTML
  // FIN - VALORES A MODIFICAR //
  $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
  );
  $estadoEnvio = $mail->Send();
  if($estadoEnvio){
    echo "El correo fue enviado correctamente.";
  } else {
    echo "Ocurrió un error inesperado.";
  }
}

function emailMain($asunto) {
// Para enviar emails al administrador u otro mail de la organización
include_once("../internal/info.php");
include_once("../plug-in/captchau/comprobador.php");
require("class.phpmailer.php");
require("class.smtp.php");
$captchau=false;
/*  Si existe captchau, lo importo y lo utilizo */
if(file_exists("../captchau/comprobador.php")) {
  include_once("../captchau/comprobador.php");
  if(comprobadorCaptchaVisual()) {
    $captchau=true;
  } else {$captchau=false;}
}

if ( (!isset($_POST["nombreContacto"])) || (!isset($_POST["emailContacto"])) || (!isset($_POST["mensajeContacto"])) ) {
    die ("Es necesario completar todos los datos del formulario");
} else {
   if($captchau==false) {
    $nombreContacto = $_POST["nombreContacto"];
    $emailContacto = $_POST["emailContacto"];
    $mensajeContacto = $_POST["mensajeContacto"];
    enviarEmail($asunto);
  } else {

  }
}
}
?>
