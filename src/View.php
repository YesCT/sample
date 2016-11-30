<?php

namespace CathyTest;

/**
 * Outputs the tweet information.
 */
class View implements ViewInterface {

  /**
   * The gatherer of information.
   *
   * @var GathererInterface
   */
  protected $gatherer;

  /**
   * The information to display.
   *
   * @var string
   */
  protected $info = '';

  /**
   * Constructs a \CathyTest\View object.
   *
   * @param \CathyTest\GathererInterface $gatherer
   *   The gatherer of information.
   *
   * @param string $info
   *   Optional, the information to display.
   */
  public function __construct(GathererInterface $gatherer, $info  = 'description') {
    $this->gatherer = $gatherer;
    $this->info = $info;
  }

  /**
   * {@inheritdoc}
   */
  public function output() {
    $result_html = '';

    $result_html .= $this->outputForm();

    $username = $this->gatherer->getUsername();

    if (!empty($username)) {
      $result_html .= "<h2>User</h2>\n";
      $result_html .= $username;
      $result_html .= "\n";
    }

    if(!$this->gatherer->isValidUsername()) {
      $result_html .= $this->outputError();
    }
    else {
      $result_html .= $this->outputResult();
    }

    return $result_html;
  }

  /**
   * Outputs a validation error message.
   *
   * @return string
   *   HTML of the message.
   */
  public function outputError() {
    $result_html = '';

    $username = $this->gatherer->getUsername();

    $result_html .= "<h2>Error</h2>\n";
    $result_html .= $username . " is an invalid username.";
    $result_html .= "\n";

    return $result_html;
  }

  /**
   * Outputs an error message based on the twitter result.
   *
   * @return string
   *   HTML of the message.
   */
  public function outputTwitterError() {
    $result_html = '';

    $username = $this->gatherer->getUsername();

    $result_html .= "<h2>Error</h2>\n";
    $result_html .= "Could not get results from twitter for user $username. ";
    $result_html .= "\n";

    return $result_html;
  }

  /**
   * Outputs the result.
   *
   * @return string
   *   HTML of the result.
   */
  public function outputResult() {
    $result_html = '';

    $result = new Result();

    // If no error, process the JSON result.
    $result_json =$this->gatherer->getJsonTimeline();

    if (!$result->hasError($result_json)) {
      $description = $result->getDescription($result_json);
      $id = $result->getId($result_json);

      // Print out select information.
      $result_html .= "<h2>User description</h2>\n";
      $result_html .= $description;

      $result_html .= "<h2>Tweet id</h2>\n";
      $result_html .= $id;
    }
    else {
      $result_html .= $this->outputTwitterError();
    }

    // Print out the raw JSON for debugging.
    $result_html .= "<h2>Raw</h2>\n";
    $result_html .= $result_json;

    return $result_html;
  }

  /**
   * Outputs the form.
   *
   * @return string
   *   HTML of the form.
   */
  public function outputForm() {
    $result_html = '';

    $action = htmlspecialchars($_SERVER["PHP_SELF"]);
    $result_html .= '<form name="twitterWidget" method="get" action="' . $action . '" >';
    $result_html .= "\n";
    $result_html .= '<label for="user">Twitter username: </label>';
    $result_html .= '<input type="text" name="user" id="user" value="" />';
    $result_html .= '<input type="submit" value="Gather Info" />';
    $result_html .= "\n";
    $result_html .= '</form>';
    $result_html .= "\n";
    $result_html .= "\n";

    return $result_html;
  }

}
