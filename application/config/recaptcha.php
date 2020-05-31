<?php

defined('BASEPATH') or exit('No direct script access allowed');


// To use reCAPTCHA, you need to sign up for an API key pair for your site.
// link: http://www.google.com/recaptcha/admin
$config['recaptcha_site_key'] = '6LeibeIUAAAAAPa5UWNA0mxCj4b13r3X5BpkZEyu';
$config['recaptcha_secret_key'] = '6LeibeIUAAAAAEpOsR3KSQTeDb2QN2XkDUwWBXE3';


// reCAPTCHA supported 40+ languages listed here:
// https://developers.google.com/recaptcha/docs/language
$config['recaptcha_lang'] = 'en';

/* End of file recaptcha.php */
/* Location: ./application/config/recaptcha.php */