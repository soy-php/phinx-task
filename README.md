# Phinx Task

[![Latest Stable Version](https://poser.pugx.org/soy-php/phinx-task/v/stable)](https://packagist.org/packages/soy-php/phinx-task) [![Total Downloads](https://poser.pugx.org/soy-php/phinx-task/downloads)](https://packagist.org/packages/soy-php/phinx-task) [![Latest Unstable Version](https://poser.pugx.org/soy-php/phinx-task/v/unstable)](https://packagist.org/packages/soy-php/phinx-task) [![License](https://poser.pugx.org/soy-php/phinx-task/license)](https://packagist.org/packages/soy-php/phinx-task)

## Introduction
This is a [Phinx](https://phinx.org/) task for Soy. This package is actually a collection of Phinx tasks to support
each available command in the Phinx command line.

## Usage
This package contains the following tasks:

- PhinxCreateTask
- PhinxMigrateTask

Include `soy-php/phinx-task` in your project with composer:

```sh
$ composer require soy-php/phinx-task
```

To prevent having to configure each Phinx task separately we've introduced a PhinxConfig. You can prepare
PhinxConfig and it will be used by all phinx tasks. You can also call the same setters on a Phinx task itself,
it will simply be proxied through to the global Phinx config.

```php
<?php

$recipe = new \Soy\Recipe();

$recipe->prepare(\Soy\Phinx\Config::class, function (\Soy\Phinx\Config $phinxConfig) {
    return $phinxConfig
        ->setBinary('./vendor/bin/phinx')
        ->setConfigurationFile('app/config/phinx.yml');
});

$recipe->component('default', function (\Soy\Phinx\MigrateTask $phinxMigrateTask) {
    $phinxMigrateTask
        ->setVerbose(true)
        ->run();
});

return $recipe;
```
