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

?>

<html><head><title>Cathy Test</title></head><body>

<?php

$gatherer = new \CathyTest\Gatherer();

$controller = new \CathyTest\GathererController($gatherer);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if(isset($_GET['user'])) {
    $username_input = $_GET["user"];
    $controller->gather($_GET);
  }
}

$view = new \CathyTest\View($gatherer);

echo $view->output();

?>

</body></html>
