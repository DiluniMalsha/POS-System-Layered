<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/19/2019
 * Time: 1:39 PM
 */
require_once __DIR__ . "/../../db/DBConnection.php";
require_once __DIR__ . "/../../dto/OrderDetailsDTO.php";
require_once __DIR__ . "/../../repository/OrderDetailRepository.php";


class OrderDetailRepositoryImpl implements OrderDetailRepository

{

    private $connection;

    public function addOrderDetails(OrderDetailsDTO $orderDetailsDTO): bool
    {
        return $this->connection->query("insert into OrderDetail values(
                                        '{$orderDetailsDTO->getOrderID()}',
                                        '{$orderDetailsDTO->getCode()}',
                                        '{$orderDetailsDTO->getQty()}',
                                        '{$orderDetailsDTO->getTotal()}'                                        
                                          )") > 0;
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }
}