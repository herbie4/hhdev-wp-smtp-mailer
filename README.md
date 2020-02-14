# hahadev Wordpress SMTP mailer
## Send mail via STMP not php mailer

Use SMTP over php mailer to send emails. 
Set the configuration details in wp-config.php
Add only tht wp-smtp-mailer.php file to your /mu-plugins directory. If this does not exist does create it in /wp-content. 

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