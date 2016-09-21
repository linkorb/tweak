<?php

namespace Tweak\Loader;

use Tweak\Settings;
use Symfony\Component\Yaml\Parser;

class YamlLoader extends AbstractFileLoader implements LoaderInterface
{
    public function load($scope)
    {
        $parser = new Parser();
        
        $values = [];
        $filename = $this->getFilename($scope, 'yml');
        if (!$filename) {
            return [];
        }
        $yaml = file_get_contents($filename);
        $values = $parser->parse($yaml);
        return $values;
    }
}
