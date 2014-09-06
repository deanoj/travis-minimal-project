---
layout: base
title: Travis Minimal Project
---

# Travis Minimal Project

This project demonstrates how to use [Travis](https://travis-ci.org/) to run some PHPUnit tests.

## Requirements

- A [github](https://www.github.com/) account
- A job for [travis](https://travis-ci.org/) to run. A PHPUnit test case in this example. You also need PHP and PHPUnit
installed, the PHPUnit test should work on your machine!

## File overview

- `src/Calculator.php` - A PHP object with a method we want to unit test.
- `test/CalculatorTest.php` - A PHPUnit test case
- `.travis.yml` - Travis-CI config file
- `composer.json` - Composer file
- `phpunit.xml.dist` - PHPUnit config file

## Setup

Once your github repository is linked up to Travis, you can set up PHPUnit testing to be run on every push of commits.
The following describes the key files required for a successful Travis PHPUnit configuration.

### 1. PHP source - src/Calculator.php

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

Follow the [getting started](http://docs.travis-ci.com/user/getting-started/) guide to link up your git hub repository to travis.

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

A minimal [composer](https://getcomposer.org/doc/00-intro.md) file that defines our dependencies and class loading for PHP.

{% highlight json %}
{
    "name": "deanoj/travis-minimal-project",
    "description": "A minimal project to demonstrate travis phpunit testing",
    "license": "MIT",
    "authors": [
        {
            "name": "Dean McGill",
            "email": "deanoj@deanoj.com"
        }
    ],
    "require": {
        "php": ">=5.3.3"
    },
    "require-dev": {
        "phpunit/phpunit": "~4.0"
    },
    "autoload": {
        "psr-4": {
            "Deanoj\\TravisMinimalProject\\": "src/"
        }
    }
}
{% endhighlight %}

### 5. PHPUnit config file - phpunit.xml.dist

The [configuration file](https://phpunit.de/manual/3.7/en/appendixes.configuration.html) for [PHPUnit](https://phpunit.de/).

The `phpunit.xml.dist` can be overridden locally by creating a `phpunit.xml` file.
The idea is to make sure you ignore it in your version control i.e. `.gitignore`

{% highlight xml %}
<phpunit bootstrap="./vendor/autoload.php" colors="true">
    <testsuites>
        <testsuite name="Deanoj Travis Minimal - Test Suite">
            <directory suffix="Test.php">./test</directory>
        </testsuite>
    </testsuites>
</phpunit>
{% endhighlight %}