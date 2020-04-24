<?php 
require('assets/pages/functions.php');



$result = PrepareStatementGames();
?>
<!doctype html>
<html lang="en">
    <?php require('assets/pages/header.php'); ?>
  <body>
  <?php require('assets/pages/navbar.php') ?>

  <?php include('assets/pages/carousel.php') ?>

  <div class ="mx-auto col-10">
    <h1 class = "mx-auto text-center">Lijst van spellen die wij hebben</h1>
  <table class='table row' style='height: 50vh; overflow-y: scroll; overflow-x: hidden;'>
    <tr>
      <th class="bg-light sticky-top">Thumbnail: </th>
      <th class="bg-light sticky-top">Name: </th>
      <th class="bg-light sticky-top">Description: </th>
    </tr>
      <?php 
      foreach($result as $row){
      ?>
      <tr>
      <td><a href="page.php?name=<?=$row['name']?>"><img src="assets/img/<?=$row['image']?>" class="w-100 h-65"></a></td>
      <td><?=$row['name']?></td>
      <td><?=$row['description'] ?></td>
      </tr>
      <?php } ?>
      
  </table>
      </div>
     <?php require('assets/pages/footer.php'); ?>
  </body>
</html>