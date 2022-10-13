<?php

namespace GPIStepV\Controllers;

use Curl\Curl;
use GPIStepV\Models\RPSModelResponse;

class RPS extends RPSAbstract
{
    private RPSModelResponse $result;

    /**
     * @return mixed
     */
    public function getResult(): RPSModelResponse
    {
        return $this->result;
    }



    public function getData(): RPS
    {
        if ($this->request()) {
            $this->result = $this->request();
        }

        return $this;
    }


}