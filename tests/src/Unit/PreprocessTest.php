<?php

namespace CathyTest\Tests\Unit;

use CathyTest\Preprocess;

/**
 * Tests preprocessing of input.
 */
class PreprocessTest extends \PHPUnit_Framework_TestCase {

  /**
   * @{inheritdoc}
   */
  protected function setUp() {
  }

  /**
   * @covers \CathyTest\Preprocess::preprocessUsername
   * @dataProvider providerTestPreprocessUsername
   */
  public function testPreprocessUsername($username, $expected) {
    $preprocess = new Preprocess();
    $this->assertEquals($expected, $preprocess->preprocessUsername($username));
  }

  /**
   * Provides test data for testPreprocessUsername().
   *
   * @return array
   *   The test data as an array, with sample username strings and the
   *   expected result of preprocessing it.
   */
  public function providerTestPreprocessUsername() {
    return [
      'same' => [
        'YesCT',
        'YesCT',
      ],
      'spaces' => [
        '   ',
        '',
      ],
      'trailing space' => [
        'YesCT ',
        'YesCT',
      ],
      'trailing spaces' => [
        'YesCT  ',
        'YesCT',
      ],
      'leading at' => [
        '@YesCT',
        'YesCT',
      ],
      // @todo Think about how to handle this.
      'leading ats' => [
        '@@YesCT',
        '@YesCT',
      ],
    ];
  }

}
