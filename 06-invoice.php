<?php
// konekcija so data baza
// SELECT * FROM users WHERE id = 56 LIMIT 1;

$name = 'Jane Doe';
$number = 123456;
$email = 'jane@mail.com';
$address = 'City 123 State23';
$imgUrl = 'https://engineering.unl.edu/images/staff/Kayla-Person.jpg';

$companyName = 'Some Company LTD';
$companyEmail = 'company@mail.com';
$companyNumber = 111222333;
$companyAddress = '1331 Street City';

$item1 = 'Book';
$itemPrice1 = 50.99;

$item2 = 'Watch';
$itemPrice2 = 150.75;

$item3 = 'Smartphone';
$itemPrice3 = 300.35;

$totalAmount = $itemPrice1 + $itemPrice2 + $itemPrice3;

$totalPaid = 600;

$balance = $totalAmount - $totalPaid;

if($balance > 0) {
    $bootstrapClass = 'text-danger';
} else {
    $bootstrapClass = 'text-success';
}
// echo date('Y-F-d H:i:s');
// die();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->
    <style type="text/css">
        .text-danger strong {
            color: #9f181c;
        }
        .receipt-main {
            background: #ffffff none repeat scroll 0 0;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 30px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
            font-family: open sans;
        }
        .receipt-main p {
            color: #333333;
            font-family: open sans;
            line-height: 1.42857;
        }
        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }
        .receipt-main::after {
            background: #414143 none repeat scroll 0 0;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }
        .receipt-main thead {
            background: #414143 none repeat scroll 0 0;
        }
        .receipt-main thead th {
            color:#fff;
        }
        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }
        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }
        .receipt-right p i {
            text-align: center;
            width: 18px;
        }
        .receipt-main td {
            padding: 9px 20px !important;
        }
        .receipt-main th {
            padding: 13px 20px !important;
        }
        .receipt-main td {
            font-size: 13px;
            font-weight: initial !important;
        }
        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }   
        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }
        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }
        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }
        
        #container {
            background-color: #dcdcdc;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="receipt-header">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="receipt-left">
                            <!-- show user image -->
                            <img class="img-responsive" alt="iamgurdeeposahan" src="<?= $imgUrl ?>" style="width: 71px; border-radius: 43px;">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <div class="receipt-right">
                            <!-- show company name -->
                            <h5><?= $companyName ?></h5>
                             <!-- show company number -->
                            <span><?= $companyNumber ?> <i class="fa fa-phone"></i></span> <br>
                             <!-- show company email -->
                            <span><?= $companyEmail ?> <i class="fa fa-envelope-o"></i></span> <br>
                             <!-- show company address -->
                            <span><?= $companyAddress ?> <i class="fa fa-location-arrow"></i></span> <br>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="receipt-header receipt-header-mid">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                             <!-- show user name -->
                            <h5><?= $name ?></h5>
                             <!-- show user number -->
                            <span><b>Mobile: <?= $number ?></b></span> <br>
                             <!-- show user email -->
                            <span><b>Email: <?= $email ?></b></span> <br>
                             <!-- show user address --> 
                            <span><b>Address: <?= $address ?></b></span> <br>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="receipt-left">
                            <h1>Receipt</h1>
                        </div>
                    </div>
                </div>
            </div>
            
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- item 1 name -->
                            <td class="col-md-9"><?= $item1 ?></td>
                            <!-- item 1 price -->
                            <td class="col-md-3"><i class="fa fa-eur"></i><b> <?= $itemPrice1 ?></b></td>
                        </tr>
                        <tr>
                            <!-- item 2 name -->
                            <td class="col-md-9"><?= $item2 ?></td>
                            <!-- item 2 price -->
                            <td class="col-md-3"><i class="fa fa-eur"></i><b> <?= $itemPrice2 ?></b></td>
                        </tr>
                        <tr>
                            <!-- item 3 name -->
                            <td class="col-md-9"><?= $item3 ?></td>
                            <!-- item 3 price -->
                            <td class="col-md-3"><i class="fa fa-eur"></i><b> <?= $itemPrice3 ?></b></td>
                        </tr>
                        <tr>
                            <td class="text-right">
                            <span>
                                <strong>Total Amount to pay: </strong>
                            </span>
                        </td>
                        <td>
                            
                            <span>
                                <!-- show total to-pay -->
                                <strong><i class="fa fa-eur"></i> <?= $totalAmount ?></strong>
                            </span>
                        </td>
                        <tr>
                            <td class="text-right">
                            <span>
                                <strong>Total Amount payed: </strong>
                            </span>
                        </td>
                        <td>
                            
                            <span>
                                <!-- show total paid -->
                                <strong><i class="fa fa-eur"></i> <?= $totalPaid ?></strong>
                            </span>
                        </td>
                            
                        <tr>
                           
                            <td class="text-right"><h2><strong>Balance: </strong></h2></td>
                            <!-- show total balance color and balance -->
                            <td class="text-left  <?= $bootstrapClass ?>"><h2><strong><i class="fa fa-eur"></i> <?= $balance ?></strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="row">
                <div class="receipt-header receipt-header-mid receipt-footer">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                            <!-- generate date -->
                            <span><b>Date : <?= date('Y-F-d'); ?></b></span>
                            <h5 style="color: rgb(140, 140, 140);">Thank you for your order!</h5>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="receipt-left">
                            <h1>Signature</h1>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>    
    </div>
</div>

</body>
</html>