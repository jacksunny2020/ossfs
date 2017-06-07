<?php

namespace Jacksunny\OssFs;

use Storage;
use League\Flysystem\Filesystem;
use JohnLui\AliyunOSS;
use Illuminate\Support\ServiceProvider;
use Jacksunny\OssFs\OSSAdapter;

/*
 * 用于基于Laravel框架文件系统访问接口的阿里云文件存取类
 * 对应的文件读写是适配器类 App\Services\OSSAdapter
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

class CloudFileServiceProvider extends ServiceProvider {

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() {
        Storage::extend('oss', function($app, $config) {
            $client = AliyunOSS::boot(
                            $config['city'], $config['networkType'], $config['internal'], $config['key'], $config['secret']
            );
            $defaultBucket = $config['bucket'];

            return new Filesystem(new OSSAdapter($client, $defaultBucket));
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register() {
        //
    }

}
