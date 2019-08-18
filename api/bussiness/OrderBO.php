<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/18/2019
 * Time: 11:27 AM
 */
require_once  __DIR__ . "/../dto/OrderDTO.php";
require_once  __DIR__ . "/../dto/OrderDetailsDTO.php";

interface OrderBO
{
    public function addOrder(OrderDTO $orderDTO,OrderDetailsDTO $orderDetailsDTO): bool ;
    public function getAllOrders(): mysqli_result ;
    public function getAllCustomers(): mysqli_result ;
    public function getAllItems(): mysqli_result ;
    public function searchCustomer($customerID): mysqli_result ;
    public function searchItem($code): mysqli_result ;
}