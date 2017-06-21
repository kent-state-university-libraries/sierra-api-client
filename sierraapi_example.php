#!/usr/bin/php -q
<?php
// you don't need to include if using composer for packaging
include('src/IIISierra/APIClient/Sierra.php');

use \IIISierra\APIClient\Sierra;

$api = new Sierra(array(
    'endpoint' => 'SIERRA_ENDPOINT',
    'key' => 'API_KEY',
    'secret' => 'MY_SECRET'
));


$res = $api->query('bibs/6349196/marc', array(), true);


print_r($res);

?>