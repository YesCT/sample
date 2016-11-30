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
   * Gets the JSON of a user's timeline.
   *
   * @return string
   *   Timeline as JSON.
   */
  public function getJsonTimeline();

  /**
   * Stores the username.
   *
   * @param string $username
   *   Username.
   */
  public function setUsername($username);

}
