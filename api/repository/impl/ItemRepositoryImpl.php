<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/17/2019
 * Time: 4:14 PM
 */

require_once __DIR__ . "/../../db/DBConnection.php";
require_once __DIR__ . "/../../dto/ItemDTO.php";
require_once __DIR__ . "/../../repository/ItemRepository.php";

class ItemRepositoryImpl implements ItemRepository
{

    private $connection;

    public function addItem(ItemDTO $itemDTO): bool
    {
        return $this->connection->query("insert into Customer VALUES ('{$itemDTO->getCode()}','{$itemDTO->getName()}','{$itemDTO->getPrice()}','{$itemDTO->getAddedDate()}','{$itemDTO->getTotal()}','{$itemDTO->getSold()}','{$itemDTO->getReturned()}')")>0;
    }

    public function updateItem(ItemDTO $itemDTO): bool
    {
        return $this->connection->query("update Customer set Name='{$itemDTO->getName()}',Price='{$itemDTO->getPrice()}',AddedDate='{$itemDTO->getAddedDate()}',Total='{$itemDTO->getTotal()}',Sold='{$itemDTO->getSold()}',Returned='{$itemDTO->getReturned()}' where Code= '{$itemDTO->getCode()}'")>0;
    }

    public function deleteItem($code): bool
    {
        return ($this->connection->query("delete from Item where CID='{$code}'")>0);
    }

    public function getAllItems(): mysqli_result
    {
        $result = $this->connection->query("select * from Item");
        return $result;
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection=$connection;
    }

    public function searchItem($code): mysqli_result
    {
        $result = $this->connection->query("select * from Item where code='{$code}'");
        return $result;
    }
}