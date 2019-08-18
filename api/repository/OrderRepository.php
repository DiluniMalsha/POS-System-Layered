<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/19/2019
 * Time: 1:37 PM
 */
require_once __DIR__ . "/../dto/OrderDTO.php";

interface OrderRepository
{
    public function addOrder(OrderDTO $orderDTO): bool;
    public function getAllOrders(): mysqli_result;
    public function setConnection(mysqli $connection);
}