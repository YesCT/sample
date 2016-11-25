<?php

namespace CathyTest;

/**
 * Gets the result.
 */
class Result {

  /**
   * Returns if there was an error or not.
   *
   * @param string $result_json
   *   JSON result.
   *
   * @return bool
   *   Whether there was an error or not.
   */
  public function hasError($result_json) {
    $hasError = FALSE;

    $result = json_decode($result_json, TRUE);
    if (array_key_exists('errors', $result)) {
      $hasError = TRUE;
    }

    return $hasError;
  }

  /**
   * Gets the description.
   *
   * @param string $result_json
   *   JSON result.
   *
   * @return string
   *   Description.
   */
  public function getDescription($result_json) {
    $result = json_decode($result_json, TRUE);
    foreach ($result as $item) {
      $description = $item['user']['description'];
    }

    return $description;
  }

  /**
   * Gets the tweet ID.
   *
   * @param string $result_json
   *   JSON result.
   *
   * @return string
   *   ID.
   */
  public function getId($result_json) {
    $result = json_decode($result_json, TRUE);
    foreach ($result as $item) {
      $tweet_id = $item['id'];
    }

    return $tweet_id;
  }

}
