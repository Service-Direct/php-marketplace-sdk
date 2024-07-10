<?php

namespace Examples;

use ServiceDirect\Partners\PartnersClient;

require_once '../vendor/autoload.php';

/**
 * uses the request_id from the previous leg of the integration - request-bid
 * this leg gets a phone number after accepting the bid
 */

$key = '[YOUR_KEY_HERE]';

$client = new PartnersClient($key);

// optional fields are indicated by /*?*/
$requestData = [
    /*?*/'test_mode' => true,
    'sold_price' => 98,
    /*?*/'duration' => 60,
];

// the request id received from the /request route (see /examples/request-bid.php)
$requestId = 0;

$response = $client->post("request/$requestId/sold_price", $requestData);

echo "Status code: $client->last_http_code\n";
print_r($response);

/*
 * example response:
Array(
    [data] => Array(
        [success] => 1
        [message] => "Sold price received successfully"
        [tracking_id] => "<provided tracking id>" // present only when provided in the request bid endpoint
        [test_mode] => true // present only in test mode
    )
)
*/
