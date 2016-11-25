<?php

namespace CathyTest;

use TwitterAPIExchange;

/**
 * Gets the JSON result.
 */
class JsonResult {

  /**
   * Gets the JSON result.
   *
   * @param array $settings
   *   Secret tokens.
   *
   * @return string
   *   JSON result.
   */
  public function getJsonResult(array $settings) {
    $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
    $requestMethod = "GET";
    $getfield = '?screen_name=YesCT&count=1';
    $twitter = new TwitterAPIExchange($settings);

    $result_json = $twitter->setGetfield($getfield)
      ->buildOauth($url, $requestMethod)
      ->performRequest();

    return $result_json;
  }

}
