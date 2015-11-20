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
