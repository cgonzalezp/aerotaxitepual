<?php
   $dest = "sergiofiloza@aerotaxitepual.cl"; //Email de destino
   $nombre = $_POST['contact_name'];
   $email = $_POST['contact_email'];
   $asunto = "Consulta via Web"; //Asunto
   $cuerpo = $_POST['contact_message']; //Cuerpo del mensaje
	
   //Cabeceras del correo
   $headers = "From: $nombre <$email>\r\n"; //Quien envia?
   $headers .= "X-Mailer: PHP5\n";
   $headers .= 'MIME-Version: 1.0' . "\n";
   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
   
	/*echo "Nombre: ".$nombre;
	echo "Email: ".$email;
	echo "Asunto: ".$asunto;
	echo "Cuerpo: ".$cuerpo;*/

   if(mail($dest,$asunto,$cuerpo,$headers)){
     $result = '<div class="result_ok">Email enviado correctamente </div>';
     // si el envio fue exitoso reseteamos lo que el usuario escribio:
     $_POST['contact_name'] = '';
     $_POST['contact_email'] = '';
     //$_POST['asunto'] = '';
     $_POST['contact_message'] = '';
     }else{
       $result = '<div class="result_fail">Hubo un error al enviar el mensaje </div>';
     }
    header("location:index.html");
?>
