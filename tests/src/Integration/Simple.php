<?php

namespace CathyTest\Tests\Integration;

use PHPUnit_Extensions_Selenium2TestCase;

/**
 * Verifies tests will run.
 *
 * Based on
 * http://geekpad.ca/blog/post/automating-browser-testing-with-phpunit-and-selenium
 * https://phpunit.de/manual/4.8/en/selenium.html
 * https://phpunit.de/manual/current/en/organizing-tests.html#organizing-tests.xml-configuration.examples.phpunit.xml
 *
 * Contains integration tests.
 */
class Simple extends PHPUnit_Extensions_Selenium2TestCase {

  /**
   * @{inheritdoc}
   */
  protected function setUp()
  {
    $this->setBrowser('chrome');
    $this->setBrowserUrl(PHPUNIT_TESTSUITE_EXTENSION_SELENIUM_BASEURL);
  }

  /**
   * Tests HTML title element.
   */
  public function testTitle()
  {
    $this->url('/');
    $this->assertEquals('Example Domain', $this->title());
  }

}
