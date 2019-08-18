<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/17/2019
 * Time: 1:31 PM
 */

require_once __DIR__ . "/../../db/DBConnection.php";
require_once __DIR__ . "/../../dto/CustomerDTO.php";
require_once __DIR__ . "/../../repository/CustomerRepository.php";

class CustomerRepositoryImpl implements CustomerRepository
{
    private $connection;

    public function addCustomer(CustomerDTO $customerDTO): bool
    {
        return ($this->connection->query("insert into Customer values(
                                        '{$customerDTO->getCustomerID()}',
                                        '{$customerDTO->getCustomerFirstName()}',
                                        '{$customerDTO->getCustomerLastName()}',
                                        '{$customerDTO->getCustomerEmail()}',
                                        '{$customerDTO->getCustomerAddress()}',
                                        '{$customerDTO->getCustomerTelephone()}'
                                          )"));
    }

    public function updateCustomer(CustomerDTO $customerDTO): bool
    {
        return ($this->connection->query("update Customer set FirstName='{$customerDTO->getCustomerFirstName()}',LastName='{$customerDTO->getCustomerLastName()}',Email='{$customerDTO->getCustomerEmail()}',Address='{$customerDTO->getCustomerAddress()}',Telephone='{$customerDTO->getCustomerTelephone()}' where CID=='{$customerDTO->getCustomerID()}'"));
    }

    public function deleteCustomer($customerID): bool
    {
        return ($this->connection->query("delete from Customer where CID='{$customerID}'"));
    }

    public function getAllCustomers(): mysqli_result
    {
        $result=$this->connection->query("select * from Customer");
        return $result;
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function searchCustomer($customerID): mysqli_result
    {
        $result=$this->connection->query("select * from Customer where CID='{$customerID}'");
        return $result;
    }
}