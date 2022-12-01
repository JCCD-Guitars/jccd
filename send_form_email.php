<?php
if(isset($_POST['email'])) {
 
    // 
 
    $email_to = "julio82.cardenas@gmail.com";
 
    $email_subject = "Contacto desde Web";
 
    function died($error) {
 
        // mensajes de error
 
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
 
        echo "Detalle de los errores.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Porfavor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['first_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        die('Lo sentimos pero parece haber un problema con los datos enviados.');
    }
 //En esta parte el valor "name"  sirve para crear las variables que recolectaran la información de cada campo 
    $first_name = $_POST['first_name']; // requerido 
    $email_from = $_POST['email']; // requerido 
    $message = $_POST['message']; // requerido 
    $error_message = "";//Linea numero 52;
 
//En esta parte se verifica que la dirección de correo sea válida 
 
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }
 
//En esta parte se validan las cadenas de texto
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'El formato del nombre no es válido, evite usar caracteres especiales<br />';
 
  }
 
  if(strlen($message) < 2) {
 
    $error_message .= 'El formato del texto no es válido.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    die($error_message);
 
  }
 
//Este es el cuerpo del mensaje tal y como llegará al correo
 
    $email_message = "Contenido del Mensaje.\n\n";
 
 
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }

    $email_message .= "Nombre: ".clean_string($first_name)."\n"; 
    $email_message .= "Email: ".clean_string($email_from)."\n"; 
    $email_message .= "Mensaje: ".clean_string($message)."\n";
 
 
//Se crean los encabezados del correo 
$headers = 'From: '.$email_from."\r\n". 
'Reply-To: '.$email_from."\r\n" . 
'X-Mailer: PHP/' . phpversion(); 
@mail($email_to, $email_subject, $email_message, $headers); 
?>
 
 
 
<!-- Mensaje de que fue enviado-->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Refresh" content="3; url=javascript:window.close();" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>JCCD Lauder&iacute;a  </title>
  <link href="css/preloader.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/grayscale.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.ico">
  <!--[if lt IE 9]>
    <script src="scripts/respond.min.js"></script>
  <![endif]-->  
      
</head>

<body id="page-top">

  <header class="" id="home">
    <h1 class=""><span class=""></span>Gracias por tu mensaje<span class=""></span></span></span></h1> 
    <b>Nos contactaremos contigo a la brevedad.</b><br />
    Esta ventana se cerrara en unos segundos, si no lo hace, 
    <a href="javascript:window.close();">da click aqui</a> 
  </header>

<script>
  setTimeout(function(){ javascript:window.close(); }, 3000);
</script>

  <!-- Contact Section -->
  <section class="contact-section bg-black">
    <div class="container text-light">    
      <div class="row">

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-map-marked-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Direcci&oacute;n</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                Metro Muzquiz
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="mailto:julio82.cardenas@gmail.com">julio82.cardenas@gmail.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Tel&eacute;fono</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="tel:525548360993">+52 55 4836 0993</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="social d-flex justify-content-center">
        <a href="https://web.facebook.com/lauderiajccd" class="mx-2" target="blank">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.youtube.com/channel/UCZpmsF_jrh5amcXyBV2wXFg" target="_blank" class="mx-2" target="blank">
          <i class="fab fa-youtube"></i>
        </a>
        <a href="https://wa.me/525548360993?text=Hola%20me%20comunico%20desde%20su%20p&aacute;gina%20web%20y%20estoy%20interesado%20en" target="blank" class="mx-2">
          <i class="fab fa-whatsapp"></i>
        </a>
        <a href="tel:525548360993" target="blank" class="mx-2">
          <i class="fas fa-mobile-alt"></i>
        </a>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; JCCD 2020
    </div>
  </footer>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/grayscale.min.js"></script>
</body>
</html>


<!-- -->
<?php
 
}
 
?>
