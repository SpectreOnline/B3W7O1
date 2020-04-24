<?php 
require('assets/pages/functions.php');

$id = $_GET['id'];

$resultplanning = PrepareStatementPlanning();

$resultgames = PrepareStatementGames();
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
      foreach($resultplanning as $row){
          if($id != $row['id']){
      ?>
      <tr>
      <td><?=$row['date']?></td>
      <td><?=$row['game']?></td>
      <td><?=$row['explainer'] ?></td>
      <td><a href="assets/pages/editplanning.php?id=<?=$row['id']?>"><button class="btn btn-primary">Edit</button></a></td>
      <td><a href="assets/pages/deleteplanning.php?id=<?=$row['id']?>"><button class="btn btn-danger">X</button></a></td>
      </tr>
      <?php }  else {?>
        <form action="assets/pages/updateplanning.php?id=<?=$id?>" method="post">
        <td><input type="datetime-local" name="planning_date" class="form-control" placeholder="<?=$row['date']?>" aria-describedby="helpId" required></td>
        <td><select class="custom-select" name="planning_name" required>
        <?php 
        foreach($resultgames as $rowgames) {
        ?>
        <option value="<?=$rowgames['name']?>"><?=$rowgames['name'] ?></option>
        <?php 
        }
        ?>
        </select>
        </td>
        <td><input type="text" name="planning_explainer" class="form-control" placeholder="<?=$row['explainer']?>" aria-describedby="helpId" required></td>
        <td><button type="submit" class="btn btn-primary">Done!</button></td>
        </form>
        <td><a href="planning.php"><button class="btn btn-danger">Cancel</button></a></td>
      <?php } 
                }?>
<?php require('assets/pages/footer.php'); ?>