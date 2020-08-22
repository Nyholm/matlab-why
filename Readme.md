# Matlab Why in PHP

Matlab has a easter egg where you type `why` and you get a fun answer. This project
is highly inspired by the Matlab function.

![The matlab definition](/docs/matlab.png)

## Install

```cli
composer require nyholm/why
```

## Use

```php
$why = new \Nyholm\Why\ReasonGenerator();
echo $why->generate(); // Stupid question!
echo $why->generate(); // To please the good programmer.
echo $why->generate(); // For the love to some product manager.
echo $why->generate(); // The young terrified engineer helped some rich and good terrified and very smart and rich kid.
echo $why->generate(); // The devil made me do it.
echo $why->generate(); // The tall tall programmer insisted on it.
```
