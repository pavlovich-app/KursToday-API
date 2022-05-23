Rate.in.ua API (API для получения курсов валют)
===============================================
![Курс валют в Украине](https://rate.in.ua/images/logo/icon-128x128.png)

Rate.in.ua ([Курс валют в Украине](https://rate.in.ua)) - это сайт агрегатор в котором собраны все самые популярные банки и обменники Украины.

На данный момент мы предоставляем информацию о курсах валют более чем 20 гороов Украины;

Через наш API вы можете: 
* Получать информацию о курсах валют во всех перечисленных выше сервисах;
* Узнать средний курс по каждому сервису;
* Получить исторические курсы валют по дням за выбранный период;


## Получение курсов валют по конкретному городу ##
Для простого получения курсов желательно установить наш composer пакет. 
Пакет не тянет за собой никаких зависимостей и достаточно прост в использовании.

**Установка composer пакета:**
```` console
composer require kurstoday/api
```` 

После установки вы можете использовать экземпляр класса Kurstoday для работы с API;

````php
<?php
use kurstoday\Kurstoday; // подключаем класс

$api = new Kurstoday; // создаем экземпляр класса
````



## Пример получения курсов валют в обменниках Луцка ##

````php
<?php $lutskService = $api->getService('lutsk'); ?>
````

**Полный список городов представлен ниже:**

* banks-of-ukraine
* kiev
* lutsk
* kharkiv
* lviv
* dnipro
* odessa
* rivne
* ivano-frankivsk
* sumy
* zhytomyr
* zaporizhzhia
* mykolaiv
* poltava
* chernivtsi
* khmelnytskyi
* herson
* kamin-kashirsky
* kovel
* volodymyr-volynskyi
* kryvyi-rih

В ответ мы получим массив, с описанием сервиса и вложенным массивом **exchangers** в котором описаны сами обменники (банки):

````
[
    [serviceId] => 3
    [serviceName] => Lutsk
    [exchangers] => [ // обменники (банки)
        [0] => [
            [id] => 1
            [serviceId] => 3
            [name] => Kantor
            [website] => http://kantor.com.ua
            [image] => https://kurstoday.com/images/exchangers/kantor.png // логотип обменника (банка)
            [background] => #00A1D8
            [border] => #969696
            [slug] => kantor
            [rates] => [ // описание курсов валют
                [exchangerId] => 72
                [updateTime] => 1588581967 // время в формате timestamp (Europe/Kiev) последнего изменения курса
                [usd] => [
                    [buy] => 27.00
                    [sel] => 27.10
                ],
                [eur] => [
                    [buy] => 29.20
                    [sel] => 29.40
                ],
                ... и так дальше ...
            ],
        ],
        ... и так дальше ...
    ]
]
````

## Пример получение среднего курса валют в обменниках Харькова ##
````php
<?php $kharkivAverage = $api->getAverage('kharkiv'); ?>
````

В ответ мы получим массив с курсами валют для Харькова:
````
[
    [usd] => [
        [buy] => 26.78
        [sel] => 26.88
    ],
    [eur] => [
        [buy] => 28.81
        [sel] => 29.00
    ],
    [rur] => [
        [buy] => 01.93
        [sel] => 00.36
    ],
    ... и так дальше ...
]

````