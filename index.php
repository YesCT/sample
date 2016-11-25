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
$result_json = $something->getJsonResult($settings);

$result = new \CathyTest\Result();
$description = $result->getDescription($result_json);

echo("<html><head><title>drupal</title></head><body>");

echo($description);

echo("</body></html>");
