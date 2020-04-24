<?php 
require('assets/pages/functions.php');


$detail = PrepareStatementDetails();

$planning = PrepareStatementPlanning();
?>
<!DOCTYPE html>
<html lang="en">
<?php require("assets/pages/header.php") ?>
<body>
<?php require('assets/pages/navbar.php') ?>
<h1 class="w-50 mx-auto"><?=$detail['name'] ?></h1>
<div class="w-50 h-30 mx-auto">   
<img src="assets/img/<?=$detail['image']?>" class="w-50 h-30 mx-auto">
</div>
<div class='d-block bg-light rounded w-75 h-50 mx-auto'>
<h2 class="text-center table-secondary border border-secondary border-right-0 border-left-0">Omschrijving</h2>
<br>
<?=$detail['description'];?>
<br>
Link naar spelpagina: <a href="<?=$detail['url']?>" target="_blank"><?=$detail['url']?></a>
</div>
<table class='table w-75 mx-auto'>
    <tr>
      <th class="bg-light sticky-top">Datum: </th>
      <th class="bg-light sticky-top">Spel: </th>
      <th class="bg-light sticky-top">Uitgelegd door: </th>
      <th class="bg-light sticky-top"></th>
      <th class="bg-light sticky-top"></th>
    </tr>
      <?php 
      foreach($planning as $row){
          if($row['game'] == $detail['name']) {
      ?>
      <tr>
      <td><?=$row['date']?></td>
      <td><a href="page.php?name=<?=$row['game']?>"><?=$row['game']?></a></td>
      <td><?=$row['explainer'] ?></td>
      <td><a href="editplanning.php?id=<?=$row['id']?>"><button class="btn btn-primary">Edit</button></a></td>
      <td><a href="assets/pages/deleteplanning.php?id=<?=$row['id']?>"><button class="btn btn-danger">X</button></a></td>
      </tr>
      </table>
      <?php } }?>

<div class='row w-75 h-35 mx-auto mt-5'>
<table class="table">
    <thead>
        <tr class="bg-light">
            <th>Vaardigheden:</th>
            <th>Min. & max. aantal spelers</th>
            <th>speel- en uitleg tijd</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?=$detail['skills'] ?></td>
            <td>Minimaal aantal spelers: <?=$detail['min_players'] ?></td>
            <td>Speeltijd: <?=$detail['play_minutes']?> minuten</td>
        </tr>
        <tr>
            <td></td>
            <td>Maximaal aantal spelers: <?=$detail['max_players'] ?></td>
            <td>Uitlegtijd: <?=$detail['explain_minutes']?> minuten</td>
        </tr>
    </tbody>
</table>
</div>
<div class="mx-auto w-50"><?=$detail['youtube'] ?></div>
<?php require('assets/pages/footer.php'); ?>
</body>
</html>