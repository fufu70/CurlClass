<?php

/**
 * Contains the CurlTest class.
 * 
 * @package Common\Test
 * @author  Christian Micklisch <christian.micklisch@successwithsos.com>
 */

namespace Common\Test;

use Common\Curl;

/**
 * CurlTest class. A PHPUnit Test case class.
 *
 * Tests the Curl class.
 *
 * @author Christian Micklisch <christian.micklisch@successwithsos.com>
 */

class CurlTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     *
     *
     * Input 
     *
     *
     * 
     */

    /**
     * Url, post, options, and expected response
     * 
     * @return array Array of arrays matching the test_post parameters
     */
    public function input_post() {
        return [
            [
                "http://jsonplaceholder.typicode.com/posts/1",
                [],
                [],
                '{}'
            ]
        ];
    }    

    /**
     * Url, get, options, and expected response
     * 
     * @return array Array of arrays matching the test_get parameters
     */
    public function input_get() {
        return [
            [
                "http://jsonplaceholder.typicode.com/posts/1",
                [],
                [],
                '{
  "userId": 1,
  "id": 1,
  "title": "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
  "body": "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
}'
            ]
        ];
    }

    /**
     *
     *
     *
     * Test
     *
     *
     * 
     */
    

    /**
     * Tests the post function in Curl.
     *
     * @dataProvider input_post
     * 
     * @param  string     $url               The url to request
     * @param  array|null $post              The post parameters to add.
     * @param  array      $options           The options for the curl call.
     * @param  string     $expected_response The expected response from the request.
     */
    public function test_post(
        $url = "/", 
        array $post = NULL, 
        array $options = [], 
        $expected_response = ""
    ) {
        $this->assertEquals($expected_response, Curl::post($url, $post, $options));
    }
    
    /**
     * Tests the get function in Curl.
     *
     * @dataProvider input_get
     * 
     * @param  string     $url               The url to request
     * @param  array|null $get               The get parameters to add.
     * @param  array      $options           The options for the curl call.
     * @param  string     $expected_response The expected response from the request.
     */
    public function test_get(
        $url = "/", 
        array $get = NULL, 
        array $options = [], 
        $expected_response = ""
    ) {
        $this->assertEquals($expected_response, Curl::get($url, $get, $options));
    }
}



