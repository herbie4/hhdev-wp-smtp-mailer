# Wordpress SMTP mailer
## Send mail via STMP not phpmailer

Use SMTP over phpmailer to send emails. 
Just add the wp-smtp-mailer.php file to your /mu-plugins/ directory. If this does not exist does create it in /wp-content.
Set the configuration details in wp-config.php. 

Example settings:
``` 
// set wp-smtp-mailer.php config
// uses mu-plugin wp-smtp-mailer.php
define('MAILER_ENABLED', true); // true or false
define('MAILER_HOST', 'mail.domainname.com'); // smtp host name
define('MAILER_PORT', '465'); // smtp port
define('MAILER_SMTPAUTH', true); // use authentication, true or false
define('MAILER_USERNAME', 'user'); // smtp user
define('MAILER_PASSWORD', 'password'); // smtp password
define('MAILER_SMTPSECURE', 'ssl'); // ssl or ...
define('FROM_EMAIL', 'here@domainname.com'); // from email address
```

That's it...
