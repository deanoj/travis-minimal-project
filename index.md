---
layout: base
title: Travis Minimal Project
---

# Travis Minimal Project

This project demonstrates how to use travis-ci to run some PHPUnit tests.

## Requirements

- A github account
- A process for travis to run. (PHPUnit test case in this example)

## File Overview

src/Calculator.php - A PHP object with a method we want to unit test.
test/CalculatorTest.php - A PHPUnit test case
.travis.yml - Travis-CI config file
composer.json - Composer file
phpunit.xml.dist - PHPUnit config file

## 1. PHP source - src/Calculator.php

The PHP object, with a method to unit test.

{% highlight php %}
    class Calculator {

        public function add($a, $b)
        {
            return $a + $b;
        }

    }
{% endhighlight %}

### 2. PHPUnit test - test/CalculatorTest.php

The PHPUnit test case. The is the test that we will run with travis-ci.

{% highlight php %}
    class CalculatorTest extends \PHPUnit_Framework_TestCase {
        public function testAdd()
        {
            $calc = new Calculator();

            $this->assertEquals(13, $calc->add(6,7));
            $this->assertEquals(7, $calc->add(4,3));
        }
    }
{% endhighlight %}

### 3. Travis-ci config - .travis.yml

{% highlight yaml %}
    language: php
    php:
      - "5.5"

    before_script:
      - wget http://getcomposer.org/composer.phar
      - php composer.phar install
      - phpunit
{% endhighlight %}

### 4. Composer - composer.json

### 5. PHPUnit config file - phpunit.xml.dist
