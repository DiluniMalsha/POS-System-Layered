<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/18/2019
 * Time: 11:26 AM
 */
require_once __DIR__ . "/../../dto/OrderDTO.php";
require_once __DIR__ . "/../../dto/OrderDetailsDTO.php";
require_once __DIR__ . "/../../db/DBConnection.php";
require_once __DIR__ . "/../../repository/impl/OrderRepositoryImpl.php";
require_once __DIR__ . "/../../repository/impl/OrderDetailRepositoryImpl.php";
require_once __DIR__ . "/../../repository/impl/CustomerRepositoryImpl.php";
require_once __DIR__ . "/../../repository/impl/ItemRepositoryImpl.php";
require_once __DIR__ . "/../../bussiness/OrderBO.php";

class OrderBOImpl implements OrderBO
{

    private $orderRepo;
    private $orderDetailRepo;
    private $customerRepo;
    private $itemRepo;
    /**
     * OrderBOImpl constructor.
     *
     */
    public function __construct()
    {
        $this->orderRepo =new OrderRepositoryImpl();
        $this->orderDetailRepo = new OrderDetailRepositoryImpl();
        $this->customerRepo = new CustomerRepositoryImpl();
        $this->itemRepo = new ItemRepositoryImpl();
    }


    public function addOrder(OrderDTO $orderDTO,OrderDetailsDTO $orderDetailsDTO): bool
    {
        $connection = (new DBConnection())->getConnection();
        $this->orderRepo->setConnection($connection);
        $this->orderDetailRepo->setConnection($connection);
        mysqli_autocommit($connection, false);
        if ($this->orderRepo->addOrder($orderDTO)) {
            if ($this->orderDetailRepo->addOrderDetails($orderDetailsDTO)) {
                mysqli_commit($connection);
                mysqli_autocommit($connection, true);
                return true;
            } else {
                mysqli_rollback($connection);
                mysqli_autocommit($connection, true);
                return false;
            }
        } else {
            mysqli_rollback($connection);
            mysqli_autocommit($connection, true);
            return false;
        }
    }

    public function getAllOrders(): mysqli_result
    {
        $connection=(new DBConnection())->getConnection();
        $this->orderRepo->setConnection($connection);
        return $this->orderRepo->getAllOrders();
    }

    public function getAllCustomers(): mysqli_result
    {
        $connection=(new DBConnection())->getConnection();
        $this->customerRepo->setConnection($connection);
        return $this->customerRepo->getAllCustomers();
    }

    public function getAllItems(): mysqli_result
    {
        $connection=(new DBConnection())->getConnection();
        $this->itemRepo->setConnection($connection);
        return $this->itemRepo->getAllItems();
    }

    public function searchCustomer($customerID): mysqli_result
    {
        $connection=(new DBConnection())->getConnection();
        $this->customerRepo->setConnection($connection);
        return $this->customerRepo->searchCustomer($customerID);
    }

    public function searchItem($code): mysqli_result
    {
        $connection=(new DBConnection())->getConnection();
        $this->itemRepo->setConnection($connection);
        return $this->itemRepo->searchItem($code);
    }
}