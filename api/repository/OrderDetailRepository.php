<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/19/2019
 * Time: 1:38 PM
 */
require_once __DIR__ . "/../dto/OrderDetailsDTO.php";

interface OrderDetailRepository
{
    public function addOrderDetails(OrderDetailsDTO $orderDetailsDTO): bool;
    public function setConnection(mysqli $connection);
}