Feature: Search
  In order to see if behat works
  As a website user
  I need to be able to see something in index.html

  Scenario: Looking for a word
    Given I am on "/twitter"
    Then I should see "hello"
