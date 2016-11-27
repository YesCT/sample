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
    return TRUE;
  }

}
