<?php
/**
 * @link      http://www.activemedia.uz/
 * @copyright Copyright (c) 2017. ActiveMedia Solutions LLC
 * @author    Rustam Mamadaminov <rmamdaminov@gmail.com>
 */

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use yii\base\Object;

/**
 * Class LocalFilesystemBuilder
 * *
 *
 */
class LocalFilesystemBuilder extends Object implements \rustamwin\filekit\filesystem\FilesystemBuilderInterface
{
    /**
     * @var
     */
    public $path;

    /**
     * @return Filesystem
     */
    public function build()
    {
        $adapter = new Local(\Yii::getAlias($this->path));
        return new Filesystem($adapter);
    }
}