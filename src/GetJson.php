<?php

namespace CathyTest;

use TwitterAPIExchange;

/**
 * Gets the JSON result.
 */
class JsonResult {

  /**
   * Gets user's timeline as a JSON result.
   *
   * @param array $settings
   *   Secret tokens.
   * @param string $user
   *   Username.
   *
   * @return string
   *   JSON result.
   */
  public function getJsonTimeline(array $settings, $user) {
    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
    $requestMethod = "GET";
    $getfield = '?screen_name=' . $user . '&count=1';
    $twitter = new TwitterAPIExchange($settings);

    $result_json = $twitter->setGetfield($getfield)
      ->buildOauth($url, $requestMethod)
      ->performRequest();

    return $result_json;
  }

}
