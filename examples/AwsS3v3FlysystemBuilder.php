<?php
/**
 * @link      http://www.activemedia.uz/
 * @copyright Copyright (c) 2017. ActiveMedia Solutions LLC
 * @author    Rustam Mamadaminov <rmamdaminov@gmail.com>
 */

use League\Flysystem\Filesystem;
use rustamwin\filekit\filesystem\FilesystemBuilderInterface;
use yii\base\Object;

/**
 * Class AwsS3v3FlysystemBuilder
 *
 */
class AwsS3v3FlysystemBuilder extends Object implements FilesystemBuilderInterface
{
    public $key;
    public $secret;
    public $region;

    /**
     * @return mixed
     */
    public function build()
    {
        $client = new Aws\S3\S3Client([
            'credentials' => [
                'key'    => $this->key,
                'secret' => $this->secret
            ],
            'region' => $this->region,
            'version' => 'latest',
        ]);

        $adapter = new League\Flysystem\AwsS3v3\AwsS3Adapter($client, 'your-bucket-name');
        $filesystem = new Filesystem($adapter);

        return $filesystem;
    }
}