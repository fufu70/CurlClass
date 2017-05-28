# CurlClass

A simplification of the curl commands 

This allows for a reusable templating structure that can accomodate most general needs.

## Usage

To include the CurlClass in your composer file add the repo directory into your repositories section in the composer file and add the name of the module into the require section of the composer file. Also include the [ReflectionClass](https://github.com/fufu70/ReflectionClass).

```
"repositories": {
    ...
    { 
      "type": "vcs", 
      "url": "https://github.com/fufu70/CurlClass.git"
    },
    { 
      "type": "vcs",
      "url": "https://github.com/fufu70/ReflectionClass.git"
    }
    ...
}

...

"require": {
    ...
    "fufu70/curl-class": "dev-master",
    "fufu70/reflection-class": "dev-master"
    ...
}
```

To send a get Request pass the endpoint and the data to the `Curl::get` command

```php
<?php

use Common\Curl;

$response = Curl::get(
  'http://example.com/endpoint'
  [
    'name' => 'value',
    'another_name' => 'another_value'
  ]
);

```

The post request (`Curl::post`) works excactly the same way, except for the function name.


```php
<?php

use Common\Curl;

$response = Curl::post(
  'http://example.com/endpoint'
  [
    'name' => 'value',
    'another_name' => 'another_value'
  ]
);

```