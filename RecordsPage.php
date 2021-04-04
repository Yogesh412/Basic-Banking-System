<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "tsfdata"; 
$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) { 
  die("Connection failed: " . $conn->connect_error); 
} 
$sql = "SELECT * FROM hist" ;
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="dynamic.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&display=swap" rel="stylesheet">


    <title>Transaction History</title>

    

</head>

<body style="    background-color: #84d291;">

<div class="container">
        
        <div class="top">TSF bank</div>
        <a href="index.php"><span id="fg">HOME</span></a>
        <a href="display.php">  <span id="antic"> VIEW USERS</span>  </a>
        <a href="RecordsPage.php">  <span id="res"> TRANSACTIONS</span> </a>
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

  
	<div class="">
        <h2 class="meth" >Transaction History</h2>

       <br>
       <div>
    <table id = "Table" border="1">
        <thead>
            <tr>
                <th class="rs1">S.No.</th>
                <th class="rs2">Sender</th>
                <th class="rs3">Sender Acc ID</th>
                <th class="rs4">Reciever</th>
                <th class="rs5">Reciever Acc ID</th>
                <th class="rs6">Amount</th>
                
            </tr>
        </thead>
        <tbody>
        
        <?php

    while($row = $result->fetch_assoc()) { 
  ?> 
 <tr>
        <td id="m1"><?php echo $row['S.No']; ?></td>
        <td id="m2"><?php echo $row['Payer']; ?></td>
        <td id="m3"><?php echo $row['PayerAccID']; ?></td>
        <td id="m4"><?php echo $row['Payee']; ?></td>
        <td id="m5"><?php echo $row['PayeeAccID']; ?></td>
        <td id="m6"><?php echo $row['Amount']; ?></td>
        

     
        </tr>
 <?php
    }
  
$conn->close();
?> 
</
</table>
    </div>
</div>
</body>

</html>

