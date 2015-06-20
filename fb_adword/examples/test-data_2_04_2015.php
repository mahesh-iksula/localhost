<?php

$access_token = "CAALAlGSfjtABAFI2FUOYKRZBZBY10enZBKKADKzqaQAUFZB8rXQc7FLH90nPEX6Ghd5zn7xsKmeU7EYh91X1CCslCupo3zfa5K1z4ZC3RtW3jxoFufXEX0nbN50vnlu2qMsHnZAkRIcX1VT0jEEJixyvb8coqAFcJspjghdHlq8M1C83MZA8CIUZCkyBAPrJkfHyzJ7E5arFvPDRpY0Xcbk7QrTU41GCbZBT0Ogt3qA67iAZDZD";
$app_id = "774693529292496";
$app_secret = "689c64b50b7778bff09130908e731208";
// should begin with "act_" (eg: $account_id = 'act_1234567890';)
$account_id = 'act_1375046742763420';
define('SDK_DIR', __DIR__ . '/..'); // Path to the SDK directory
$loader = include SDK_DIR.'/vendor/autoload.php';
// Configurations - End

if (is_null($access_token) || is_null($app_id) || is_null($app_secret)) {
  throw new \Exception(
    'You must set your access token, app id and app secret before executing'
  );
}

if (is_null($account_id)) {
  throw new \Exception(
    'You must set your account id before executing');
}

use FacebookAds\Api;

// Initialize a new Session and instanciate an Api object
Api::init($app_id, $app_secret, $access_token);

// The Api object is now available trough singleton
$api = Api::instance();

//print_r($api);

use FacebookAds\Object\AdAccount;

/*$account = new AdAccount();
$account->name = '123';
echo $account->name;
*/
//use FacebookAds\Object\AdAccount;
use FacebookAds\Object\Fields\AdAccountFields;

$fields = array(
  AdAccountFields::ID,
  AdAccountFields::NAME,
  AdAccountFields::DAILY_SPEND_LIMIT,
);
print_r($fields);

$account = new AdAccount($account_id);
$account->read($fields);

print_r($account);

?>