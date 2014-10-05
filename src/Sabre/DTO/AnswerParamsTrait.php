<?php
namespace Sabre\DTO;

/**
 * Parameters common for all answer_params elements in all requests.
**/
trait AnswerParamsTrait
{
    /**
     * Whether request body should be returned embedded in response.
     *
     * @Type("boolean")
     * @XmlElement(cdata=false)
     */
    private $returnRequest;

    public function setReturnRequest($returnRequest)
    {
        $this->returnRequest = $returnRequest;

        return $this;
    }

    public function getReturnRequest()
    {
        return $this->returnRequest;
    }

    /**
     * Response language.
     *
     * Optional. Defaults to pult default language.
     * Must be either "ru" or "en".
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $lang = 'en';

    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Currency code.
     *
     * Optional. Defaults to pult default currency.
     *
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $curr;

    public function setCurr($curr)
    {
        $this->curr = $curr;

        return $this;
    }

    public function getCurr()
    {
        return $this->curr;
    }
}
