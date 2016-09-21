<?php

namespace Tweak\Loader;

use RuntimeException;

class JsonLoader extends AbstractFileLoader implements LoaderInterface
{
    public function load($scope)
    {
        $values = [];
        $filename = $this->getFilename($scope, 'json');
        if (!$filename) {
            return [];
        }
        $json = file_get_contents($filename);
        $values = json_decode($json, true);
        return $values;
    }
}
