# Phinx Task

## Introduction
This is a [Phinx](https://phinx.org/) task for Soy. This package is actually a collection of Phinx tasks to support
each available command in the Phinx command line.

## Usage

To prevent having to configure each Phinx task separately we've introduced a PhinxConfig. You can prepare
PhinxConfig and it will be used by all phinx tasks. You can also call the same setters on a Phinx task itself,
it will simply be proxied through to the global Phinx config.

```php
<?php

$recipe = new \Soy\Recipe();

$recipe->prepare(\Soy\Phinx\PhinxConfig::class, function (\Soy\Phinx\PhinxConfig $phinxConfig) {
    return $phinxConfig
        ->setBinary('./vendor/bin/phinx')
        ->setConfigurationFile('app/config/phinx.yml');
});

$recipe->component('default', function (\Soy\Phinx\PhinxCreateTask $phinxCreateTask) {
    $phinxCreateTask
        ->setName('AddNewStuff')
        ->setVerbose(true)
        ->run();
});

return $recipe;
```
