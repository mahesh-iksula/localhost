<pre>
<?php

$access_token = "CAALAlGSfjtABAEUwUPFeqC7DyMeOQHGDut0ZBZAfqD8WZCbVya2b7kGZAdJMQsnc0EIUM4iaGNTFzvhS2Y5K0ALIO2l6dBMbHWTXMPmUPorVQLdu4zlXlmu87QEZCJm3v1oikupV0Xwdj0gievEOyC1m40MZC1qQtg7qyGGpmZBoT9KCcYB1djsD2t4ZAsqyw1DAlVqrWtL8lqsc3mNmqehe8ZBfQyeFK34KHDug5F7bvzgZDZD";
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

// use FacebookAds\Object\AdAccount;

/*$account = new AdAccount();
$account->name = '123';
echo $account->name;
*/
use FacebookAds\Object\AdAccount;
use FacebookAds\Object\AdCampaign;
use FacebookAds\Object\Fields\AdCampaignFields;
use FacebookAds\Object\Fields\AdAccountFields;
use FacebookAds\Object\Values\InsightsPresets;

$fields = array(
  AdAccountFields::ID,
  AdAccountFields::NAME,
  AdAccountFields::DAILY_SPEND_LIMIT,
  AdAccountFields::BALANCE,
  AdAccountFields::AMOUNT_SPENT,
);

$account = new AdAccount($account_id);
$account->read($fields);

$campaigns = $account->getAdCampaigns(array(
  AdCampaignFields::NAME,
  AdCampaignFields::ID,
));
foreach ($campaigns as $campaign) {
	echo "<h1>";
  	echo $campaign_id  = $campaign->id;
  	echo $campaign->name;
  	echo "</h1>";
	$campaignNew = new AdCampaign($campaign_id);
	// $params = array(spend,reach,frequency,clicks,impressions,ctr,cpc,actions);

  $fields = array();

/*$params = array(
  'date_preset'=>'last_7_days',
  'data_columns'=>"['adgroup_id','actions','spend']",
);*/
$params = array(
    'data_columns'=>array(
        'spend',
        'reach',
        'frequency',
        'clicks',
        'campaign_name',
        'impressions',
        'ctr',
        'cpc',
        'action_values_7d_view',
        'actions_1d_view_by_convs',
        'actions_7d_view_by_convs',
        'actions_28d_view_by_convs',
        'actions_1d_click_by_convs',
        'actions_7d_click_by_convs',
        'actions_28d_click_by_convs',
        'action_values_1d_view',
        'action_values_7d_view',
        'action_values_28d_view',
        'action_values_1d_click',
        'action_values_7d_click',
        'action_values_28d_click',
        'action_values_1d_view_by_convs',
        'action_values_7d_view_by_convs',
        'action_values_28d_view_by_convs',
        'action_values_1d_click_by_convs',
        'action_values_7d_click_by_convs',
        'action_values_28d_click_by_convs',
    ),
    'date_preset'=>'last_7_days',
);

$stats = $account->getReportsStats($fields, $params);
  print_r($stats);
  break;
  // foreach($stats as $stat) {
  //   // echo $stat->impressions;
  //   echo $stat->campaign_name;
  // }

}

/*$fields = array();

$params = array(
  'data_columns' => array(
    'adgroup_id',
    'actions',
    'action_target_name',
  ),
  'filters' => array(
    array(
      'field' => 'action_type',
      'type' => 'in',
      'value' => array(
      'link_click',
     ),
    ),
  ),
  'date_preset' => 'last_30_days',
  'time_increment' => 'all_days',
  'actions_group_by' => array(
    'action_type',
    'action_target_id',
    'action_destination',
  ),
);

$adaccount = new AdAccount($account_id);
$stats = $adaccount->getStats($fields, $params);
print_r($stats);
*/
?>