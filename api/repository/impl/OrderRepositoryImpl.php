<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/19/2019
 * Time: 1:39 PM
 */
require_once __DIR__ . "/../../db/DBConnection.php";
require_once __DIR__ . "/../../dto/OrderDTO.php";
require_once __DIR__ . "/../../repository/OrderRepository.php";


class OrderRepositoryImpl implements OrderRepository
{

    private $connection;

    public function addOrder(OrderDTO $orderDTO): bool
    {
        return $this->connection->query("insert into Orders VALUES(
                                        '{$orderDTO->getOrderID()}',
                                        '{$orderDTO->getDate()}',
                                        '{$orderDTO->getCID()}'                                        
                                          )")>0;
    }

    public function getAllOrders(): mysqli_result
    {
        $result = $this->connection->query("select * from Orders");
        return $result;
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }
}