<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/17/2019
 * Time: 4:13 PM
 */
require_once __DIR__ . "/../dto/ItemDTO.php";

interface ItemRepository
{

    public function addItem(ItemDTO $itemDTO): bool ;
    public function updateItem(ItemDTO $itemDTO): bool ;
    public function deleteItem($code): bool ;
    public function getAllItems(): mysqli_result ;
    public function searchItem($code): mysqli_result ;
    public function setConnection(mysqli $connection);

}