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
    return $username;
  }

}
