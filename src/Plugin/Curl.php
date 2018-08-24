<?php

namespace FanCourier\Plugin;

class Curl
{
    /**
     * URL for CURL request.
     *
     * @var string
     */
    private $url;

    /**
     * Constructor function.
     *
     * @param string $url
     *   URL of the request.
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Making a CURL request.
     *
     * @param array $post
     *   Array of CURL request params.
     *
     * @return array
     *   Response of request.
     */
    public function curlRequest($post)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        return [
            'info' => $info,
            'response' => $output,
        ];
    }

}
