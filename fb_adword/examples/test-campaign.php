<pre>
<?php
ini_set('display_errors','On');
$access_token = "CAAWIQwIxTUUBAL9iccFWO179alp1o2U9oECzeuOr7MRaZCCiZCDDea6vEP9cE5XyLoLOhK8JEG3oNZCY6nMcqbVLiISLR2ZCYy4n6fHm4NjJGHhTOSYZB9qZBW91Gb7zlFDg6UgPa4DIiQWGThESuNSZAaUYSBt2a1ewQmuGW8lW3FQpplWxawY1u3aiFSjOYoZD";
$app_id = "1557196264525125";
$app_secret = "5f3f27919d888282ee29f8b4e06e561f";
// should begin with "act_" (eg: $account_id = 'act_1234567890';)
$account_id = 'act_930051093690541';
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
// foreach ($campaigns as $campaign) {
// 	echo "<h1>";
//   	echo $campaign_id  = $campaign->id;
//   	echo $campaign->name;
//   	echo "</h1>";

echo $campaign_id = "6025144719788";
echo $camapign_name = "Devanhalli_Villas_13thMarch";
	$campaignNew = new AdCampaign($campaign_id);
  $fields = array();

	$fields = array('spend','reach','frequency','clicks','impressions','ctr','cpc','objective','results','actions');
  $params = array(
  'date_preset' => InsightsPresets::THIS_WEEK,
  'time_increment' => 1,
  );
  //THIS_WEEK,YESTERDAY
  /*$params = array(
  'time_range' => array(
    'since' => '2015-04-01',
    'until' => '2015-04-07',
  ),
);*/

$insights = $campaignNew->getInsights($fields, $params);

// print_r($insights);
// exit;


foreach ($insights as $key => $value) {
  
  $arr = $value->getData();
  echo "<br>";
  echo $spends = $arr['spend'];
  echo "<br>";
  echo $reach = $arr['reach'];
  echo "<br>";
  echo $frequency = $arr['frequency'];
  echo "<br>";
  echo $clicks = $arr['clicks'];
  echo "<br>";
  echo $impressions = $arr['impressions'];
  echo "<br>";
  echo $ctr = $arr['ctr'];
  echo "<br>";
  echo $cpc = $arr['cpc'];
  echo "<br>";
  echo $results = $arr['results'];
  echo "<br>";
  echo $date_start = $arr['date_start'];
  echo "<br>";
  echo $date_stop = $arr['date_stop'];
  echo "<br>";

  $website_clicks = 0;

  if(isset($arr['actions'])){

    $actions = $arr['actions'];

    foreach ($actions as $key => $val) {

      if($val['action_type'] == 'link_click'){

      $website_clicks = $val['value'];//returns value of link_click attr. 

      }

    }
  }

  echo "Website Click = ".$website_clicks;
  echo "<br>";

  
}
// echo $insights['camapign_name'] = $campaign->name;
// echo $insights['camapign_id'] = $campaign->id;

// print_r($insights);

  // break;
// }


?>