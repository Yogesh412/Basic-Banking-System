<?php
$servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "spark bank"; 
    
    $conn = new mysqli($servername, $username, $password, $dbname); 
    //IF CONNECTION IS NOT SUCCESSSFUL
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>internshala</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&display=swap" rel="stylesheet">



   
                        <script type="text/javascript">
                        
                            if(window.history.replaceState){
                                
                                window.history.replaceState(null, null, window.location.href); 
                            }
                        
                        </script>

</head>

<body>
    <div class="container">
        
        <div class="top">TSF bank</div>
        <a href="index.php"> <span id="fg">HOME</span> </a>
        <a href="display.php">  <span id="antic"> VIEW USERS</span>  </a>
        <a href="RecordsPage.php"> <span id="res"> TRANSACTIONS</span> </a>
        </div>

    </div>

    <ul>
        
        <li class="dd">
        <a href="java" class="dbtn">ACTIONS</a>
        <div class="dd-content">
        <a href="#nn">Transfer money</a>
        <a href="#nn">Transaction history</a>
    
        </div>
        </li>
    </ul>
                

    <div class="vlog">
        <img src="back.jpg" alt="" width="300px" height="130px">
        <h2>Welcoming you in the most trusted TSF bank !</h2>
    </div>

    <!-- <div class="db">
        <a href="display.php" target="_blank"><input id="b1" type="button" value="View users"></a>
        <input id="b2" type="button" value="Transactions">
    </div> -->


                        
    <div class="pan">
    <div class = 'transferMoney'>
    <h1 id="hello">Transfer Money</h1>
    <!-- Form's action attribute points to this page only-->
    <!-- Note: To redirect page to samee php write "php echo $_SERVER['PHP_SELF'];" in action attribute-->
    <form id="ff" name="myForm" action="ResultPage.php"  onsubmit="return validateForm()" method="post">
    <!-- To structurise form it is put in a table--onsubmit="return validateForm()"-->
        <table id="table1" cellpadding="20" cellspacing="">
        <!-- ROW 1 : PAYER ACCOUNT ID IS ASKED-->
        <tr>
            <td id="tt1">Sender Account No</td>
            <td ><input id="it1"  type="number" name="un1"  min=100 required><td>
        </tr>
        <!-- ROW 2 : PAYEE ACCOUNT ID IS ASKED-->
        <tr>
            <td id="tt2">Receiver Account No</td>
            <td > <input id="it2" type="number" name="un2" min=100 required ><td>
        </tr>
        <!-- ROW 3 : AMOUNT TO BE TRANSFERRED IS ASKED-->
        <tr>
            <td id="tt3">Amount (in Rupees)</td>
            <td ><input id="it3" type="number" name="amount" min=1 required><td>
        </tr>
        <!-- ROW 4 : BUTTON TO ASK TO CONFIRM TRANSACTION-->
        <tr>
            <td><input type= "hidden" name= "form_submitted" value="1"></td>
            <td> <input id="pr" type="submit" value="PROCEED"><td>
        </tr>
       
        </table>
    </form>
</div>
</div>


                        <script>
                        
                        function validateForm() {
                                    var x = document.forms["myForm"]["payerID"].value;
                                    var y = document.forms["myForm"]["payeeID"].value;
                                    var z = document.forms["myForm"]["amount"].value;
                                    var regex=/^[0-9]+$/;

                                    
                                    if (x == "" || y=="" || z=="") {
                                        alert("Fill it!!");
                                        return false;
                                    }

                                    //var num = z>0?1:-1;
                                    if((Math.sign(z)==-1)||(Math.sign(z)==-0)||z==0){
                                        alert("Enter a valid amount to do transaction");
                                        return false;
                                    }
                                    if(isNaN(z)|| !x.match(regex)|| !y.match(regex) ||!z.match(regex)){
                                        alert("Enter correct input!");
                                        return false;
                                    }
                                    
                                // var data = <?php //echo json_encode("42", JSON_HEX_TAG); ?>;
                                }
                                    
                        </script>

</body>

</html>

<?php

    include"connection.php";

    $insquery = "insert into emp(NAME,E-MAIL,BALANCE) values()";
    if(isset($_POST['succ']))
    {
        $name =$_POST['amount'];

        $insquery = "insert into emp()";

    }

?>