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
   * Tests if the display contains a word from the bio description.
   */
  public function testBioForYesCT() {
    $this->url('/index.php?user=YesCT');
    $content = $this->byTag('body')->text();
    $this->assertContains('contributing', $content);
  }

}
