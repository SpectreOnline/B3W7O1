<div id="carouselId" class="carousel slide bg-secondary" data-ride="carousel"> <!--Use classes to define transparancy in carousel -->
    <ol class="carousel-indicators">
    <li data-target="#carouselId" data-slide-to="1" class='active'> </li>
    <?php 
      foreach($result as $row){
      ?>
      <li data-target="#carouselId" data-slide-to="<?=$row[$id] ?>"></li>
      <?php } ?>
    </ol>
    <div class="carousel-inner col-4 mx-auto" role="listbox"  style="height: 50vh">
    <div class="carousel-item active">
        <img src="assets/img/10min_kraak.jpg" alt="<?=$row['id']?>-slide" style="height: 50vh">
      </div>
    <?php 
      foreach($result as $row){
      ?>
      <div class="carousel-item">
        <img src="assets/img/<?=$row['image']?>" alt="<?=$row['id']?>-slide" style="height: 50vh">
        <div class="row col-12 carousel-caption bg-dark d-none d-md-block w-100">
        <a href="page.php?name=<?=$row['name']?>"><h3><?=$row['name']?></h3></a>
          
        </div>
      </div>
      <?php } ?>

    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
