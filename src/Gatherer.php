<?php

namespace CathyTest;

/**
 * Gathers the tweet result.
 */
class Gatherer implements GathererInterface {

  /**
   * Tokens and secrets.
   *
   * @var array
   */
  protected $settings = [];

  /**
   * Username.
   *
   * @var string
   */
  protected $username = '';

  /**
   * Constructs a \CathyTest\Gatherer object.
   */
  public function __construct() {
    $this->settings = [
      'oauth_access_token' => YOUR_OAUTH_ACCESS_TOKEN,
      'oauth_access_token_secret' => YOUR_OAUTH_ACCESS_TOKEN_SECRET,
      'consumer_key' => YOUR_CONSUMER_KEY,
      'consumer_secret' => YOUR_CONSUMER_SECRET,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getUsername() {
    $username = $this->username;

    return $username;
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    $description = 'something';

    return $description;
  }

  /**
   * {@inheritdoc}
   */
  public function setUsername($username) {
    $this->username = $username;
  }

}
