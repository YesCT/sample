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
   * Outputs the result
   *
   * @return string
   *   HTML of the result.
   */
  public function outputResult() {
    $result_html = '';

    $result_html .= "<h2>Something</h2>\n";
    $result_html .= "Something.";
    $result_html .= "\n";

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
    $result_html .= '<form name="twitterUsername" method="get" action="' . $action . '" >';
    $result_html .= "\n";
    $result_html .= '<input type="text" name="user" value="" />';
    $result_html .= '<input type="submit" value="Gather Info" />';
    $result_html .= "\n";
    $result_html .= '</form>';
    $result_html .= "\n";
    $result_html .= "\n";

    return $result_html;
  }

}
