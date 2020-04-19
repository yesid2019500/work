<?php
  /**
  Requiere la biblioteca "Formulario de correo electrónico PHP"
   * La biblioteca "Formulario de correo electrónico 
   * La biblioteca debe cargarse en: vendor / php-email-form / php-email-form.php
   * /
  */

  $receiving_email_address = 'yesidmondragon26@hotmail.com.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'No se puede cargar la biblioteca "Formulario de correo electrónico PHP"!');
  }


  // envio de correos
  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  
  // $contact->smtp = array(
  //   'host' => 'example.com',
  //   'username' => 'example',
  //   'password' => 'pass',
  //   'port' => '587'
  // );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
