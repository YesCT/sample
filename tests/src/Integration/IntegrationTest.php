<?php

namespace CathyTest\Tests\Integration;

use PHPUnit_Extensions_Selenium2TestCase;

/**
 * Tests for text from a bio.
 */
class IntegrationTest extends PHPUnit_Extensions_Selenium2TestCase {

  /**
   * @{inheritdoc}
   */
  protected function setUp() {
    $this->setBrowser('chrome');
    $this->setBrowserUrl(PHPUNIT_TESTSUITE_EXTENSION_SELENIUM_BASEURL);
  }

  /**
   * Tests no results displayed if no input given.
   */
  public function testNoInput() {
    $this->url('/index.php');
    $content = $this->byTag('body')->text();
    $this->assertNotContains('User description', $content);
  }

  /**
   * Tests no results displayed if input is empty.
   */
  public function testEmptyInput() {
    $this->url('/index.php&user=');
    $content = $this->byTag('body')->text();
    $this->assertNotContains('User description', $content);
  }

  /**
   * Tests if info is displayed for a user that does not exist.
   */
  public function testUserDoesNotExist() {
    $not_a_username = 'YYesCT';
    $this->url('/index.php?user=' . $not_a_username);
    $content = $this->byTag('body')->text();
    // Should not have a description for a nonexistent user.
    $this->assertNotContains('User description', $content);
    // A message should mention the attempted user.
    $this->assertContains($not_a_username, $content);
    $this->assertContains('does not exist', $content);
  }

  /**
   * Tests if the display contains a word from the bio description.
   *
   * Use a known user, and a known word from their bio.
   */
  public function testBioForYesCT() {
    $this->url('/index.php?user=YesCT');
    $content = $this->byTag('body')->text();
    $this->assertContains('contributing', $content);
  }

}
