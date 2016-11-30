<?php

namespace CathyTest;

/**
 * Gathers the tweet result.
 */
class GathererController implements GathererControllerInterface {

  /**
   * The gatherer.
   *
   * @var \CathyTest\GathererInterface
   */
  protected $gatherer;

  /**
   * Constructs a \CathyTest\GathererController object.
   *
   * @param \CathyTest\GathererInterface $gatherer
   *   The gatherer.
   */
  public function __construct(GathererInterface $gatherer) {
    $this->gatherer = $gatherer;
  }

  /**
   * {@inheritdoc}
   */
  public function gather($request) {
    $this->gatherer->setUsername($request['user']);
  }

}
