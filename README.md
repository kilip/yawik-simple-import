SimpleImport
============

This module provides import tasks

Build status:

[![Build Status](https://api.travis-ci.org/yawik/SimpleImport.svg)](https://travis-ci.org/yawik/SimpleImport)
[![Coverage Status](https://coveralls.io/repos/github/yawik/SimpleImport/badge.svg?branch=master)](https://coveralls.io/github/yawik/SimpleImport?branch=master)

Requirements
------------

running [YAWIK](https://github.com/cross-solution/YAWIK)


Installation
------------

Require a dependency via composer.

```bash
composer require yawik/simple-import
```

Enable the module for the Zend module manager via creating the `simpleimport.module.php` file in the `/config/autoload` directory with the following content.

```php
<?php
return [
    'SimpleImport'
];
```

Configuration
-------------

TBD


Documentation
-------------

http://yawik.readthedocs.io/en/latest/modules/simple-import/index.html

Development
-------
1.  Clone project
```sh
$ git clone git@github.com:yawik/SimpleImport.git /path/to/simple-import 
```

2. Install dependencies:
```sh
$ composer install
```

3. Run PHPUnit Tests
```sh
$ ./vendor/bin/phpunit
```

4. Run Behat Tests
```sh

# start selenium
$ composer run start-selenium --timeout=0

# start php server
$ composer run serve --timeout=0

# run behat
$ ./vendor/bin/behat

```

Licence
-------

MIT
