<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userst.css">
    <link rel="stylesheet" href="index.css">

    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&display=swap" rel="stylesheet">


    <title>Document</title>

    <!-- <?php include 'userst.css'; ?> -->

</head>
<body style="background-color: #406565;">


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

    <div class="maindiv">
    <h1 id="list">list of users</h1>
    <div class="ttb"  >
    <table style="font-size: 20px;  " border="1" >
        <tr style="height: 50px;">
            <th class="th">S.NO</th>
            <th class="th4">ACCOUNT_NO</th>
            <th class="th1">NAME</th>
            <th class="th2">E-MAIL</th>
            <th class="th3">BALANCE</th>
            
        </tr>

                 <?php

                include 'connection.php';
                $sel = "select * from emp";
                $query = mysqli_query($conn,$sel);
                $num = mysqli_num_rows($query);

                while($res = mysqli_fetch_array($query))
                {
                    ?>

                    <tr>
            <td id="dg1" ><?php  echo $res['S.NO'];   ?></td>
            <td id="dg1" ><?php  echo $res['ACCOUNT_NO'];   ?></td>
            <td id="dg2"><?php  echo $res['NAME'];   ?></td>
            <td id="dg3"><?php  echo $res['E-MAIL'];   ?></td>
            <td id="dg4"><?php  echo $res['BALANCE'];   ?></td>
           
                    </tr>

                <?php 
                    
                }

                ?>

        
    </table>
    </div>
    </div>
</body>
</html>