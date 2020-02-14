<?php
/*
Plugin Name: SMTP phpmailer plugin
Plugin URI:  https://haha.nl/wordpress-plug-in-op-maat/
Description: Use as MU-plugin and set the needed config in wp-config.php. No need to use a bloated smtp plugin.
Version:     1.0.1
Author:      Herbert Hoekstra (haha!)
Author URI:  https://haha.nl/
License:     GPL2
 
SMTP Mailer Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
SMTP Mailer Plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

*/

// use the set up below in wp-config.php to set the values

/*

// set wp-smtp-mailer.php config
// uses mu-plugin wp-smtp-mailer.php
define('MAILER_ENABLED', true); // true or false
define('MAILER_HOST', 'mail.domein.nl'); // smtp host name
define('MAILER_PORT', '465'); // smtp port
define('MAILER_SMTPAUTH', true); // use authentication, true or false
define('MAILER_USERNAME', 'user'); // smtp user
define('MAILER_PASSWORD', 'password'); // smtp password
define('MAILER_SMTPSECURE', 'ssl'); // ssl or ...
define('FROM_EMAIL', 'van@domeinnaam.nl'); // from email address

*/

// stop reading here 
// -------------------------
// info: https://github.com/PHPMailer/PHPMailer/blob/master/examples/smtp.phps
// use phpmailer via smtp
// -------------------------

if (defined('MAILER_ENABLED') && MAILER_ENABLED ) {
	add_action('phpmailer_init', 'HHdev_mailer_settings');
}

function HHdev_mailer_settings($phpmailer) {

  $phpmailer->isSMTP();

  // If no filter is present default to site name as from name
  if (!has_filter('wp_mail_from_name')) {
    $phpmailer->FromName = get_bloginfo('name');
  }

  // If no filter is present default to custom email address as from
  if (!has_filter('wp_mail_from')) {

    if (defined('FROM_EMAIL') ) {
      $phpmailer->From = FROM_EMAIL;
    } 

  }

  $phpmailer->Host = MAILER_HOST;
  $phpmailer->Port = MAILER_PORT;

  if (defined('MAILER_SELFSIGNED') ) {
    $phpmailer->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );
  }

  if (defined('MAILER_SMTPSECURE')) $phpmailer->SMTPSecure = MAILER_SMTPSECURE;
  if (defined('MAILER_SMTPAUTOTLS')) $phpmailer->SMTPAutoTLS = MAILER_SMTPAUTOTLS;
  
  $phpmailer->SMTPAuth = MAILER_SMTPAUTH;
  $phpmailer->Username = MAILER_USERNAME;
  $phpmailer->Password = MAILER_PASSWORD;
  
}
