<?php

namespace GPIStepV\Models;

use GPIStepV\Contract\RPSRequestContract;

class RPSModelRequest implements RPSRequestContract
{
    private string $key;

    /**
     * @var string
     * URL-адрес для получения и анализа
     */
    private string $url;

    /**
     * @var string
     * Категория Маяк для запуска; если ничего не указано,
     * будет запущена только категория «Производительность».
     *
     * Допустимые значения:
     * "accessibility"
     * "best-practices"
     * "performance"
     * "pwa"
     * "seo"
     */
    private array $category = [];

    /**
     * @var string
     * Языковой стандарт,
     * используемый для локализации отформатированных результатов
     *
     * Например ru, en
     */
    private string $locale = '';

    /**
     * @var string
     * Стратегия анализа (настольная или мобильная),
     * используемая по умолчанию.
     *
     * Допустимые значения:
     * "desktop": получение и анализ URL-адреса для настольных браузеров.
     * "mobile": получить и проанализировать URL-адрес для мобильных устройств.
     */
    private string $strategy = '';

    /**
     * @var string
     * Название кампании для аналитики.
     */
    private string $utmCampaign = '';

    /**
     * @var string
     * Источник кампании для аналитики.
     */
    private string $utmSource = '';

    /**
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->key = $_ENV['KEY_GOOGLE_API'];
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getCategory(): array
    {
        return $this->category;
    }

    /**
     * @param array $category
     * @return RPSModelRequest
     */
    public function setCategory(array $category): RPSModelRequest
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return RPSModelRequest
     */
    public function setLocale(string $locale): RPSModelRequest
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return string
     */
    public function getStrategy(): string
    {
        return $this->strategy;
    }

    /**
     * @param string $strategy
     * @return RPSModelRequest
     */
    public function setStrategy(string $strategy): RPSModelRequest
    {
        $this->strategy = $strategy;
        return $this;
    }

    /**
     * @return string
     */
    public function getUtmCampaign(): string
    {
        return $this->utmCampaign;
    }

    /**
     * @param string $utmCampaign
     * @return RPSModelRequest
     */
    public function setUtmCampaign(string $utmCampaign): RPSModelRequest
    {
        $this->utmCampaign = $utmCampaign;
        return $this;
    }

    /**
     * @return string
     */
    public function getUtmSource(): string
    {
        return $this->utmSource;
    }

    /**
     * @param string $utmSource
     * @return RPSModelRequest
     */
    public function setUtmSource(string $utmSource): RPSModelRequest
    {
        $this->utmSource = $utmSource;
        return $this;
    }

    /**
     * @return array
     */
    public function mapFields (): array
    {
        return [
            'key' => $this->getKey(),
            'url' => $this->getUrl(),
            'category' => implode(',', $this->getCategory()),
            'locale' => $this->getLocale(),
            'strategy' => $this->getStrategy(),
            'utm_campaign' => $this->getUtmCampaign(),
            'utm_source' => $this->getUtmSource()
        ];
    }
}