<?php

namespace Tweak\Loader;

use Tweak\Settings;
use Symfony\Component\Yaml\Parser;

class MultiLoader implements LoaderInterface
{
    protected $loaders;
    
    public function __construct($loaders)
    {
        $this->loaders = $loaders;
    }
    
    public function load($scope)
    {
        $values = [];
        foreach ($this->loaders as $loader) {
            $v = $loader->load($scope);
            $values = array_merge($values, $v);
        }
        return $values;
    }
}
