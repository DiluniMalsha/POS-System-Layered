<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/17/2019
 * Time: 1:25 PM
 */

require_once  __DIR__ . "/../dto/CustomerDTO.php";

interface CustomerBO
{

    public function addCustomer(CustomerDTO $customerDTO): bool ;
    public function updateCustomer(CustomerDTO $customerDTO): bool ;
    public function deleteCustomer($customerID): bool ;
    public function getAllCustomers(): mysqli_result ;

}