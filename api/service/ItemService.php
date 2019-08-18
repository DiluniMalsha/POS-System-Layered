<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 7/17/2019
 * Time: 4:15 PM
 */
?>

<?php

require_once __DIR__ . "/../../api/dto/ItemDTO.php";
require_once __DIR__ . "/../../api/bussiness/impl/ItemBOImpl.php";

$code=$_POST['code'];
$name=$_POST['name'];
$price=$_POST['price'];
$addedDate=$_POST['addedDate'];
$total=$_POST['total'];
$sold=$_POST['sold'];
$returned=$_POST['returned'];
$operation=$_POST['operation'];

$itemBOImpl=new ItemBOImpl();

switch ($operation){

    case "saveItem":
        $itemTEmpObject=new ItemDTO($code,$name,$price,$addedDate,$total,$sold,$returned);
        $result=$itemBOImpl->addItem($itemTEmpObject);
        if ($result){
            echo "Customer Added";
        }else{
            echo "Customer is not Added";
        }
        break;

    case "updateItem":
        $itemTEmpObject=new ItemDTO($code,$name,$price,$addedDate,$total,$sold,$returned);
        $result=$itemBOImpl->updateItem($itemTEmpObject);
        if ($result){
            echo "Customer Updated";
        }else{
            echo "Customer is not Updated";
        }
        break;

    case "deleteItem":
        $result=$itemBOImpl->deleteItem($code);
        if ($result){
            echo "Customer deleted";
        }else{
            echo "Customer is not deleted";
        }
        break;
}

?>

