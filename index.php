<?php

// Wrapper referenced in
// https://iag.me/socialmedia/build-your-first-twitter-app-using-php-in-8-easy-steps/
//require_once('src/twitter-api-php/TwitterAPIExchange.php');

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

echo("<html><head><title>drupal</title></head><body>");
echo("me");
echo("</body></html>");
