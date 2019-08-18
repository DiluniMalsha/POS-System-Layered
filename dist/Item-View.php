<?php
/**
 * Created by IntelliJ IDEA.
 * User: HP
 * Date: 6/12/2019
 * Time: 10:39 AM
 */

require_once __DIR__. "/../api/dto/ItemDTO.php";
require_once __DIR__. "/../api/bussiness/impl/ItemBOImpl.php";
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
    <title>Pos System/Item</title>
    <style>
        #search{
            padding: 10px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"  style="font-size: 25px">
        <img src="images/POS.png" width="75px">
        POS SYSTEM
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <li class="nav-item active">
                <a class="nav-link" href="Item-View.php">Item <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Order-View.php">Order</a>
            </li>
        </ul>
    </div>
</nav>

<form class="form-inline my-2 my-lg-0" id="search">
    <input class="form-control mr-sm-2" type="search" placeholder="Search Items" aria-label="Search">
    <button class="btn btn-outline-primary  my-2 my-sm-0" type="submit">Search</button>
</form>

<label class="btn-primary" style="padding: 5px;border: 2px solid white; width: 100%">NEW ITEM</label>

<form style="margin: 1%;width: 98%" id="formItem">
    <div class="form-group row">
        <label for="inputCode" class="col-sm-2 col-form-label">Item Code</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputCode" placeholder="I001" name="code">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Item Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" placeholder="Item Name" name="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPrice" placeholder="Rs.1000.00" name="price">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputAddedDate" class="col-sm-2 col-form-label">Added Date</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputAddedDate" placeholder="2019/01/01" name="addedDate">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputTotalQuantity" class="col-sm-2 col-form-label">Total Quantity</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputTotalQuantity" placeholder="100" name="total">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputSoldQuantity" class="col-sm-2 col-form-label">Sold Quantity</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputSoldQuantity" placeholder="00" name="sold">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputReturned" class="col-sm-2 col-form-label">Returned</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputReturned" placeholder="00" name="returned">
        </div>
    </div>
</form>

<div style="margin-left: 60%" id="buttens">
    <button type="button" class="btn btn-outline-primary" id="btnItemSave">Save</button>
    <button type="button" class="btn btn-outline-success" id="btnItemUpdate">Update</button>
    <button type="button" class="btn btn-outline-danger" id="btnItemDelete">Delete</button>
    <button type="button" class="btn btn-outline-warning">Clear</button>
</div>

<table class="table table-hover"style="margin: 1%;width: 98%">
    <thead class="thead-light">
    <tr>
        <th scope="col"></th>
        <th scope="col">Item Code</th>
        <th scope="col">Item Name</th>
        <th scope="col">Price</th>
        <th scope="col">Added Date</th>
        <th scope="col">Total</th>
        <th scope="col">Sold</th>
        <th scope="col">Returned</th>
        <th scope="col">Left</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $itemBO=new ItemBOImpl();
    $result=$itemBO->getAllItems();
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
                    <td>$data[6]</td>
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
    $('#btnItemSave').click(
        function () {
            var itemFormData = $('#formItem').serialize();
            $.ajax(
                {
                    url: "../api/service/ItemService.php",
                    method: "POST",
                    async: true,
                    data: itemFormData + "&operation=saveItem"
                }
            ).done(
                function (res) {
                    alert(res);
                }
            )
        }
    );

    $('#btnItemUpdate').click(
        function () {
            var itemFormData = $('#formItem').serialize();
            $.ajax(
                {
                    url: "../api/service/ItemService.php",
                    method: "POST",
                    async: true,
                    data: itemFormData + "&operation=updateItem"
                }
            ).done(
                function (res) {
                    alert(res);
                }
            )
        }
    );

    $('#btnItemDelete').click(
        function () {
            var itemFormData = $('#formItem').serialize();
            $.ajax(
                {
                    url: "../api/service/ItemService.php",
                    method: "POST",
                    async: true,
                    data: itemFormData + "&operation=deleteItem"
                }
            ).done(
                function (res) {
                    alert(res);
                }
            )
        }
    );
</script>

</body>

</html>
