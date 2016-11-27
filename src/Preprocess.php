<?php

namespace CathyTest;

/**
 * Preprocesses form input.
 */
class Preprocess {

  /**
   * Returns a safe string with some simplification.
   *
   * Strips out optional leading @ and trailing spaces.
   *
   * @param string $username
   *   Input from the username field.
   *
   * @return string
   *   Processed username.
   */
  public function preprocessUsername($username) {
    // Trim trailing whitespace.
    $username = rtrim($username);

    // Remove leading @ symbol.
    $stringToReplace = '@';
    $pos = strpos($username, $stringToReplace);
    if ($pos !== false) {
      $username = substr_replace($username, '', $pos, strlen($stringToReplace));
    }

    return $username;
  }

}
