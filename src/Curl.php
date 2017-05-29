<?php

/**
 * Contains the Curl class.
 *
 * @package Common
 * @author  Christian Micklisch <christian.micklisch@successwithsos.com>
 */

namespace Common;

/**
 * The Curl class.
 *
 * A simplified interface for the curl commands inside of PHP.
 *
 * @author Christian Micklisch <christian.micklisch@successwithsos.com>
 */
class Curl
{
    const COOKIE_FILE = '/tmp/cookie_file';

    /**
     * Send a POST request using CURL
     *
     * Intializes the curl command with the given options, points towards the given
     * endpoints and awaits a response to return.
     *
     * @param  string     $url     The endpoint to call.
     * @param  array|null $post    The POST data to send.
     * @param  array      $options CURL options to append to the default options.
     * @return string              The Response to the post curl call.
     */
    public static function post($url = "/", array $post = null, array $options = [])
    {
        $defaults = [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_URL => $url,
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_TIMEOUT => 4,
            CURLOPT_COOKIEJAR => self::COOKIE_FILE,
            CURLOPT_COOKIEFILE => self::COOKIE_FILE,
            CURLOPT_POSTFIELDS => $post
        ];

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));

        if ( ! $result = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }

        curl_close($ch);
        return $result;
    }

    /**
     * Send a GET request using CURL.
     *
     * Initializes the default options, sets up the url based off of the given url
     * and its get commands, makes a GET request, and returns the response.
     *
     * @param  string     $url     The endpoint to call.
     * @param  array|null $get     The GET data to send.
     * @param  array      $options CURL options to append to the default options.
     * @return string              The Response to the get curl call.
    */
    public static function get($url = "/", array $get = null, array $options = [])
    {
        $defaults = [
            CURLOPT_URL => $url. (strpos($url, '?') === false ? '?' : ''). http_build_query($get),
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 4,
            CURLOPT_COOKIEJAR => self::COOKIE_FILE,
            CURLOPT_COOKIEFILE => self::COOKIE_FILE,
        ];

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));

        if ( ! $result = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }

        curl_close($ch);
        return $result;
    }

    /**
     * Send a File using the POST request using CURL.
     *
     * Intializes the curl command as a POST, adds the file_path to the POST_FIELDS as
     * a value to the 'file' key, points towards the given endpoints and awaits a response
     * to return.
     *
     * @param  string $url       The endpoint to call.
     * @param  string $file_path The path of the file to send.
     * @param  array  $options   CURL options to append to the default options.
     * @return string            The Response to the file curl call.
     */
    public static function file($url = "/", $file_path = "", array $options = [])
    {
        $defaults = [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_URL => $url,
            CURLOPT_FRESH_CONNECT => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FORBID_REUSE => 1,
            CURLOPT_POSTFIELDS => [
                'file' => curl_file_create($file_path)
            ]
        ];

        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));

        if ( ! $result = curl_exec($ch)) {
            trigger_error(curl_error($ch));
        }

        curl_close($ch);
        return $result;
    }
}