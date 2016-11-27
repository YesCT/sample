<?php

namespace CathyTest\Tests\Unit;

use CathyTest\Validation;

/**
 * Tests validation logic.
 */
class ValidationTest extends \PHPUnit_Framework_TestCase {

  /**
   * @{inheritdoc}
   */
  protected function setUp() {
  }

  /**
   * @covers \CathyTest\Validation::isValidUsername
   * @dataProvider providerTestIsValidUsername
   */
  public function testIsValidUsername($username, $expected) {
    $validation = new Validation();
    $this->assertEquals($expected, $validation->isValidUsername($username));
  }

  /**
   * Provides test data for testIsValidUsername().
   *
   * @return array
   *   The test data as an array, with sample username strings and the
   *   expected boolean value of if is valid or not.
   */
  public function providerTestIsValidUsername() {
    return [
      'valid' => [
        'YesCT',
        TRUE,
      ],
      'not valid' => [
        'x x',
        FALSE,
      ],
    ];
  }

}
