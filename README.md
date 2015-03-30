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

There are such classes available:
* YearPEriod
* MonthPeriod
* WeekPeriod
* DayPeriod

DayPeriod is for getting the start and the end of the day.
You can skip passing DateTime object to the constructor, then the current date will be taken.

```php
<?php

require 'vendor/autoload.php';

use DatePeriod\YearPeriod;
use DatePeriod\MonthPeriod;
use DatePeriod\WeekPeriod;
use DatePeriod\DatePeriod;
use DatePeriod\DayPeriod;

// Example of retrieving start and end dates of the current year
$yearPeriod = new YearPeriod();

echo $yearPeriod->getStartDate()->format("Y-m-d") . PHP_EOL; // prints the first day of the current year
echo $yearPeriod->getEndDate()->format("Y-m-d") . PHP_EOL; // prints the last day of the current year

// Example of getting first and last days of month for the given date
$date = new \DateTime('06-06-2000');
$monthPeriod = new MonthPeriod($date);

// Dates are immutable. You can't chante start and end dates inside of DatePeriod classes.
$startDate = $monthPeriod->getStartDate();
$startDate->modify('+5 days');
echo $startDate->format("Y-m-d") . PHP_EOL; // 2000-06-06
$startDate = $monthPeriod->getEndDate();
$startDate->modify('+10 days');
echo $startDate->format("Y-m-d") . PHP_EOL; // 2000-07-10
// But start date won't chante inside the DatePeriod objects
echo $monthPeriod->getStartDate()->format("Y-m-d") . PHP_EOL; // 2000-06-01
echo $monthPeriod->getEndDate()->format("Y-m-d") . PHP_EOL; // 2000-06-30


// Example of getting first and last days of week for the given date
// By default, the start date time is set to 00:00:00 and end date time is set to 23:59:59
$date = new \DateTime('02-03-2015');
$weekPeriod = new WeekPeriod($date);

echo $weekPeriod->getStartDate()->format("Y-m-d H:i:s") . PHP_EOL; // 2015-03-02 00:00:00
echo $weekPeriod->getEndDate()->format("Y-m-d H:i:s") . PHP_EOL; // 2015-03-08 23:59:59

// Example retrieving first and last days of week with preserving time
$date = new \DateTime('02-03-2015 14:30:00');
$weekPeriod = new WeekPeriod($date, $preserveTime = true);

echo $weekPeriod->getStartDate()->format("Y-m-d H:i:s") . PHP_EOL; // 2015-03-02 14:30:00
echo $weekPeriod->getEndDate()->format("Y-m-d H:i:s") . PHP_EOL; // 2015-03-08 14:30:00

// Example getting start and end of the day
$date = new \DateTime('02-03-2015');
$weekPeriod = new DayPeriod($date);

echo $weekPeriod->getStartDate()->format("Y-m-d H:i:s") . PHP_EOL; // 2015-03-02 00:00:00
echo $weekPeriod->getEndDate()->format("Y-m-d H:i:s") . PHP_EOL; // 2015-03-08 23:59:59

// Example of creating custom date period
$startDate = new \DateTime('06-06-2000');
$endDate = new \DateTime('06-07-2001');
$datePeriod = new DatePeriod($startDate, $endDate);


```

You can pass DatePeriodInterface object to function or method instead of passing start and edn dates separately. For example ```function getRevenueReport(DatePeriodInterface $period)``` instead of ```function getRevenueReport($startDate, $endDate)```

