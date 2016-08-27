/**
 *  获取用户指定范围的订单列表
 *
 * @access  public
 * @param   int         $user_id        用户ID号
 * @param   int         $num            列表最大数量
 * @param   int         $start          列表起始位置
 * @return  array       $order_list     订单列表
 */
function GZ_get_user_orders($user_id, $num = 10, $start = 0, $type = 'await_pay')
{
    /* 取得订单列表 */
    $arr    = array();

    $sql = "SELECT order_id, order_sn, order_status, shipping_status, pay_status, pay_id, pay_name, add_time, " .
           "(goods_amount + shipping_fee + insure_fee + pay_fee + pack_fee + card_fee + tax - discount) AS total_fee ".
           " FROM " .$GLOBALS['ecs']->table('order_info') .
           " WHERE user_id = '$user_id' " . GZ_order_query_sql($type) . " ORDER BY add_time DESC";
           // print_r($sql);exit;
           // file_put_contents('./a.txt', $type.':'.$sql."\n", FILE_APPEND);
    $res = $GLOBALS['db']->SelectLimit($sql, $num, $start);
   	while ($row = $GLOBALS['db']->fetchRow($res))
    {
/*
order_status  tinyint(1)  否 订单的状态;0未确认,1确认,2已取消,3无效,4退货
shipping_status   tinyint(1)  否 商品配送情况;0未发货,1已发货,2已收货,4退货
pay_status  tinyint(1)  否 支付状态;0未付款;1付款中;2已付款
*/
        $row['shipping_status'] = ($row['shipping_status'] == SS_SHIPPED_ING) ? SS_PREPARING : $row['shipping_status'];
		$row['_order_status'] = $row['order_status']; 
        $row['order_status'] = $GLOBALS['_LANG']['os'][$row['order_status']] . ',' . $GLOBALS['_LANG']['ps'][$row['pay_status']] . ',' . $GLOBALS['_LANG']['ss'][$row['shipping_status']];

        $arr[] = array('order_id'       => $row['order_id'],
                       'order_sn'       => $row['order_sn'],
                       'order_time'     => local_date($GLOBALS['_CFG']['time_format'], $row['add_time']),
                       'order_status'   => $row['order_status'],
					   'total_fee'      => price_format($row['total_fee'], false),
					   'pay_name'       => $row['pay_status'],
					   'status'			=> getOrderStatus($row['_order_status'], $row['shipping_status'], $row['pay_status'], $row['pay_id'], $row['order_id'])
        );
    }

    return $arr;
}

/*****************************
 * 0	无效订单
 * 1	已取消
 * 2	未确认（取消，确认付款）
 * 3	待付款（确认付款）
 * 4	待发货（退货）
 * 5	待收货（确认收货，退货）
 * 6	待评价（评价）
 * 7	完成
 * 8	退货中
 * 9	退货完毕
 *
 */
function getOrderStatus($orderStatus, $shipStatus, $payStatus, $payType, $orderId)
{
	$status = 0;

	switch($orderStatus)
	{
		case 0:
			$status = 2;
			break;
		case 1:
			$status = 3;
			switch($payType)
			{
				#货到付款
				case 3:
					switch($shipStatus)
					{
						case 0:
							$status = 4;
							break;
						case 1:
							$status = 5;
							break;
						case 2:
							$status = 3;
							switch($payStatus)
							{
								case 0:
								case 1:
									$status = 3;
									break;
								case 2:
									$status = (int)$GLOBALS['db']->getOne("SELECT COUNT(rec_id) FROM ".$GLOBALS['ecs']->table('order_goods')." WHERE `order_id`={$orderId} AND `isEvaluated`=0") > 0 ? 6 : 7 ;
									break;
								default:
									$status = 3;
									break;
							}
							break;
						default:
							$status = 0;
							break;
					}
					break;
				#线上付款
				default:
					switch($payStatus)
					{
						case 0:
						case 1:
							$status = 3;
							break;
						case 2:
							$status = 4;
							switch($shipStatus)
							{
								case 0:
									$status = 4;
									break;
								case 1:
									$status = 5;
									break;
								case 2:
									$status = (int)$GLOBALS['db']->getOne("SELECT COUNT(rec_id) FROM ".$GLOBALS['ecs']->table('order_goods')." WHERE `order_id`={$orderId} AND `isEvaluated`=0") > 0 ? 6 : 7 ;
									break;
								default:
									$status = 4;
									break;
							}
							break;
						default:
							$status = 3;
							break;
					}
					break;
			}
			break;
		case 2:
			$status = 1;
			break;
		case 3:
			$status = 0;
			break;
		case 4:
			$status = 8;
			switch($shipStatus)
			{
				case 4:
					$status = 9;
					break;
				case 1:
					$status = 8;
					break;
				default:
					$sattus = 8;
					break;
			}
			break;
		default:
			$status = 0;
			break;
	}

	return $status;
}

