<?php

namespace Tweak\Loader;

use RuntimeException;

abstract class AbstractFileLoader
{
    protected $datadir;
    
    public function __construct($datadir)
    {
        if (!file_exists($datadir)) {
            throw new RuntimeException("datadir does not exist: " . $datadir);
        }
        $this->datadir = $datadir;
    }

    protected function getFilename($scope, $extension)
    {
        $filename = $this->datadir . '/' . $scope . '.' . $extension;
        if (file_exists($filename)) {
            return realpath($filename);
        }
        return null;
    }
}
