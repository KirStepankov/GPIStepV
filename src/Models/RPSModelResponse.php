<?php

namespace GPIStepV\Models;

use GPIStepV\Contract\RPSResponseContract;

class RPSModelResponse implements RPSResponseContract
{
    /**
     * @var string
     * 	Капча проверяет результат
     *
     * Допустимые значения:
     * "CAPTCHA_BLOCKING"
     * "CAPTCHA_MATCHED"
     * "CAPTCHA_NEEDED"
     * "CAPTCHA_NOT_NEEDED"
     * "CAPTCHA_UNMATCHED"
     */
    private string $captchaResult;

    /**
     * @var string
     * Вид результата.
     */
    private string $kind;

    /**
     * @var string
     * Канонизированный и конечный URL документа
     * после перенаправления следующей страницы (если есть).
     */
    private string $id;

    /**
     * @var array
     * Метрики загрузки страниц конечными пользователями.
     */
    private array $loadingExperience;

    /**
     * @var array
     * Версия PageSpeed, используемая для получения этих результатов.
     */
    private array $version;

    /**
     * @var array
     * Метрики совокупного опыта загрузки страниц источника
     */
    private array $originLoadingExperience;

    /**
     * @var string
     * 	Временная метка UTC этого анализа.
     */
    private string $analysisUTCTimestamp;

    /**
     * @var array
     * Ответ Lighthouse для URL-адреса аудита в виде объекта.
     */
    private array $lighthouseResult;

    /**
     * @return string
     */
    public function getCaptchaResult(): string
    {
        return $this->captchaResult;
    }

    /**
     * @param string $captchaResult
     * @return RPSModelResponse
     */
    public function setCaptchaResult(string $captchaResult): RPSModelResponse
    {
        $this->captchaResult = $captchaResult;
        return $this;
    }

    /**
     * @return string
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * @param string $kind
     * @return RPSModelResponse
     */
    public function setKind(string $kind): RPSModelResponse
    {
        $this->kind = $kind;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return RPSModelResponse
     */
    public function setId(string $id): RPSModelResponse
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return array
     */
    public function getLoadingExperience(): array
    {
        return $this->loadingExperience;
    }

    /**
     * @param array $loadingExperience
     * @return RPSModelResponse
     */
    public function setLoadingExperience(array $loadingExperience): RPSModelResponse
    {
        $this->loadingExperience = $loadingExperience;
        return $this;
    }

    /**
     * @return array
     */
    public function getVersion(): array
    {
        return $this->version;
    }

    /**
     * @param array $version
     * @return RPSModelResponse
     */
    public function setVersion(array $version): RPSModelResponse
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return object
     */
    public function getOriginLoadingExperience(): array
    {
        return $this->originLoadingExperience;
    }

    /**
     * @param array $originLoadingExperience
     * @return RPSModelResponse
     */
    public function setOriginLoadingExperience(array $originLoadingExperience): RPSModelResponse
    {
        $this->originLoadingExperience = $originLoadingExperience;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnalysisUTCTimestamp(): string
    {
        return $this->analysisUTCTimestamp;
    }

    /**
     * @param string $analysisUTCTimestamp
     * @return RPSModelResponse
     */
    public function setAnalysisUTCTimestamp(string $analysisUTCTimestamp): RPSModelResponse
    {
        $this->analysisUTCTimestamp = $analysisUTCTimestamp;
        return $this;
    }

    /**
     * @return array
     */
    public function getLighthouseResult(): array
    {
        return $this->lighthouseResult;
    }

    /**
     * @param array $lighthouseResult
     * @return RPSModelResponse
     */
    public function setLighthouseResult(array $lighthouseResult): RPSModelResponse
    {
        $this->lighthouseResult = $lighthouseResult;
        return $this;
    }

    public function mapFields (array $data): RPSModelResponse
    {
        $this
            ->setAnalysisUTCTimestamp($data['analysisUTCTimestamp'])
            ->setCaptchaResult($data['captchaResult'])
            ->setId($data['id'])
            ->setKind($data['kind'])
            ->setLighthouseResult($data['lighthouseResult'])
            ->setLoadingExperience($data['loadingExperience'])
            ->setOriginLoadingExperience($data['originLoadingExperience'] ?? [])
            ->setVersion($data['version'] ?? []);

        return $this;
    }
}