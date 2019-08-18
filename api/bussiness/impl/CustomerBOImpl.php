<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/17/2019
 * Time: 1:30 PM
 */
require_once __DIR__ . "/../../dto/CustomerDTO.php";
require_once __DIR__ . "/../../db/DBConnection.php";
require_once __DIR__ . "/../../repository/impl/CustomerRepositoryImpl.php";
require_once __DIR__ . "/../../bussiness/CustomerBO.php";

class CustomerBOImpl implements CustomerBO

{
    private $customerRepository;

    /**
     * CustomerBOImpl constructor.
     * @param $customerRepository
     */
    public function __construct()
    {
        $this->customerRepository = new CustomerRepositoryImpl;
    }


    public function addCustomer(CustomerDTO $customerDTO): bool
    {
        $connection=(new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->addCustomer($customerDTO);
    }

    public function updateCustomer(CustomerDTO $customerDTO): bool
    {
        $connection=(new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->updateCustomer($customerDTO);
    }

    public function deleteCustomer($customerID): bool
    {
        $connection=(new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->deleteCustomer($customerID);
    }

    public function getAllCustomers(): mysqli_result
    {
        $connection=(new DBConnection())->getConnection();
        $this->customerRepository->setConnection($connection);
        return $this->customerRepository->getAllCustomers();
    }

}