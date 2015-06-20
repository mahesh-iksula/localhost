<?php
require_once 'vendor/Autoloader.php';
require_once '../google-api-php-client/src/Google_Client.php';

$client = new Google_Client();
$client->setApplicationName('My Project');
$client->setClientId("659770755621-kineai5ric6rekc6q3cvjcohagi4k0g8.apps.googleusercontent.com");

$cred = new Google_Auth_AssertionCredentials(
    GOOGLE_CLIENTEMAIL,
    array('https://spreadsheets.google.com/feeds'),
    file_get_contents("My Project-6a60df7160cd.p12")
);

$client->setAssertionCredentials($cred);

if($client->isAccessTokenExpired()) {
    $client->getAuth()->refreshTokenWithAssertion($cred);
}

$obj_token  = json_decode($client->getAccessToken());
$accessToken = $obj_token->access_token;

$serviceRequest = new DefaultServiceRequest($accessToken);
ServiceRequestFactory::setInstance($serviceRequest);

$spreadsheetService = new Google\Spreadsheet\SpreadsheetService();
$spreadsheetFeed = $spreadsheetService->getSpreadsheets();
?>