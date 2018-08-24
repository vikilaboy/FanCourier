<?php

namespace FanCourier\EndPoint;

use FanCourier\Plugin\Exception\FanCourierApiException;

trait ParamError
{

    /**
     * EndPoint url.
     *
     * @var string
     */
    protected $url = '';

    /**
     * POST paramaters requirements - for error errorChecker().
     * - Values to be checked if they exists in $post_params.
     *
     * @var array
     */
    protected $postRequirements = [
        'username',
        'user_pass',
        'client_id'
    ];

    /**
     * POST paramaters for CURL call.
     *
     * @var array
     */
    protected $postParams = [];

    /**
     * Check for errors.
     *
     * @throws FanCourierApiException
     */
    public function checkErrors()
    {
        $errors = null;
        $url = parse_url($this->url);
        if (!$url['scheme'] || !$url['host'] || !$url['path']) {
            $expected = 'http:\\\HOST\api_endpoint.php';
            $errors .= "EndPoint url format is wrong.<br/>\r\nExpected: $expected<br/>\r\nGot: $this->url <br/>\r\n";
        }
        if ($this->postRequirements) {
            foreach ($this->postRequirements as $requirement) {
                if (!isset($this->postParams[$requirement]) || is_null($this->postParams[$requirement])) {
                    $errors .= "Param `$requirement` is missing or empty.<br/>\r\n";
                }
            }
            if ($errors) {
                throw new FanCourierApiException($errors, 400);
            }
        }
    }

    /**
     * Update of override requirements.
     *
     * @param array $requirement
     *   Params expected in HTTP request.
     * @param bool $override
     *   Override the post_requirements variable if TRUE. Else is updating.
     */
    protected function setRequirements($requirement, $override = false)
    {
        if ($override) {
            $this->postRequirements = $requirement;
        } else {
            $this->postRequirements = array_merge($this->postRequirements, $requirement);
        }
    }

}
