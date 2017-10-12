<?php
/**
 * @link      http://www.activemedia.uz/
 * @copyright Copyright (c) 2017. ActiveMedia Solutions LLC
 * @author    Rustam Mamadaminov <rmamdaminov@gmail.com>
 */

namespace rustamwin\filekit\tests;

use rustamwin\filekit\Storage;

/**
 *
 */
class StorageTest extends TestCase
{
    public function testInitWithBuilder()
    {
        $storage = new Storage([
            'filesystem' => [
                'class' => 'rustamwin\filekit\tests\data\TmpFilesystemBuilder'
            ]
        ]);

        $this->assertNotNull($storage->getFilesystem());

    }

    public function testInitWithComponent()
    {
        $this->destroyApplication();
        $this->mockApplication([
            'components' => [
                'fs' => [
                    'class' => 'creocoder\flysystem\LocalFilesystem',
                    'path' => sys_get_temp_dir()
                ]
            ]
        ]);
        $storage = new Storage([
            'filesystemComponent' => 'fs'
        ]);

        $this->assertNotNull($storage->getFilesystem());
        $this->assertInstanceOf("creocoder\\flysystem\\LocalFilesystem", $storage->getFilesystem());
    }
}
