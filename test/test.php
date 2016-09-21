<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Tweak\DefinitionLoader\YamlDefinitionLoader;
use Tweak\Loader\YamlLoader;
use Tweak\Loader\JsonLoader;
use Tweak\Loader\MultiLoader;
use Tweak\Settings;
use Tweak\Context;

// The key we're going to look up
$key = 'logo.color';

// Instantiate new Settings instance
$settings = new Settings();

// Load setting definitions from yml file, and attach to the Settings instance
$l = new YamlDefinitionLoader();
$definitions = $l->loadFile(__DIR__ . '/settings.yml');
$settings->addDefinitions($definitions);


// Define a MultiLoader with a Yaml and a Json value loader
$loader = new MultiLoader(
    [
        new YamlLoader(__DIR__ . '/settingdata'),
        new JsonLoader(__DIR__ . '/settingdata')
    ]
);

// Create the current context, based on machine, routes, user, etc
$context = new Context(
    [
        'env' => 'production',
        'node' => 'web1.example.com'
    ]
);

// Load relevant setting values for current context
$values = $context->load(
    $loader,
    ['common', 'environment/{env}', 'node/{node}']
);

// Add the setting values to the settings object
$settings->addValues($values);

// Debug output
print_r($settings);

// Retrieve a value in the current context
$value = $settings->getValue($key);
echo "Value: `$value`\n";
