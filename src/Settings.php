<?php

namespace Tweak;

use Tweak\Backend\BackendInterface;
use Tweak\Model\Definition;
use Tweak\Exception\UndefinedSettingDefinitionException;

class Settings
{
    protected $definitions = [];
    protected $values = [];
        
    public function addDefinitions($definitions)
    {
        foreach ($definitions as $definition) {
            $this->addDefinition($definition);
        }
    }
    
    public function addDefinition(Definition $definition)
    {
        $this->definitions[$definition->getName()] = $definition;
    }
    
    public function hasDefinition($key)
    {
        return isset($this->definitions[$key]);
    }
    
    public function getDefinition($key)
    {
        if (!$this->hasDefinition($key)) {
            throw new UndefinedSettingDefinitionException($key);
        }
        return $this->definitions[$key];
    }
    
    public function addValues($values)
    {
        foreach ($values as $key => $value) {
            $this->setValue($key, $value);
        }
    }
    
    public function setValue($key, $value)
    {
        if ($this->hasDefinition($key)) {
            $this->values[$key] = $value;
        }
    }
    public function getValue($key)
    {
        if (!$this->hasDefinition($key)) {
            throw new UndefinedSettingDefinitionException($key);
        }
        $definition = $this->getDefinition($key);
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }
        
        return $definition->getDefault();
    }
}
