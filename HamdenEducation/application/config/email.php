<?php defined('BASEPATH') OR exit('No direct script access allowed');
$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'smtp.gmail.com', 
    'smtp_port' => 587, // or 465
    'smtp_user' => 'hefcsc400@gmail.com',
    'smtp_pass' => '', // Not showing password
    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '10', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE

);
?>