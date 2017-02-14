<?php

/**
 * @brief 调用其它业务
 * @param $service_name  业务名，用作寻址，可传入IP地址或业务名("login.web" or "10.0.0.1:1000@udp")
 *        $method_name   方法名，pb规定的业务名，带namespace("echo.EchoService.EchoTest")
 *        $body          序列化后的包体
 *        $timeout       超时时间，单位毫秒
 * @return 回复包体+错误信息的数组
 * @notice 1. 需要首先判断返回值的 $return['errmsg']是否等于"Success"
 *         2. 如果等于Success，则可以取出包体 $return['rsp']做反序列化
 */
function callmethod($service_name, $method_name, $body, $timeout)
{
    if (extension_loaded('monitor_php'))
    {
        $report_flag = 1;
    }
    else
    {
        $report_flag = 0;
    }

    if ($report_flag == 1)
    {
        $attr = "call [" . $service_name . ":" . $method_name . "]";
        rpc_report($attr);
    }

    $ret = callmethod_no_report($service_name, $method_name, $body, $timeout);

    if ($report_flag == 1)
    {
        $attr = "call [" . $service_name . ":" . $method_name . "]" . $ret['errmsg'];
        rpc_report($attr);
    }

    return $ret;
}

function callmethod_no_report($service_name, $method_name, $body, $timeout)
{
    $seq = rand();
    $ret = array();
    $ret['errmsg'] = 'Success';
    $ret['rsp'] = null;

    if (! extension_loaded('nlb_php'))
    {
        $ret['ret'] = -20;
        $ret['errmsg'] = "extension nlb_php.so mush be installed";
        return $ret;
    }

    if (! extension_loaded('srpc_comm_php'))
    {
        $ret['ret'] = -20;
        $ret['errmsg'] = "extension srpc_comm_php.so mush be installed";
        return $ret;
    }

    $send = srpc_serialize($method_name, $body, $seq);
    if ($send === null)
    {
        $ret['ret'] = -3;
        $ret['errmsg'] = 'srpc_pack failed';
        return $ret;
    }

    $recv = srpc_sendrcv($service_name, $send, $timeout);
    if ($recv === null)
    {
        $ret['ret'] = -13;
        $ret['errmsg'] = 'srpc_sendrcv failed';
        return $ret;
    }

/*    if ($recv['errmsg'] !== 'Success')
    {
        $ret['errmsg'] = 'srpc_sendrcv failed, '.$recv['errmsg'];
        return $ret;
    }

    $resp = srpc_unpack($recv['rsp']);
*/
    $resp = srpc_deserialize($recv);
    if ($resp === null)
    {
        $ret['ret'] = -3;
        $ret['errmsg'] = 'srpc_unpack falied.';
        return $ret;
    }

    if ($resp['errmsg'] !== 'success' && $resp['errmsg'] !== 'Success') 
    {
        $ret['ret'] = -3;
        $ret['errmsg'] = 'srpc_unpack failed, '.$resp['errmsg'];
        return $ret;
    }
    if ($resp['seq'] !== $seq)
    {
        $ret['ret'] = -16;
        $ret['errmsg'] = 'the sequence is inconsistent';
        return $ret;
    }

    $ret['ret'] = 0;
    $ret['rsp'] = $resp['body'];
    return $ret;

}

?>
