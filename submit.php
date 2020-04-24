<?php 
require('assets/pages/functions.php');

$result = PrepareStatementGames();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require('assets/pages/header.php'); ?>
</head>
<body>
<?php require('assets/pages/navbar.php') ?>

<div class="mx-auto col-10">
<form action="assets/pages/createplanning.php" method="post">
<div class="form-group">
  <label for="input_planning_name">Selecteer hier het spel</label>
  <!--<input type="text" name="planning_name" class="form-control" placeholder="" aria-describedby="helpId" required> -->
  <select class="custom-select" name="planning_game" required>
  <?php 
  foreach($result as $row) {
  ?>
  <option value="<?=$row['name']?>"><?=$row['name'] ?></option>
  <?php 
  }
  ?>
</select>
</div>

<div class="form-group">
  <label for="input_planning_date">Vul hier de datum in</label>
  <input type="datetime-local" name="planning_date" class="form-control" placeholder="" aria-describedby="helpId" required>
</div>

<div class="form-group">
  <label for="input_planning_explainer">Vul hier de naam van de uitlegger in</label>
  <input type="text" name="planning_explainer" class="form-control" placeholder="" aria-describedby="helpId" required>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php require('assets/pages/footer.php'); ?>
</body>
</html>
