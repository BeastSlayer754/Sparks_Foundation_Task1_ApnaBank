<?php
include('database.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>All Users</title>
    <style>
      table{
        border-color: black;
      }
    </style>
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
          <a class="nav-link active" href="allusers.php">All Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="fundtransfer.php">Fund Transfer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="thistory.php">All Transaction</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
      <table class="table table-bordered border-dark">
            <tr>
              <th>Account No</th>
              <th>Customer Name</th>
              <th>Customer Email</th>
              <th>Balance</th>
              <th>Transfer Funds</th>
            </tr>
            <?php
               $rec = mysqli_query($connection,"SELECT * FROM allcustomers");
               while($d=mysqli_fetch_array($rec))
               {
            ?>
            <tr>
              <td><?php echo $d['AccountNo']; ?></td>
              <td><?php echo $d['CustomerName']; ?></td>
              <td><?php echo $d['CustomerEmail']; ?></td>
              <td><?php echo $d['Balance']; ?></td>
              <td><a href="fundtransfer.php?id=<?php echo $d['AccountNo'];?>">Transfer FUnds</a></td>
            </tr>
            <?php
                }
            ?>
      </table>
      <?php mysqli_close($connection); ?>
      <center>
        <button onClick="window.print()">Print</button>
        <a href="index.php">Back</a>
       <!-- Optional JavaScript; choose one of the two! -->

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
