<?php
/**
 * Verifies tests will run.
 *
 * Based on
 * http://geekpad.ca/blog/post/automating-browser-testing-with-phpunit-and-selenium
 * https://phpunit.de/manual/4.8/en/selenium.html
 * https://phpunit.de/manual/current/en/organizing-tests.html#organizing-tests.xml-configuration.examples.phpunit.xml
 *
 * Integration tests for login functionality
 */
class Simple extends PHPUnit_Extensions_Selenium2TestCase
{

  protected function setUp()
  {
    $this->setBrowser('chrome');
    $this->setBrowserUrl('http://www.example.com/');
  }

  public function testTitle()
  {
    $this->url('http://www.example.com/');
    $this->assertEquals('Example WWW Page', $this->title());
  }

}
