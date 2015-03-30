# Purpose
Simplifying getting a first/last day of week, month, year.

#Installation
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist smilesrg/dateperiod "*"
```

or add

```
"smilesrg/dateperiod": "*"
```

to the require section of your `composer.json` file.

#Usage

```php
<?php

require 'vendor/autoload.php';

use DatePeriod\MonthPeriod;
use DatePeriod\WeekPeriod;
use DatePeriod\DatePeriod;

// Example of getting first and last days of month for the given date
$date = new \DateTime('06-06-2000');
$monthPeriod = new MonthPeriod($date);

echo $monthPeriod->getStartDate()->format("Y-m-d") . PHP_EOL; // 2000-06-01
echo $monthPeriod->getEndDate()->format("Y-m-d") . PHP_EOL; // 2000-06-30

// Example of getting first and last days of week for the given date
$date = new \DateTime('02-03-2015');
$weekPeriod = new WeekPeriod($date);

echo $weekPeriod->getStartDate()->format("Y-m-d") . PHP_EOL; // 2015-03-02
echo $weekPeriod->getEndDate()->format("Y-m-d") . PHP_EOL; // 2015-03-08

// Example of creating custom date period
$startDate = new \DateTime('06-06-2000');
$endDate = new \DateTime('06-07-2001');
$datePeriod = new DatePeriod($startDate, $endDate);
```

You can pass DatePeriodInterface object to function or method instead of passing start and edn dates separately. For example ```function getRevenueReport(DatePeriodInterface $period)``` instead of ```function getRevenueReport($startDate, $endDate)```

