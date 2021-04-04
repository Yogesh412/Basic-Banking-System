<?php


header("Cache-Control: private, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat,26 Jul 1997 05:00:00 GMT");

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "tsfdata"; 
    
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
    <link rel="stylesheet" href="index.css">

    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&display=swap" rel="stylesheet">


    <title>Transaction Page</title>

                <style>
                body {
                        padding-top: 60px;
                        font-size:25px;
                        background: #f5fce3;
                        background: -webkit-linear-gradient(to right, #f5fce3, #e1e6d6 );
                        background: linear-gradient(to right, #f5fce3,#e1e6d6);
                    }
                .center{
                    background: #91c1c9;
                    background: -webkit-linear-gradient(to bottom,  #91c1c9, #5e9da8 );
                    background: linear-gradient(to bottom, #91c1c9, #3a5f66);
                    padding-top:5px;
                    display: block;
                    margin-top: 20px;
                    margin-left: auto;
                    margin-right: auto;
                    width: 50%;    
                }
                .center2{
                    font-size:15px;
                    width:100%;
                }
                table {
                margin: 0 auto; /* or margin: 0 auto 0 auto */
            }
                td,th { border: 1px solid #ddd; padding: 8px; font-family:  'Baloo Bhai 2', cursive;
                font-size: 19px;}
                #Table{ font-family: Arial,Helvetica, sans-serif; border-collapse: collapse;}
                #Table tr:nth-child(even){ background-color: #d2d3d4; }
                #Table tr:nth-child(odd){ background-color: #dee2e3; }
                #Table tr:hover{ background-color: #b5d0eb; }
                #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color:  #608fb3; color:white; }

                </style>    
                <script type="text/javascript">
                
                if(window.history.replaceState){
                    
                    window.history.replaceState(null, null, window.location.href); 
                }
                
            </script>

</head>
<body style="background-color: #5a8e8e;">


<div class="container">
        
        <div class="top">TSF bank</div>
        <span id="fg">HOME</span>
        <a href="display.php">  <span id="antic"> VIEW USERS</span>  </a>
        <a href="RecordsPage.php">  <span id="res"> TRANSACTIONS</span></a>
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

<br><br>  
<?php 
  if(isset($_POST['form_submitted'])){
 
    //These are the variables for data collection
      $UN1 = $_POST['un1'];
      $UN2 = $_POST['un2'];
      $AMOUNT = $_POST['amount'];

      if(empty($UN1) || empty($UN2) || empty($AMOUNT)){
        //javascript code to notify user not to leave the field empty         
        echo "<script> alert('Empty Fields !!');
        window.location.href='index.php';
        </script>";  
        exit() ;           
      }

      //CHECK IF AMOUNT IS GREATER THAN 0 OR NOT
      if($AMOUNT <=0){
        echo "<script> alert('Amount must be greater than zero !!');
        window.location.href='index.php';
        </script>";  
        exit() ;  
      }

      if(!ctype_digit($AMOUNT) || !ctype_digit($UN1) || !ctype_digit($UN2)){
        echo "<script> alert('Entered value can only contain digit!!');
        window.location.href='index.php';
        </script>";  
        exit() ;  
      }

      //CHECK IF SENDER ID EXISTS OR NOT
      $sqlcount = "SELECT COUNT(1) FROM emp where ACCOUNT_NO='$UN1'";
      $r =  $conn->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]<1){
        echo "<script> alert('Payer ID does not exists !!');
        window.location.href='index.php';
        </script>";  
        exit() ;      
      }

      //CHECK IF RECEIVER ID EXISTS OR NOT
      $sqlcount = "SELECT COUNT(1) FROM emp where ACCOUNT_NO='$UN2'";
      $r =  $conn->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]<1){
        echo "<script> alert('Payee ID does not exists !!');
        window.location.href='index.php';
        </script>";  
        exit() ;      
      }

      //CHECK IF SENDER HAS SUFFICIENT MONEY OR NOT
      $sql = "Select * from emp where ACCOUNT_NO='$UN1'";       
          if($result = $conn->query($sql)){            
               $row1 = $result->fetch_array(); 
               if($row1['BALANCE']<$AMOUNT){
                echo "<script> alert('Payer does not have required balance !!');
                window.location.href='index.php';
                </script>";  
                exit() ; 
                }  
          } 

      //THIS PART IS TO PERFORM THE TRANSACTION BETWEEN SENDER AND RECEIVER
       

      echo "<div class ='center'>";
      echo "<div class ='center2'>";
      echo "<h1 style='text-align: center; font-family:  'Baloo Bhai 2', cursive;'>Transaction Successfully Completed</h1>
            <p  style='text-align: center; font-size:25px; font-family:  'Baloo Bhai 2', cursive;'>Details of sender and receiver are as follows<p>
            <table id = 'Table'>
            <tr>
            <th></th>
            <th>Account No</th>
            <th>Name</th>
            <th>Email</th>
           
            </tr>";


            //SELECTING SENDER DETAILS FROM EMP TABLE
          $sql = "Select * from emp where ACCOUNT_NO='$UN1'";       
          if($result = $conn->query($sql)){            
               $row1 = $result->fetch_array(); 
                //row1 contains sender details
                       echo "<tr> 
                            <td > SENDER </td>
                            <td>".$row1['ACCOUNT_NO']."</td>
                            <td>".$row1['NAME']."</td>
                            <td>".$row1['E-MAIL']."</td>
                           
                            </tr>";                        
                       $PayerCurrentBalance = $row1['BALANCE'];            
            }

            //SELECTING RECEIVER DETAILS FROM EMP TABLE
          $sql2 = "Select * from emp where ACCOUNT_NO='$UN2'";
          if($result = $conn->query($sql2)){
                //row2 contains receiver details
                $row2 = $result->fetch_array();
                       echo "<tr> 
                            <td> RECEIVER </td>
                            <td>".$row2['ACCOUNT_NO']."</td>
                            <td>".$row2['NAME']."</td>
                            <td>".$row2['E-MAIL']."</td>
                           
                            </tr>"; 
                        $PayeeCurrentBalance = $row2['BALANCE'];                       
               
               }  
               
               echo "</table>";
            $PayeeCurrentBalance += $AMOUNT;
            $PayerCurrentBalance -= $AMOUNT;
            echo "<br>";
            echo "<table id = 'Table' style='margin-bottom:15px;'>
                    <tr>
                        <th></th>
                        <th>Old Balance</th>
                        <th>New Balance</th>
                    </tr>
                    <tr>
                        <th>SENDER</th>
                        <td style='color:black'>".$row1['BALANCE']."</td>                        
                        <td style='color:black'>".$PayerCurrentBalance."</td>
                    </tr>
                    <tr>
                        <th>RECEIVER</th>
                        <td style='color:black'>".$row2['BALANCE']."</td>                        
                        <td style='color:black'>".$PayeeCurrentBalance."</td>
                    </tr>";
            echo "</table>";

            //UPDATING DETAILS OF SENDER
           $updatepayer ="Update emp set BALANCE='$PayerCurrentBalance' where ACCOUNT_NO='$UN1'";

           //UPDATING DETAILS Of RECEIVER
           $updatepayee ="Update emp set BALANCE='$PayeeCurrentBalance' where ACCOUNT_NO='$UN2'";



            //CHECK IF SENDER DETAILS ARE UPADTED OR NOT 
            if($conn->query($updatepayer)==true){
              ?>         
              <script>console.log("SENDERS DETAILS UPDATED!!")</script>
              <?php
            }
            else{
              ?>
              <script>alert("SENDERS DETAILS NOT UPDATED!!")</script>
                      
              <?php
            }

            //CHECK IF RECEIVER DETAILS ARE UPADTED OR NOT 
           if($conn->query($updatepayee)==true){
            ?>         
            <script>console.log("RECEIVERS DETAILS UPDATED! ")</script>
            <?php
            }
          else{
            ?>        
            <script>alert("RECEIVERS DETAILS NOT UPDATED! ERROR OCCURED!")</script>
            <?php
          }



          //UPDATING HIST TABLE WHICH MAINTAINS RECORDS OF ALL TRANSACTIONS
$InsertTransactTable ="Insert into hist(Payer, PayerAccID, Payee, PayeeAccID, Amount) values ('$row1[NAME]','$row1[ACCOUNT_NO]','$row2[NAME]','$row2[ACCOUNT_NO]','$AMOUNT')";
          //EXECUTING INSERT COMMAND AND CHECKING IF INSERTION WAS SUCCESSULL OR NOT
          if($conn->query($InsertTransactTable)==true){
                  ?>         
                  <script>alert("Record of this transaction saved! ")</script>
                  <?php
          }
          else{
                  ?>        
                  <script>alert("Record of this transaction saved! ERROR OCCURED!")</script>
                  <?php
          }


          echo "<br>";
      echo "</div>";
      echo "</div>";

    }else{
      ?>
      <h1>All transactions are up to date</h1>
      <?php
    }

    //DATABASE CONNECTION ENDS HERE
    $conn->close();
  //PHP CODE ENDS HERE
    ?>


    
</body>
</html>


