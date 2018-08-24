<?php

namespace FanCourier\EndPoint;

class PrintAwb extends EndPoint
{
    /**
     * EndPoint url for HTML response.
     *
     * @var string
     */
    protected $urlHtml = 'https://www.selfawb.ro/view_awb_integrat.php';

    /**
     * EndPoint url for PDF response.
     *
     * @var string
     */
    protected $urlPdf = 'https://www.selfawb.ro/view_awb_integrat_pdf.php';

    /**
     * Print result type.(html or pdf)
     *
     * @var string
     */
    protected $type = 'html';

    /**
     * Construct setups.
     */
    public function __construct()
    {
        $this->url = $this->urlHtml;
        $this->setRequirements(['nr']);
    }

    /**
     * Set type of request/response.
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
        if ($type == 'html') {
            $this->url = $this->urlHtml;
        } else {
            if ($type == 'pdf') {
                $this->url = $this->urlPdf;
            }
        }
    }

}
