<?php

namespace CathyTest;

/**
 * Gets the result.
 */
class Result {

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

}
