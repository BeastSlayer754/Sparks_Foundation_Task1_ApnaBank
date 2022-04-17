<?php
include('database.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Transaction History</title>
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
          <a class="nav-link" href="fundtransfer.php">Fund Transfer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="thistory.php">All Transaction</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<center><h1><b?>Transaction History</b></h1></center>
<table class="table table-bordered border-dark">
            <tr>
              <th>Id</th>
              <th colspan='2'>From Customer</th>
              <th colspan='2'>To Customer</th>
              <th>Funds</th>
            </tr>
            <tr>
              <th></th>
              <th>Account No</th>
              <th>Customer Name</th>
              <th>Account No</th>
              <th>Customer Name</th>
              <th></th>
            </tr>
            <?php
               $rec = mysqli_query($connection,"SELECT * FROM transferfunds");
               while($d=mysqli_fetch_array($rec))
               {
            ?>
            <tr>
                <td><?php echo $d['id'];?></td>
                <td><?php echo $d['from_acc'];?></td>
                <td><?php echo $d['from_name'];?></td>
                <td><?php echo $d['to_acc'];?></td>
                <td><?php echo $d['to_name'];?></td>
                <td><?php echo $d['funds'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <br><br><br><br><br><br><br>
    <center>    <a href="index.php">Back</a> </center>
       <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    <center><?php include('footer.php') ?></center>
  </body>
</html>
