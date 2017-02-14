

<?php

require_once 'pb4php/message/pb_message.php';   // pb4php文件
require_once 'pb_proto_msec.php';   // 自动生成的pb文件
require_once 'call_service.php';                // callmethod文件

/**
 * @brief 客户端调用示例
 */



/**
 * @brief GetMP3List测试示例
 */
$req = new GetMP3ListRequest();

// TODO: 设置请求报文字段

// 序列化报文
$req_str = $req->serializeToString();

// 调用callmethod方法
$rsp_str = callmethod("127.0.0.1:7963@udp", "crawl.CrawlService.GetMP3List", $req_str, 2000);

if ($rsp_str['errmsg'] != 'Success')
{
    exit('call service failed: '.$rsp_str['errmsg']);
}

$rsp = new GetMP3ListResponse();

// 反序列化回复报文
$rsp->ParseFromString($rsp_str['rsp']);

var_dump($rsp);





?>


