<?php
require_once 'file.php';
include 'header.php';
include 'navigation.php';

$sql = $db->query("SELECT * FROM vendet");
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body style="background-color:#a6a6a6">
   
    <div class="container"><br />
      <div class="row">

    <?php while($vende = mysqli_fetch_assoc($sql)): ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <h4 class="text-center"><?= $vende['title']; ?></h4>
          <img src="<?= $vende['photo']; ?>" class="img-responsive" alt="vende" width="100%" height="200px">
          <section class="text-justify">
            <p>
              <?php= $vende['details']; ?>
            </p>
            <a href="vende.php?vende=<?= $vende['id']; ?>" class="btn btn-block btn-dark">Me shume</a>
          </section>
        </div>
    <?php endwhile; ?>
    
      </div>
    </div>
  </body>
</html>