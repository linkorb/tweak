<?php

namespace Tweak\Model;

class Definition
{
    protected $name;
    protected $description;
    protected $details;
    protected $type;
    protected $default;
    protected $options = [];

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    
    public function getDetails()
    {
        return $this->details;
    }
    
    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }
    
    public function getType()
    {
        return $this->type;
    }
    
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
    
    
    
    public function getDefault()
    {
        return $this->default;
    }
    
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }
    
    public function getOptions()
    {
        return $this->options;
    }
    
    public function addOption(Option $option)
    {
        $this->options[$option->getValue()] = $option;
        return $this;
    }
}
