# ossfs
laravel file system plugin based-on aliyun oss,you may use oss as normal laravel file system mode

1. install package
   composer require "jacksunny/ossfs":"dev-master"

2. append the code below to array "disks" in the file config/filesystems.php
  <pre>
  'oss' => [
            'driver' => 'oss',
            //using innernal network to transfer files,suggest external network for testing,internal network for running
            //'internal'=>true,
            'internal'=>false,
            'key' => env('OSS_KEY','APPKEYAPPKEYAPPK'),
            'secret' => env('OSS_SECRET','APPSECRETAPPSECRETAPPSECRETAPP'),            
            'city'=>'上海',
            'networkType'=>'经典网络',
            'bucket' => env('OSS_BUCKET','mybucketname'),
        ],
   </pre>
3. now you may use laravel file system to put/get files on aliyun oss
   <pre>
   $filename = time()."";
   $content = "Contents";
   $result =  Storage::disk('oss')->put($filename, $content);
   </pre>
