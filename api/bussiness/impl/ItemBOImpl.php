<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/17/2019
 * Time: 4:12 PM
 */
require_once __DIR__ . "/../../dto/ItemDTO.php";
require_once __DIR__ . "/../../db/DBConnection.php";
require_once __DIR__ . "/../../repository/impl/ItemRepositoryImpl.php";
require_once __DIR__ . "/../../bussiness/ItemBO.php";
class ItemBOImpl implements ItemBO
{

    private $itemRepository;

    /**
     * ItemBOImpl constructor.
     * @param $itemRepository
     */
    public function __construct()
    {
        $this->itemRepository = new ItemRepositoryImpl();
    }


    public function addItem(ItemDTO $itemDTO): bool
    {
        $connection=(new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->addItem($itemDTO);
    }

    public function updateItem(ItemDTO $itemDTO): bool
    {
        $connection=(new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->updateItem($itemDTO);
    }

    public function deleteItem($code): bool
    {
        $connection=(new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->deleteItem($code);
    }

    public function getAllItems(): mysqli_result
    {
        $connection=(new DBConnection())->getConnection();
        $this->itemRepository->setConnection($connection);
        return $this->itemRepository->getAllItems();
    }
}