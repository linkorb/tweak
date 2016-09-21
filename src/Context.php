<?php

namespace Tweak;

use Tweak\Loader\LoaderInterface;

class Context
{
    protected $loader;
    protected $arguments;
    
    public function __construct($arguments = [])
    {
        $this->arguments = $arguments;
    }
    
    public function load(LoaderInterface $loader, $scopes)
    {
        $values = [];
        foreach ($scopes as $scope) {
            foreach ($this->arguments as $k => $v) {
                $scope = str_replace('{' . $k . '}', $v, $scope);
            }
            $v = $loader->load($scope);
            $values = array_merge($values, $v);
        }
        return $values;
    }
}
