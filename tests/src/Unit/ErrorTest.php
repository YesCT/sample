<?php

namespace CathyTest\Tests\Unit;

use CathyTest\Result;

/**
 * Tests error detection for JSON response.
 */
class ErrorTest extends \PHPUnit_Framework_TestCase {

  /**
   * @{inheritdoc}
   */
  protected function setUp() {
  }

  /**
   * @covers \CathyTest\Result::hasError
   * @dataProvider providerTestHasError
   */
  public function testHasError($result_json, $expected) {
    $result = new Result();
    $has_error = $result->hasError($result_json);
    $this->assertEquals($expected, $has_error);
  }

  /**
   * Provides test data for testHasError().
   *
   * @return array
   *   The test data as an array, with sample JSON response string and the
   *   expected boolean value of if is has an error or not.
   */
  public function providerTestHasError() {
    return [
      'no error' => [
        '[{"created_at":"Fri Nov 25 15:29:49 +0000 2016","id":802172447978127365,"id_str":"802172447978127365","text":"I\u2019m looking for a picture of the coder lounge\/sprint-> contribution lounge\/sprint graffiti\u2019d sign from 2014 #badcamp Can you find it?","truncated":false,"entities":{"hashtags":[{"text":"badcamp","indices":[111,119]}],"symbols":[],"user_mentions":[],"urls":[]},"source":"\u003ca href=\"https:\/\/about.twitter.com\/products\/tweetdeck\" rel=\"nofollow\"\u003eTweetDeck\u003c\/a\u003e","in_reply_to_status_id":null,"in_reply_to_status_id_str":null,"in_reply_to_user_id":null,"in_reply_to_user_id_str":null,"in_reply_to_screen_name":null,"user":{"id":17812913,"id_str":"17812913","name":"Cathy YesCT","screen_name":"YesCT","location":"conferences in lots of places","description":"drupal-contributing, exploring.","url":"http:\/\/t.co\/Dtq9YUqXvt","entities":{"url":{"urls":[{"url":"http:\/\/t.co\/Dtq9YUqXvt","expanded_url":"http:\/\/yesct.net","display_url":"yesct.net","indices":[0,22]}]},"description":{"urls":[]}},"protected":false,"followers_count":2185,"friends_count":656,"listed_count":222,"created_at":"Tue Dec 02 17:37:26 +0000 2008","favourites_count":5151,"utc_offset":-21600,"time_zone":"Central Time (US & Canada)","geo_enabled":false,"verified":false,"statuses_count":21359,"lang":"en","contributors_enabled":false,"is_translator":false,"is_translation_enabled":false,"profile_background_color":"709397","profile_background_image_url":"http:\/\/abs.twimg.com\/images\/themes\/theme6\/bg.gif","profile_background_image_url_https":"https:\/\/abs.twimg.com\/images\/themes\/theme6\/bg.gif","profile_background_tile":false,"profile_image_url":"http:\/\/pbs.twimg.com\/profile_images\/477082699543244800\/boLgcL81_normal.png","profile_image_url_https":"https:\/\/pbs.twimg.com\/profile_images\/477082699543244800\/boLgcL81_normal.png","profile_banner_url":"https:\/\/pbs.twimg.com\/profile_banners\/17812913\/1398449974","profile_link_color":"C7300A","profile_sidebar_border_color":"86A4A6","profile_sidebar_fill_color":"A0C5C7","profile_text_color":"333333","profile_use_background_image":true,"has_extended_profile":false,"default_profile":false,"default_profile_image":false,"following":false,"follow_request_sent":false,"notifications":false,"translator_type":"none"},"geo":null,"coordinates":null,"place":null,"contributors":null,"is_quote_status":false,"retweet_count":0,"favorite_count":0,"favorited":false,"retweeted":false,"lang":"en"}]',
        FALSE,
      ],
      'error' => [
        '{"errors":[{"code":34,"message":"Sorry, that page does not exist."}]}',
        TRUE,
      ],
      'error not authorized' => [
        '{"request":"\/1.1\/statuses\/user_timeline.json","error":"Not authorized."}',
        TRUE,
      ],
    ];
  }

}
