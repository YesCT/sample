<?php

namespace CathyTest\Tests\Unit;

use CathyTest\Result;

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
   * @dataProvider providerTestHasError
   */
  public function testHasError($result_json, $expected) {
    $result = new Result();
    $this->assertEquals($expected, $result_json);
  }

  public function providerTestHasError() {
    return [
      'mismatch' => [
        FALSE,
        TRUE,
      ],
      'match' => [
        TRUE,
        TRUE,
      ],
    ];
  }

}
