<?php

namespace Tweak\DefinitionLoader;

use Symfony\Component\Yaml\Parser;
use Tweak\Model\Definition;
use Tweak\Model\Option;
use RuntimeException;

class YamlDefinitionLoader
{
    public function loadFile($filename)
    {
        if (!file_exists($filename)) {
            throw new RuntimeException("File not found: " . $filename);
        }
        $parser = new Parser();
        $yaml = file_get_contents($filename);
        $data = $parser->parse($yaml);
        
        $definitions = [];
        foreach ($data as $name => $properties) {
            $definition = new Definition();
            $definition->setName($name);
            if (isset($properties['details'])) {
                $definition->setDescription($properties['description']);
            }
            if (isset($properties['details'])) {
                $definition->setDetails($properties['details']);
            }
            if (isset($properties['default'])) {
                $definition->setDefault($properties['default']);
            }
            if (!isset($properties['type'])) {
                throw new RuntimeException("Definition $name is missing required `type`");
            }
            $definition->setType($properties['type']);
            
            if (isset($properties['options'])) {
                foreach ($properties['options'] as $optionProperty) {
                    $option = new Option();
                    $option->setValue((string)$optionProperty['value']);
                    $option->setLabel((string)$optionProperty['label']);
                    $definition->addOption($option);
                }
            }

            $definitions[] = $definition;
        }

        return $definitions;
    }
}
