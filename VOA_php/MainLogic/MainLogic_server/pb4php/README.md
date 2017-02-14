Protocol Buffer for PHP  (缩写为pb4php) 
==========================================================
##说明
pb4php是一个"Google Protocol Buffer" 的php实现。至于Google Protocol Buffer是什么？请[百度](http://www.baidu.com)请[Google](http:://www.google.com.tw)吧<br \>

考虑到中国人民，因为网速问题（可能不是网速问题）无法看到本项目的存在，故在osc上同步了一份代码！<br \>
http://git.oschina.net/yuangu/pb4php.git  <br \>
https://github.com/yuangu/pb4php  <br \>


原作原项目地址（考虑到原作者的辛勤劳动，故保持Code license：Apache License 2.0）：<br \>
https://code.google.com/p/pb4php/<br \>
<br \>
<br \>

##使用方法
		require_once('../parser/pb_parser.php');
		$test = new PBParser();
		$test->parse('./performance.proto');


##修复内容（与原版相比）
1、pb_parser.php :Deprecated: Function split() is deprecated  in php5.3以上版本（2013-4-5）<br \>
2、将部分代码里的<? ?>格式换成<?php  ?>，以便于支持php5.3以上默认模式。(2013-4-5) <br \>
