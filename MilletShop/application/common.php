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

// 应用公共文件
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