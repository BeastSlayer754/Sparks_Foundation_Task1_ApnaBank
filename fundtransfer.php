<?php
//header('Location:allusers.php');
error_reporting(0);
include('database.php');
$AccountNo = $_GET['id'];
$query1 = "SELECT * FROM allcustomers WHERE AccountNo = '$AccountNo'";
$way1 = mysqli_query($connection,$query1);
$fetch1 = mysqli_fetch_array($way1);
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Fund Transfer</title>
  </head>
  <body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Apna Bank</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adduser.php">Add Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allusers.php">All Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="fundtransfer.php">Fund Transfer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="thistory.php">All Transaction</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br><center>
  <h1>Funds Transfer</h1><br><br>
  <form action="#" method="POST">
    <h6>From Account</h6>
  Account Number : <input type="text" name="fano" value="<?php echo $fetch1['AccountNo'];  ?>"><br><br>
  Customer Name : <input type="text" name="fcn" value="<?php echo $fetch1['CustomerName']; ?>"><br><br>
  Customer Email : <input type="text" name="fce" value="<?php echo $fetch1['CustomerEmail']; ?>" ><br><br>
  Balance : <input type="text" name="fbal" value="<?php echo $fetch1['Balance']; ?>"><br><br>

   <h6>To Account</h6><br><br>
   
   Account Number<input type="text" name="tacno"><br><br>
   Customer Name<input type="text" name="tcn"><br><br>
   Funds To Transfer<input type="text" name="tfunds"><br><br>
   <input type="submit" name="trf" value="Transfer"><br><br>
 </form>

</center>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    <br><br><br><br><br><br><br>
    <center><?php include('footer.php') ?></center>
  </body>
</html>

<?php

if(isset($_POST['trf'])){
    $facno = $_POST['fano'];
    $fundst = $_POST['tfunds'];
    $tacno = $_POST['tacno'];
     
    $query5 = "SELECT *FROM allcustomers WHERE AccountNo = $tacno";
    $way5 = mysqli_query($connection,$query5);
    $fetch2 = mysqli_fetch_array($way5);


    if(($fundst)<0){
        echo "<script> alert('Cannot Transfer Amount Less Than Zero'); <script>";
    }
    else if($fundst > $fetch1['Balance']){
        echo "<script> alert('Account Balance Low!!!'); </script>";
    }
    else if($fundst == 0){
        echo " <script> alert('Cannot Transfer Zero Money!!');</script>";
    }
    else{

         $changebalance = $fetch1['Balance'] - $fundst;
         $query3 = "UPDATE allcustomers SET Balance = $changebalance WHERE AccountNo = $AccountNo";
         $way3 = mysqli_query($connection,$query3);

         $changebalance = $fetch2['Balance'] + $fundst;
         $query4 = "UPDATE allcustomers SET Balance = $changebalance WHERE AccountNo = $tacno";
         $way4 = mysqli_query($connection,$query4);

         $fcn = $fetch1['CustomerName'];
         $tcn = $fetch2['CustomerName'];

         $query2 = "INSERT INTO transferfunds(from_acc,from_name,funds,to_acc,to_name) VALUES ('$AccountNo','$fcn','$fundst','$tacno','$tcn')";
         $way2 = mysqli_query($connection,$query2);

         if($way2)
         {
             echo "<script> alert('Transfer Successfull');
                           window.location = 'thistory.php';
                   </script>";
         }

         $changebalance = 0;
         $fundst = 0;
    }
}


?>