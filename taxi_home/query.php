<?php
    if(isset($_POST['boton'])){
        if($_POST['nombre'] == ''){
            $errors[1] = '<span class="error">Ingrese su nombre</span>';
        }else if($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$_POST['email'])){
            $errors[2] = '<span class="error">Ingrese un email correcto</span>';
        }else if($_POST['asunto'] == ''){
            $errors[3] = '<span class="error">Ingrese un asunto</span>';
        }else if($_POST['mensaje'] == ''){
            $errors[4] = '<span class="error">Ingrese un mensaje</span>';
        }else{
            $dest = "cristian.alexis.g@gmail.com"; //Email de destino
            $nombre = $_POST['contact_name'];
            $email = $_POST['contact_email'];
            $asunto = "Consulta a traves de la web"; //Asunto
            $cuerpo = $_POST['contact_message']; //Cuerpo del mensaje
            //Cabeceras del correo
            $headers = "From: $nombre <$email>\r\n"; //Quien envia?
            $headers .= "X-Mailer: PHP5\n";
            $headers .= 'MIME-Version: 1.0' . "\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
 
            if(mail($dest,$asunto,$cuerpo,$headers)){
                $result = '<div class="result_ok">Email enviado correctamente </div>';
                // si el envio fue exitoso reseteamos lo que el usuario escribio:
                $_POST['nombre'] = '';
                $_POST['email'] = '';
                $_POST['asunto'] = '';
                $_POST['mensaje'] = '';
            }else{
                $result = '<div class="result_fail">Hubo un error al enviar el mensaje </div>';
            }
        }
    }
?>
<!--<html>
    <head>
        <title>Contacto</title>
        <link rel='stylesheet' href='estilos.css'>
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script>
        <script src='funciones.js'></script>
    </head>
    <body>
        <form class='contacto' method='POST' action=''>
            <div><label>Tu Nombre:</label><input type='text' class='nombre' name='nombre' value='<?php //if(isset($_POST['nombre'])){ echo $_POST['nombre']; } ?>'><?php if(isset($errors)){ echo $errors[1]; } ?></div>
            <div><label>Tu Email:</label><input type='text' class='email' name='email' value='<?php// if(isset($_POST['email'])){ $_POST['email']; } ?>'><?php if(isset($errors)){ echo $errors[2]; } ?></div>
            <div><label>Asunto:</label><input type='text' class='asunto' name='asunto' value='<?php //if(isset($_POST['asunto'])){ $_POST['asunto']; } ?>'><?php if(isset($errors)){ echo $errors[3]; } ?></div>
            <div><label>Mensaje:</label><textarea rows='6' class='mensaje' name='mensaje'><?php //if(isset($_POST['mensaje'])){ $_POST['mensaje']; } ?></textarea><?php if(isset($errors)){ echo $errors[4]; } ?></div>
            <div><input type='submit' value='Envia Mensaje' class='boton' name='boton'></div>
            <?php// if(isset($result)) { echo $result; } ?>
        </form>
    </body>
</html>-->