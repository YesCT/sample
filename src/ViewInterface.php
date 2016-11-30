<?php

namespace CathyTest;

/**
 * Provides an interface for viewing information.
 */
interface ViewInterface {

  /**
   * Outputs the information.
   *
   * @return string
   *   HTML to display.
   */
  public function output();

}
