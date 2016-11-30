<?php

namespace CathyTest;

/**
 * Provides an interface for gathering information.
 */
interface GathererInterface {

  /**
   * Gets username.
   *
   * @return string
   *   Username.
   */
  public function getUsername();

  /**
   * Returns wether the username is valid or not.
   *
   * @return bool
   *   Valid or not.
   */
  public function isValidUsername();

  /**
   * Gets user's profile description.
   *
   * @return string
   *   Description.
   */
  public function getDescription();

  /**
   * Stores the username.
   *
   * @param string $username
   *   Username.
   */
  public function setUsername($username);

}
