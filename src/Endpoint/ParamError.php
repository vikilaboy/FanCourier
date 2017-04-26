<?php

namespace FanCourier\Endpoint;

use FanCourier\Plugin\Exeption\FanCourierApiExeption;

trait ParamError
{

    /**
     * Endpoint url.
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
    protected $post_requirements = [
        'username',
        'user_pass',
        'client_id'
    ];

    /**
     * POST paramaters for CURL call.
     *
     * @var array
     */
    protected $post_params = [];

    /**
     * Check for errors.
     *
     * @throws FanCourierApiExeption
     */
    public function checkErrors()
    {
        $errors = null;
        $url = parse_url($this->url);
        if (!$url['scheme'] || !$url['host'] || !$url['path']) {
            $expected = 'http:\\\HOST\api_endpoint.php';
            $errors .= "Endpoint url format is wrong.<br/>\r\nExpected: $expected<br/>\r\nGot: $this->url <br/>\r\n";
        }
        if ($this->post_requirements) {
            foreach ($this->post_requirements as $requirement) {
                if (!isset($this->post_params[$requirement]) || is_null($this->post_params[$requirement])) {
                    $errors .= "Param `$requirement` is missing or empty.<br/>\r\n";
                }
            }
            if ($errors) {
                throw new FanCourierApiExeption($errors, 400);
            }
        }
    }

    /**
     * Update of override requirements.
     *
     * @param type $requirement
     *   Params expected in HTTP request.
     * @param type $override
     *   Override the post_requirements variable if TRUE. Else is updating.
     */
    protected function setRequirements($requirement, $override = false)
    {
        if ($override) {
            $this->post_requirements = $requirement;
        } else {
            $this->post_requirements = array_merge($this->post_requirements, $requirement);
        }
    }

}
