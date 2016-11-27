<?php

namespace CathyTest;

/**
 * Validates form input.
 */
class Validation {

  /**
   * Returns if username is valid.
   *
   * @param string $username
   *   Input from the username field.
   *
   * @return bool
   *   Whether input is valid or not.
   */
  public function isValidUsername($username) {
    $valid = TRUE;

    // Just a tiny bit of validation. No spaces allowed.
    if (strpos($username, ' ') !== false) {
      $valid = FALSE;
    }

    return $valid;
  }

}
