<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 6/12/2019
 * Time: 10:37 AM
 */

require_once __DIR__. "/../api/dto/CustomerDTO.php";
require_once __DIR__. "/../api/bussiness/impl/CustomerBOImpl.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="images/css/bootstrap.css">
    <link rel="stylesheet" href="images/css/bootstrap-grid.css">
    <link rel="stylesheet" href="images/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="images/css/Style.css">
    <link rel="stylesheet" type="text/css" href="images/css/semantic.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Pos System/Customer</title>
    <style>
        #search {
            padding: 10px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="font-size: 25px">
        <img src="images/POS.png" width="75px">
        POS SYSTEM
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Customer-View.php">Customer <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Item-View.php">Item</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Order-View.php">Order</a>
            </li>
        </ul>
    </div>
</nav>

<form class="form-inline my-2 my-lg-0" id="search">
    <input class="form-control mr-sm-2" type="search" placeholder="Search Customers" aria-label="Search">
    <button class="btn btn-outline-primary  my-2 my-sm-0" type="submit">Search</button>
</form>

<label class="btn-primary" style="padding: 5px;border: 2px solid white; width: 100%">NEW CUSTOMER</label>

<form style="margin: 1%;width: 98%" id="formCustomer">
    <div class="form-group row">
        <label for="inputID" class="col-sm-2 col-form-label">Customer ID</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputID" placeholder="Customer ID" name="customerID">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" name="customerFirstName">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputLastName" placeholder="Last Name" name="customerLastName">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="customerEmail">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="customerAddress">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputTelephone" class="col-sm-2 col-form-label">Telephone</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputTelephone" placeholder="Telephone"
                   name="customerTelephone">
        </div>
    </div>
</form>

<div style="margin-left: 60%" id="buttens">
    <button type="button" class="btn btn-outline-primary" id="btnCustomerSave">Save</button>
    <button type="button" class="btn btn-outline-success" id="btnCustomerUpdate">Update</button>
    <button type="button" class="btn btn-outline-danger" id="btnCustomerDelete">Delete</button>
    <button type="button" class="btn btn-outline-warning">Clear</button>
</div>

<table class="table table-hover" style="margin: 1%;width: 98%">
    <thead class="thead-light">
    <tr>
        <th scope="col"></th>
        <th scope="col">Customer ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Telephone</th>
    </tr>
    </thead>
    <tbody>
    <?php

        $customerBO=new CustomerBOImpl();
        $result=$customerBO->getAllCustomers();
        while ($data=mysqli_fetch_row($result)){
            echo "
                <tr>
                    <td></td>
                    <td>$data[0]</td>
                    <td>$data[1]</td>
                    <td>$data[2]</td>
                    <td>$data[3]</td>
                    <td>$data[4]</td>
                    <td>$data[5]</td>
                </tr>
            ";
        }
    ?>
    </tbody>
</table>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/semantic.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.bundle.js"></script>

<script>
    $('#btnCustomerSave').click(
        function () {
            var customerFormData = $('#formCustomer').serialize();
            $.ajax(
                {
                    url: "../api/service/CustomerService.php",
                    method: "POST",
                    async: true,
                    data: customerFormData + "&operation=saveCustomer"
                }
            ).done(
                function (res) {
                    if (res){
                        alert("Customer Added")
                    } else {
                        alert("Error")
                    }
                }
            )
        }
    );

    $('#btnCustomerUpdate').click(
        function () {
            var customerFormData = $('#formCustomer').serialize();
            $.ajax(
                {
                    url: "../api/service/CustomerService.php",
                    method: "POST",
                    async: true,
                    data: customerFormData + "&operation=updateCustomer"
                }
            ).done(
                function (res) {
                    if (res){
                        alert("Customer Updated")
                    } else {
                        alert("Error")
                    }
                }
            )
        }
    );

    $('#btnCustomerDelete').click(
        function () {
            var customerFormData = $('#formCustomer').serialize();
            $.ajax(
                {
                    url: "../api/service/CustomerService.php",
                    method: "POST",
                    async: true,
                    data: customerFormData + "&operation=deleteCustomer"
                }
            ).done(
                function (res) {
                    if (res){
                        alert("Customer Deleted")
                    } else {
                        alert("Error")
                    }
                }
            )
        }
    );
</script>

</body>

</html>