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
echo $why->generate();
```
