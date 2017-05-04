# IWEventos Api Client 

PHP Library based on Guzzle to consume IWEventos API.

The biggest advantage in using Guzzle is that you can easely attach [Guzzle plugins](http://guzzle.readthedocs.org/en/latest/plugins/plugins-overview.html) to your client. [Here](#attach-guzzle-plugin), for example,you can see how to attach the log plugin and write all your requests to a file.

For more information about api methods, see [Official documentation for IWEventos API](http://docs.iweventos.apiary.io) 

To use this api you must have an access token and the server ip authenticated next to IWEventos

## Installation

The recommended way to install this library is through Composer.
For information about Composer and how to install in [look here](http://getcomposer.org/doc/00-intro.md).

From the command line run 

```shell
composer require dmandrade/iweventos-api-client
```

## Usage
```php
<?php

// This file is generated by Composer
require_once 'vendor/autoload.php';

$iweventos = new \Dmandrade\IWEventos\Api\Client("insert_here_api_base_url", "insert_here_api_access_token");

$response = $iweventos->eventos();

print_r($response);

```
## cURL options

If you want to set a specific timeout, sust set the cURL timeout options in the client:

```php

$iweventos = new \Dmandrade\IWEventos\Api\Client("insert_here_api_base_url", "insert_here_api_access_token");
// set cURL timeout, you can specify any cURL options
$iweventos->setConfig(array(
    'curl.options' => 
        array(
            CURLOPT_TIMEOUT => 2, 
            CURLOPT_CONNECTTIMEOUT => 2
        )
    ));

$response = $iweventos->eventos();

print_r($response);

```


## Available method

 * congressistasById(array|null $parameters = null)
 * congressistasBy(array|null $parameters = null)
 * datas(array|null $parameters = null)
 * salas(array|null $parameters = null)
 * tipoAtividades(array|null $parameters = null)
 * eventos(array|null $parameters = null)
 * funcoesPalestrantes(array|null $parameters = null)
 * palestrantes(array|null $parameters = null)
 * atividades(array|null $parameters = null)
 * subatividades(array|null $parameters = null)

## Attach Guzzle plugin

Here you can see how to attach Guzzle Log plug to your client and save all your requests to a file.

*NB:* To run this script you need `monolog/monolog`

```php
<?php
// This file is generated by Composer
require_once 'vendor/autoload.php';

use Guzzle\Log\MessageFormatter;
use Guzzle\Log\MonologLogAdapter;
use Guzzle\Plugin\Log\LogPlugin;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

$logger = new Logger('client');
$logger->pushHandler(new StreamHandler('/tmp/iweventos_api.log'));
$adapter = new MonologLogAdapter($logger);
$logPlugin = new LogPlugin($adapter, MessageFormatter::DEBUG_FORMAT);

$iweventos = new \Dmandrade\IWEventos\Api\Client("insert_here_api_base_url", "insert_here_api_access_token");;
$iweventos->addSubscriber($logPlugin);

$response = $iweventos->eventos();

print_r($response);
```

Now in `/tmp/iweventos_api.log` you can see all your requests.