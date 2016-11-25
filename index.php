<?php

require __DIR__ . '/vendor/autoload.php';

/**
 * Do not commit secrets to the git repo.
 *
 * Format like:
 * @code
 * const YOUR_OAUTH_ACCESS_TOKEN = 'xxxx';
 * const YOUR_OAUTH_ACCESS_TOKEN_SECRET = 'xxxx';
 * const YOUR_CONSUMER_KEY = 'xxxx';
 * const YOUR_CONSUMER_SECRET = 'xxxx';
 * @endcode
 */
require_once('mysecrets.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
  'oauth_access_token' => YOUR_OAUTH_ACCESS_TOKEN,
  'oauth_access_token_secret' => YOUR_OAUTH_ACCESS_TOKEN_SECRET,
  'consumer_key' => YOUR_CONSUMER_KEY,
  'consumer_secret' => YOUR_CONSUMER_SECRET,
);

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
$getfield = '?screen_name=YesCT&count=1';
$twitter = new TwitterAPIExchange($settings);

$result_json = $twitter->setGetfield($getfield)
  ->buildOauth($url, $requestMethod)
  ->performRequest();

$result = json_decode($result_json, TRUE);
foreach ($result as $item) {
  $output = $item['user']['description'];
}

echo("<html><head><title>drupal</title></head><body>");

echo($output);

echo("</body></html>");
