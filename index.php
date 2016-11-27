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

?>

<html><head><title>Cathy Test</title></head><body>

<form name="twitterUsername" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
Username: <input type="text" name="user" value="" />
<input type="submit" value="Gather Tweets" />
</form>

<?php

// If the form has been submitted.
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $username_input = $_GET["user"];

  $preprocess = new \CathyTest\Preprocess();
  $user = $preprocess->preprocessUsername($username_input);

  $validation = new \CathyTest\Validation();
  $username_is_valid = $validation->isValidUsername($user);

  // Check for non-empty and valid input.
  if ($user != '') {
    if (!$username_is_valid) {
      echo("<h2>User Not Valid</h2>");
      echo($user);
    }
    else {
      echo("<h2>User</h2>");
      echo($user);

      // Get the results from twitter for the username from the form.
      $something = new \CathyTest\JsonResult();
      $result_json = $something->getJsonTimeline($settings, $user);

      $result = new \CathyTest\Result();

      // If no error, process the JSON result.
      if (!$result->hasError($result_json)) {
        $description = $result->getDescription($result_json);
        $id = $result->getId($result_json);

        // Print out select information.
        echo("<h2>User description</h2>");
        echo($description);

        echo("<h2>Tweet id</h2>");
        echo($id);
      }

      // Print out the raw JSON for debugging.
      echo("<h2>Raw</h2>");
      echo($result_json);
    }
  }
}

echo("</body></html>");
