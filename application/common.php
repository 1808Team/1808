<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

/**
 * 链接PDO
 * @return PDO|string
 */
function LinkPdo(){
   $localhost = "127.0.0.1";
   $dbName = "myku";
   $admin  = "admin";
   $pass  = "123456";
   $port = "3306";//默认
    $charset = "utf8";
   $dsn = "mysql:host=$localhost;dbname=$dbName;port=$port;charset=$charset";
 try{
     $linkPdo = new \PDO($dsn,$admin,$pass);
     $linkPdo->query('set names utf8');
     return $linkPdo;
 }catch(PDOException$error){
     return $error->getMessage();
     die();
 }
}

/**
 * 验证接收值 是否为空
 * @param $arr
 * @return bool
 */
function isNulls($arr){
    foreach($arr as $v){
        if(empty($v)){
            return true;
        }
    }
    return false;
}

/**
 * 验证手机号是否正确
 * @param $phone
 */
function JudgePhone($phone){
    if( $phone ){
        if(preg_match('/^1[34578]{1}\d{9}/',$phone)){
            return true;
        }
        return false;
    }
}
function messageSms($phone,$Code){
    include_once("../extend/SDK/CCPRestSDK.php");
// 应用公共文件
    /**
     * 发送模板短信
     * @param to 手机号码集合,用英文逗号分开
     * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
     * @param $tempId 模板Id
     */
    function sendTemplateSMS($to,$datas,$tempId)
    {
        //主帐号
        $accountSid = '8a216da874762af20174772c1e3b0159';

//主帐号Token
        $accountToken = '00504f408f754b9d8c67189083095a8e';

//应用Id
        $appId ='8a216da874762af20174772c1f720160';

//请求地址，格式如下，不需要写https://
        $serverIP = 'app.cloopen.com';

//请求端口
        $serverPort = '8883';

//REST版本号
        $softVersion = '2013-12-26';
        // 初始化REST SDK
        $rest = new REST($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);

        // 发送模板短信
     
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
            echo "result error!";
            // break;
        }
        if($result->statusCode!=0) {
            echo "error code :" . $result->statusCode . "<br>";
            echo "error msg :" . $result->statusMsg . "<br>";
            //TODO 添加错误处理逻辑
        }else{
            return  json(['code'=>0,'msg'=>"验证码已发送",'data'=>""]);
            //TODO 添加成功处理逻辑
        }
    }

//Demo调用,参数填入正确后，放开注释可以调用
    // sendTemplateSMS($phone,$Code,1);

   return sendTemplateSMS($phone,$Code,1);
}