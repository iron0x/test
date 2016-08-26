<?php

$pay_id = array(1,2);

switch($pay_id)
{
	case 1;
		$
}

class orderStatus
{
	['取消'],
	['确认'],	
	['付款'],
	['退货'],
	['确认'],
	['已取消'],
	['待评价'],
	['评价'],
	['已完成']
}


'
支付宝---->生成订单0--（取消，确认）-->买家确认1--（取消，支付）-->支付2--（取消）-->卖家备货3--（取消）-->卖家发货4--（退货）-->买家收货5--（评价，退货）-->评价6--（退货）-->完成
'

$inter = 
[
	'确认'
	'取消'
	'支付'
	'退货'
	'评价'
];

'
货到付款---->生成订单---->买家确认---->卖家备货---->卖家发货---->买家收货（付款）---->评价---->完成
'



$bottoms =
[
	'order_status' => 1,
	'bonts' => 
	[
		['取消', 'inter']
	];
];



{
	"orderStatus": 1;
}






order_status		订单的状态;0未确认,1确认,2已取消,3无效,4退货
shipping_status		商品配送情况;0未发货,1已发货,2已收货,4退货
pay_status			支付状态;0未付款;1付款中;2已付款



生成订单0			o0,s0,p0

--（取消，确认）-->

买家确认1			o1,s0,p0

--（取消，支付）-->

支付2				o1,s0,p2

--（取消）-->

卖家备货3			o1,s0,p2

--（取消）-->

卖家发货4			o1,s1,p2

--（退货）-->

买家收货5			o1,s2,p2

--（评价，退货）-->

评价6				o1,s2,p2

--（退货）-->

完成				o1,s2,p2

order_status		订单的状态;0未确认,1确认,2已取消,3无效,4退货
shipping_status		商品配送情况;0未发货,1已发货,2已收货,4退货
pay_status			支付状态;0未付款;1付款中;2已付款

function oneGetOrderStatus()
{
	$status = 0;#无效
	switch($order_status)
	{
		case 0:
			$status = 1;#待确认
			break;
		case 1:
			switch($pay_status)
			{
				case 0:
				case 1:
					$status = 2;#待支付		
					break;
				case 2:
					switch($shipping_status)
					{
						case 0:
							$status = 3;#待发货		
							break;
						case 1:
							$status = 4;#待发货
							break;
						case 2:
							switch($comment_status)
							{
								case 0:
									$status = 5;#待评价
									break;
								case 1:
									$status = 6;#完成
									break;
							}
							break;
						case 4:
							$status = 7;#4退货
							break;
					}
					break;
			}
			break;
		case 2:
			$status = 8;#已取消
			break;
		case 3:
			$status = 0;#无效
			break;
		case 4:
			$status = 7;#无效
			break;
	}
	return $status;
}


order_status		订单的状态;0未确认,1确认,2已取消,3无效,4退货
shipping_status		商品配送情况;0未发货,1已发货,2已收货,4退货
pay_status			支付状态;0未付款;1付款中;2已付款

function twoGetOrderStatus()
{
	$status = 0;#无效
	switch($order_status)
	{
		case 0:
			$status = 1;#待确认
			break;
		case 1:
			switch($shipping_status)
			{
				case 0:
					$status = 9;#待发货		
					break;
				case 1:
					$status = 10;#待收货		
					break;
				case 2:
					switch($pay_status)
					{
						case 0:
						case 1:
							$status = 11;#待支付		
							break;
						case 2:
							switch($comment_status)
							{
								case 0:
									$status = 5;#待评价
									break;
								case 1:
									$status = 6;#完成
									break;
							}
							break;		
					}		
					break;
				case 4:
					$status = 12;#待支付		
					break;
			}
			break;
		case 2:
			$status = 8;#已取消
			break;
		case 3:
			$status = 0;#无效
			break;
		case 4:
			$status = 7;#无效
			break;
	}
	return $status;
}
