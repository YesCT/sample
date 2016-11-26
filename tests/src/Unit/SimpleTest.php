<?php

namespace CathyTest\Tests\Unit;

/**
 * Tests if a phpunit test can run.
 */
class SimpleTest extends \PHPUnit_Framework_TestCase {

  /**
   * @{inheritdoc}
   */
  protected function setUp() {
  }

  /**
   */
  public function testHasError() {
    $this->assertEquals(TRUE, TRUE);
  }

}
