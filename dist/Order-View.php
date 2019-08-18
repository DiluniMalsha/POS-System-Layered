<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 6/12/2019
 * Time: 10:41 AM
 */

require_once __DIR__ . "/../api/dto/OrderDTO.php";
require_once __DIR__ . "/../api/dto/OrderDetailsDTO.php";
require_once __DIR__ . "/../api/bussiness/impl/OrderBOImpl.php";
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
    <title>Pos System/Order</title>
    <style>
        #itemForm {
            position: absolute;
            top: 70%;
            left: 0;
        }

        #itemTable {
            position: absolute;
            top: 70%;
            left: 52%;
        }

        .lbl {
            font-size: 25px;
            font-family: 'Oswald', sans-serif;
        }

        #customerForm {
            position: absolute;
            top: 30%;
            left: 40%;
        }

        #orderForm {
            position: absolute;
            top: 30%;
            left: 0;
        }

        .form {
            margin: 1% !important;
        }

        #btnProceed {
            position: absolute;
            left: 70%;
            top: 135%;
            width: 150px;
        }

        #btnClear {
            position: absolute;
            left: 85%;
            top: 135%;
            width: 150px;
        }

        #search {
            padding: 10px;
        }

        #add {
            margin-left: 67%;
        }

        #tableOrder {
            position: absolute;
            top: 145%;
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
            <li class="nav-item">
                <a class="nav-link" href="Customer-View.php">Customer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Item-View.php">Item</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Order-View.php">Order <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<form class="form-inline my-2 my-lg-0" id="search">
    <input class="form-control mr-sm-2" type="search" placeholder="Search Order" aria-label="Search">
    <button class="btn btn-outline-primary  my-2 my-sm-0" type="submit">Search</button>
</form>

<form id="formOrder">
    <label class="btn-primary" style="padding: 5px;border: 2px solid white; width: 100%">NEW ORDER</label>

    <div style="width: 39%" id="orderForm" class="form">

        <label class="btn-secondary" style="padding: 5px; width: 100%">ORDER DETAILS</label>

        <div class="form-group row">
            <label for="inputOrderID" class="col-sm-2 col-form-label">Order ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputOrderID" placeholder="Ord-00123" name="orderID">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputDate" placeholder="01/01/2019" name="orderDate">
            </div>
        </div>
    </div>
    <div style="width: 59%" id="customerForm" class="form">
        <label class="btn-secondary" style="padding: 5px;border: 2px solid white; width: 100%">CUSTOMER DETAILS</label>

        <div class="form-group row">
            <label for="inputCustomerID" class="col-sm-2 col-form-label">Customer ID</label>
            <div class="col-sm-10">
                <select class="form-control" id="inputCustomerID" name="CID">
                    <?php
                    $orderBO = new OrderBOImpl();
                    $result = $orderBO->getAllCustomers();
                    while ($data = mysqli_fetch_row($result)) {
                        echo "
                            <option>$data[0]</option>
                        ";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
            </div>
        </div>
    </div>

    <label class="btn-secondary"
           style="position: absolute;top: 65%;margin-left: 1%; padding: 5px;border: 2px solid white; width: 99%">ITEM
        DETAILS</label>
    <div style="margin: 1%;width: 50%" id="itemForm" class="form">

        <div class="form-group row">
            <label for="inputItemCode" class="col-sm-2 col-form-label">Item Code</label>
            <div class="col-sm-10">
                <select class="form-control" id="inputItemCode" name="code">
                    <?php
                    $orderBO = new OrderBOImpl();
                    $result = $orderBO->getAllItems();
                    while ($data = mysqli_fetch_row($result)) {
                        echo "
                            <option>$data[0]</option>
                        ";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputItemName" class="col-sm-2 col-form-label">Item Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputItemName" placeholder="Item Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAvailableQty" class="col-sm-2 col-form-label">Available Quantity</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputAvailableQty" placeholder="100">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputUnitPrice" class="col-sm-2 col-form-label">Unit Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputUnitPrice" placeholder="Rs.1000.00">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputQty" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputQty" placeholder="10" name="qty">
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-primary" style="margin-left: 90%">
                Add
            </button>
        </div>
    </div>
    <table class="table table-hover" style="margin: 1%;width: 46%" id="itemTable">
        <thead class="thead-light">
        <tr>
            <th scope="col">ITEM CODE</th>
            <th scope="col">ITEM NAME</th>
            <th scope="col">UNIT PRICE</th>
            <th scope="col">QUANTITY</th>
            <th scope="col">TOTAL</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">I-001</th>
            <td>School Bag</td>
            <td>Rs.12000.00</td>
            <td>01</td>
            <td>Rs.12000.00</td>
        </tr>
        <tr>
            <th scope="row">I-001</th>
            <td>School Bag</td>
            <td>Rs.12000.00</td>
            <td>01</td>
            <td>Rs.12000.00</td>
        </tr>
        <tr>
            <th scope="row">I-001</th>
            <td>School Bag</td>
            <td>Rs.12000.00</td>
            <td>01</td>
            <td>Rs.12000.00</td>
        </tr>
        <tr style="color: red">
            <td colspan="4" style="text-align: right">
                <b>Total</b>
            </td>
            <td><b>Rs.36000.00</b></td>
        </tr>
        </tbody>
    </table>

    <div class="container" style="position: absolute; top: 125%; margin: 10px">
        <div class="row">
            <div class="col-lg-4">
                <label class="lbl">Total : Rs.</label>
                <input type="text">
            </div>
            <div class="col-lg-4">
                <label class="lbl">Discount : Rs.</label>
                <input type="text">
            </div>
            <div class="col-lg-4">
                <label class="lbl">Sub Total : Rs.</label>
                <input type="text" name="total">
            </div>
        </div>
    </div>

    <button type="button" class="btn-lg  btn-primary" id="btnProceed">Proceed</button>
    <button type="button" class="btn-lg btn-warning" id="btnClear">Clear</button>
</form>

<table class="table table-hover" id="tableOrder" style="margin: 1%;width: 98%">
    <thead class="thead-light">
    <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Order Date</th>
        <th scope="col">Customer ID</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $orderBO = new OrderBOImpl();
    $result = $orderBO->getAllOrders();
    while ($data = mysqli_fetch_row($result)) {
        echo "
                <tr>                    
                    <td>$data[0]</td>
                    <td>$data[1]</td>
                    <td>$data[2]</td>                   
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
<script src="js/Order.js"></script>
</body>
</html>
