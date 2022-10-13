# GPIStepV
Интеграция с Google Page Insight 

# Зачем?
Для дальнейших интеграций с GPI, например, 
создания своих платформ для отслеживаний показателей 
в GPI в атоматическом режиме

# Что использовано?
Curl/Curl, Monolog/Monolog, Vlucas/Phpdotenv, Symfony/Routing

# Документация
Инициализируем модель с передачей сайта
$requestModel = new RPSModelRequest('http://stepv.ru/');

Заполняем модель
<pre>
$requestModel
->setLocale('ru')
->setStrategy('desktop')
->setCategory(['performance']);
</pre>

Вызываем логгер
<pre>
$logger = new Logger('myRequests');
</pre>

Передаём модель и логгер в основой класс
<pre>
$rps = new RPS($requestModel, $logger);
</pre>

Посылаем запрос и получаем данные

<pre>
print_r($rps->getData());
</pre>