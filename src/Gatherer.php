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
   * Whether the username is valid or not.
   *
   * @var string
   */
  protected $isValidUsername = FALSE;

  /**
   * JSON of the timeline.
   *
   * @var string
   */
  protected $JsonTimeline ='';

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
  public function isValidUsername() {
    return $this->isValidUsername;
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
  public function getJsonTimeline() {
    return $this->JsonTimeline;
  }

  /**
   * {@inheritdoc}
   */
  public function setUsername($username) {
    $this->username = $username;

    $validation = new \CathyTest\Validation();
    $username_is_valid = $validation->isValidUsername($username);

    if($username_is_valid) {
      $this->isValidUsername = TRUE;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function setTimeline() {
    if($this->isValidUsername()) {
      // Get the results from twitter for the username from the form.
      $json_result = new \CathyTest\JsonResult();
      $this->JsonTimeline = $json_result->getJsonTimeline($this->settings, $this->username);
    }
  }

}
