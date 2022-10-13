<?php

namespace GPIStepV\Controllers;

use Curl\Curl;
use GPIStepV\Contract\RPSRequestContract;
use GPIStepV\Contract\RPSResponseContract;
use GPIStepV\Models\RPSModelResponse;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

abstract class RPSAbstract
{
    protected Logger $logger;

    protected RPSRequestContract $request;
    protected RPSResponseContract $response;

    public function __construct(RPSRequestContract $request, Logger $logger)
    {
        $this->request = $request;
        $this->response = new RPSModelResponse();

        $this->logger = $logger;
        $this->initLogger();
    }

    private function initLogger(): void
    {
        $stream = new StreamHandler("{$_SERVER['DOCUMENT_ROOT']}/log/rps.log");
        $this->logger->pushHandler($stream);
    }

    protected function getRequestQuery(): string
    {
        return http_build_query($this->request->mapFields());
    }

    protected function getRequestUrl(): string
    {
        return "{$_ENV['API_RPS']}/?{$this->getRequestQuery()}";
    }

    protected function request(): bool|RPSModelResponse
    {
        $curl = new Curl();

        $curl->get(
            $this->getRequestUrl()
        );

        if ($curl->error) {
            $this->logger->critical("Ошибка при обращении к API: $curl->error_code");
            return false;
        }

        $data = json_decode($curl->response, true);
        return $this->response->mapFields($data);
    }
}