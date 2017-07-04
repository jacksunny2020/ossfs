<?php

/*
 * author:施朝阳
 * date: 2017-05-02
 */

namespace Jacksunny\OssFs;

use League\Flysystem\Adapter\AbstractAdapter;

/*
 * 用于基于Laravel框架文件系统访问接口的阿里云文件存取类
 * 必须引入阿里云oss相关类，通过命令 composer require johnlui/aliyun-oss 安装
 * 在 config 文件夹 filesystems.php 配置文件中增加以下配置片段
 * 'oss' => [
  'driver' => 'oss',
  //是使用外网还是内网传递文件，测试时使用外网，运行时使用内网
  'internal'=>false,
  'key' => env('OSS_KEY','APPKEYAPPKEYAPP'),
  'secret' => env('OSS_SECRET','APPSECRETAPPSECRTEAPPSECRETAP'),
  'city'=>'上海',
  'networkType'=>'经典网络',
  'bucket' => env('OSS_BUCKET','mybucketname'),
  ],
 */

class OSSAdapter extends AbstractAdapter {

    //oss客户端
    private $ossClient;
    //默认bucket
    private $defaultBucket;

    /**
     * Create a new filesystem adapter instance.
     *
     * @param  \League\Flysystem\FilesystemInterface  $driver
     * @return void
     */
    public function __construct($ossClient, $defaultBucket) {
//		$serverAddress = $isInternal ? Config::get('app.ossServerInternal') : Config::get('app.ossServer');
//		$this->ossClient = AliyunOSS::boot(
//		  $serverAddress,
//		  Config::get('app.AccessKeyId'),
//		  Config::get('app.AccessKeySecret')
//		);
        $this->ossClient = $ossClient;
        $this->defaultBucket = $defaultBucket;
    }

    /**
     * Copy a file.
     *
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function copy($path, $newpath): bool {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Create a directory.
     *
     * @param string $dirname directory name
     * @param Config $config
     *
     * @return array|false
     */
    public function createDir($dirname, \League\Flysystem\Config $config) {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Delete a file.
     *
     * @param string $path
     *
     * @return bool
     */
    public function delete($path): bool {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Delete a directory.
     *
     * @param string $dirname
     *
     * @return bool
     */
    public function deleteDir($dirname): bool {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Get all the meta data of a file or directory.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getMetadata($path) {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Get the mimetype of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getMimetype($path) {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Get the size of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getSize($path) {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Get the timestamp of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getTimestamp($path) {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Get the visibility of a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function getVisibility($path) {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Check whether a file exists.
     *
     * @param string $path
     *
     * @return array|bool|null
     */
    public function has($path) {
        /*
          $this->ossClient->setBucket($this->defaultBucket);
          $readUrl = $this->ossClient->getPublicUrl($path);
          return null !== $readUrl && isset($readUrl);
         */
        return true;
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * List contents of a directory.
     *
     * @param string $directory
     * @param bool   $recursive
     *
     * @return array
     */
    public function listContents($directory = '', $recursive = false): array {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Read a file.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function read($path) {
        $this->ossClient->setBucket($this->defaultBucket);
        $result = Array(
            'contents' => $this->ossClient->getPublicUrl($path)
        );
        return $result;
    }

    /**
     * Read a file as a stream.
     *
     * @param string $path
     *
     * @return array|false
     */
    public function readStream($path) {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Rename a file.
     *
     * @param string $path
     * @param string $newpath
     *
     * @return bool
     */
    public function rename($path, $newpath): bool {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Set the visibility for a file.
     *
     * @param string $path
     * @param string $visibility
     *
     * @return array|false file meta data
     */
    public function setVisibility($path, $visibility) {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Update a file.
     *
     * @param string $path
     * @param string $contents
     * @param Config $config   Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function update($path, $contents, \League\Flysystem\Config $config) {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
        $this->ossClient->setBucket($this->defaultBucket);
        return $this->ossClient->uploadFile($path, $contents);
    }

    /**
     * Update a file using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config   Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function updateStream($path, $resource, \League\Flysystem\Config $config) {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

    /**
     * Write a new file.
     *
     * @param string $path
     * @param string $contents
     * @param Config $config   Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function write($path, $contents, \League\Flysystem\Config $config) {
        $this->ossClient->setBucket($this->defaultBucket);
        return $this->ossClient->uploadContent($path, $contents);
    }

    /**
     * Write a new file using a stream.
     *
     * @param string   $path
     * @param resource $resource
     * @param Config   $config   Config object
     *
     * @return array|false false on failure file meta data on success
     */
    public function writeStream($path, $resource, \League\Flysystem\Config $config) {
        //todo 需要调用阿里云oss类方法实现，如果不支持请抛出异常
    }

}
