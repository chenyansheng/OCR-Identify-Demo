<?php
/**
 * @doc 识别银行卡号
 * @author chenyansheng
 * @date 2018年4月12日
 */
 
require '../config/config.php';
require '../library/AipOcr.php';

//实例化对象
$client = new AipOcr(APP_ID, API_KEY, SECRET_KEY);

$image = file_get_contents('1.jpg');

// 调用银行卡识别
$ret = $client->bankcard($image);
if(isset($ret['result'])) {
	echo '卡号：' . $ret['result']['bank_card_number'] . '	' . $ret['result']['bank_name'] . "\n";
	//eg: 卡号：622848 1099312404479      农业银行
} else {
	echo '无法识别，原因是：' . $ret['error_msg'] . "\n";
	//eg: 无法识别：recognize bank card error
}
