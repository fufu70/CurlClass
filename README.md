# SendGrid-LightWeight-PHP-API

SendGrid API for interfacing with [custom templates](https://sendgrid.com/docs/User_Guide/Transactional_Templates/create_edit.html) created inside of sendgrid.
The assumption of this API is that you created a simple Template containing:

* text
* button_text
* button_link
* preheader-text

This allows for a reusable templating structure that can accomodate most general needs.

## Usage

To include the SendGrid-LightWeight-PHP-API in your composer file add the repo directory into your repositories section in the composer file and add the name of the module into the require section of the composer file.

```
"repositories": {
    ...
    { 
      "type": "vcs", 
      "url": "https://github.com/fufu70/SendGrid-LightWeight-PHP-API.git"
    }
    ...
}

...

"require": {
    ...
    "fufu70/sendgrid-lightweight-php-api": "dev-master",
    ...
}
```

Add in your Sendgrid specific parameters inside of your config/params.php file

```php
<?php

...

	'send_grid' => [
		'username'    => 'My_SendGrid_Username',
		'password'    => 'My_SendGrid_Password',
		'template_id' => 'My_SendGrid_TemplateId',
		'name'	      => 'My_SendGrid_Name',
		'key' 	      => 'My_SendGrid_Key'
	]

...

```