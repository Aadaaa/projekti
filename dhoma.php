<?php
require_once 'file.php';
include 'header.php';
include 'navigation.php';

$sql = $db->query("SELECT * FROM dhoma");

?>
  
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body style="background-color:#a6a6a6">
    <div class="container"><br>
      <div class="row">
        
    <?php while($Dhoma = mysqli_fetch_assoc($sql)): ?>
        <div class="col-lg-3 col-md-4 col-sm-10">
         <h4 class="text-center"><?= $Dhoma['Dhoma_number']; ?></h4>
          <img src="<?= $Dhoma['photo']; ?>" class="img-responsive" alt="Dhoma" width="100%" height="200px">
          <br><br>
        
            <a href="details.php?Dhoma=<?= $Dhoma['id']; ?>" class="btn btn-block btn-dark">Me shume</a>
        </div>
    <?php endwhile; ?>
</div></div>
</body>
</html>