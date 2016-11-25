<?php

require __DIR__ . '/vendor/autoload.php';

require_once('src/GetJson.php');
require_once('src/Result.php');

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
 *
 * @see https://dev.twitter.com/apps/
 */
require_once('mysecrets.php');

$settings = array(
  'oauth_access_token' => YOUR_OAUTH_ACCESS_TOKEN,
  'oauth_access_token_secret' => YOUR_OAUTH_ACCESS_TOKEN_SECRET,
  'consumer_key' => YOUR_CONSUMER_KEY,
  'consumer_secret' => YOUR_CONSUMER_SECRET,
);

$something = new \CathyTest\JsonResult();
$user = 'YesCT';
$result_json = $something->getJsonTimeline($settings, $user);

$result = new \CathyTest\Result();

echo("<html><head><title>Cathy Test</title></head><body>");

if (!$result->hasError($result_json)) {
  $description = $result->getDescription($result_json);
  $id = $result->getId($result_json);

  echo("<h2>User description</h2>");
  echo($description);

  echo("<h2>Tweet id</h2>");
  echo($id);
}

echo("<h2>Raw</h2>");

echo($result_json);

echo("</body></html>");
