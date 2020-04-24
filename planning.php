<?php 
require('assets/pages/functions.php');



$result = PrepareStatementPlanning();
?>
<html lang="en">
<?php require('assets/pages/header.php'); ?>
<body>
<?php require('assets/pages/navbar.php') ?>

<div class="mx-auto col-10">

</div>  <div class ="mx-auto col-10">
    <h1 class = "mx-auto text-center">De planning</h1>
  <table class='table row' style='height: 75vh; overflow-y: scroll; overflow-x: hidden;'>
    <tr>
      <th class="bg-light sticky-top">Datum: </th>
      <th class="bg-light sticky-top">Spel: </th>
      <th class="bg-light sticky-top">Uitgelegd door: </th>
      <th class="bg-light sticky-top"></th>
      <th class="bg-light sticky-top"></th>
    </tr>
      <?php 
      foreach($result as $row){
      ?>
      <tr>
      <td><?=$row['date']?></td>
      <td><a href="page.php?name=<?=$row['game']?>"><?=$row['game']?></a></td>
      <td><?=$row['explainer'] ?></td>
      <td><a href="editplanning.php?id=<?=$row['id']?>"><button class="btn btn-primary">Edit</button></a></td>
      <td><a href="assets/pages/deleteplanning.php?id=<?=$row['id']?>"><button class="btn btn-danger">X</button></a></td>
      </tr>
      <?php } ?>
<?php require('assets/pages/footer.php'); ?>
</body>
</html>