<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/17/2019
 * Time: 1:43 PM
 */
?>

<?php
require_once __DIR__ . "/../../api/dto/CustomerDTO.php";
require_once __DIR__ . "/../../api/bussiness/impl/CustomerBOImpl.php";

$customerID=$_POST['customerID'];
$customerFirstName=$_POST['customerFirstName'];
$customerLastName=$_POST['customerLastName'];
$customerEmail=$_POST['customerEmail'];
$customerAddress=$_POST['customerAddress'];
$customerTelephone=$_POST['customerTelephone'];
$operation=$_POST['operation'];

$customerBOImpl=new CustomerBOImpl();

switch ($operation){

    case "saveCustomer":
        $customerTEmpObject=new CustomerDTO($customerID,$customerFirstName,$customerLastName,$customerEmail,$customerAddress,$customerTelephone);
        $customerBOImpl->addCustomer($customerTEmpObject);
        break;

    case "updateCustomer":
        $customerTEmpObject=new CustomerDTO($customerID,$customerFirstName,$customerLastName,$customerEmail,$customerAddress,$customerTelephone);
        $customerBOImpl->updateCustomer($customerTEmpObject);
        break;

    case "deleteCustomer":
        $customerBOImpl->deleteCustomer($customerID);
        break;
}

?>