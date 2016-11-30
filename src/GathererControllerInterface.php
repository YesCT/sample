<?php

namespace CathyTest;

/**
 * Provides an interface for the gatherer controller.
 */
interface GathererControllerInterface {

  /**
   * Gathers info.
   *
   * @param array $request
   *   The request information as an array with key username.
   */
  public function gather($request);

}
