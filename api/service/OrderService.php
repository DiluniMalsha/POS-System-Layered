<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/18/2019
 * Time: 11:29 AM
 */
?>

<?php

require_once __DIR__ . "../db/DBConnection.php";
require_once  __DIR__ . "../dto/OrderDTO.php";
require_once  __DIR__ . "../dto/OrderDetailsDTO.php";
require_once __DIR__ . "../bussiness/impl/OrderBOImpl.php";

$orderID=$_POST['orderID'];
$orderDate=$_POST['orderDate'];
$CID=$_POST['CID'];
$code=$_POST['code'];
$qty=$_POST['qty'];
$total=$_POST['total'];

$orderBO=new OrderBOImpl();

$orderDto=new OrderDTO($orderID,$orderDate,$CID);
$orderDetailDTO=new OrderDetailsDTO($orderID,$code,$qty,$total);
$orderBO->addOrder($orderDto,$orderDetailDTO);

?>