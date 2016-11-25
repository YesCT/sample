<?php
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
class Simple extends PHPUnit_Extensions_Selenium2TestCase
{

  protected function setUp()
  {
    $this->setBrowser('chrome');
    $this->setBrowserUrl('http://localhost:8888/twitter/');
  }

  public function testTitle()
  {
    $this->url('/');
    $this->assertEquals('Example Domain', $this->title());
  }

}
