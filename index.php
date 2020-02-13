<?php
require_once 'file.php';
include 'header.php';
include 'navigation.php';
$sql = $db->query("SELECT * FROM dhoma LIMIT 8");
$vendeSQL = $db->query("SELECT * FROM vendet LIMIT 8");
?>

    <header class="py-5 bg-image-full" style="background-image: url('images/Librazhd,_Albania_2018_03.jpg'); height:600px">
      
    </header>
    <body style="background-color:#a6a6a6">
  <h2> <div class="container"><strong> Ku ndodhemi? </strong>
  </h2>
    <p><section class="py-5"> <div class="container">Librazhdi eshte qytet ne juglindje te Shqiperise ne rrethin e Librazhdit. <br>
     Kufizohet ne veri me rrethet Bulqize; perendim nga rrethi i Elbasanit; ne jug nga rrethi i<br>
     Gramshit; ne juglindje nga rrethi i Pogradecit dhe ne lindje nga Republika e Maqedonise. Librazhdi<br>
     ka nje gjatesi kufitare prej 42 km dhe ka teresisht nje reliev kodrinoro-malor. Relievin e ben<br>
     me te larmishem fushegropat si ajo e Domosdoves ne Perrenjas dhe ajo e Studnes me ate te Letmit.<br>
     Lartesia maksimale mbi nivelin e detit eshte 2253 m ne majen e Kuqe te malit Shebenik.
    </p>
  
    <section class="py-5">
      <div class="container">
        <h2><strong> Zbuloni hotelet me interesante: </strong></h2><hr />
      <div class="row">

      <?php while($Dhoma = mysqli_fetch_assoc($sql)): ?>
          <div class="col-lg-3 col-md-4 col-sm-6">
            <h4 class="text-center"><?=$Dhoma['Dhoma_number'];?></h4>
            <img src="<?=$Dhoma['photo'];?>" class="img-responsive" alt="Dhoma" width="100%" height="200px">
            <section class="text-justify">
              <br> <br>
              <a href="details.php?Dhoma=<?= $Dhoma['id']; ?>" class="btn btn-block btn-dark">Me shume: </a>
            </section>
          </div>

    <?php endwhile; ?>
      </div>
    </section>

    <!--Permajtja e faqes-->
    <section class="py-5">
      <div class="container">
        <h2><strong> Zbuloni udhetimet me te fundit :</strong> </h2>
        <div class="row">

        <?php while($vende = mysqli_fetch_assoc($vendeSQL)): ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
              <h4 class="text-center"><?=$vende['title'];?></h4>
              <img src="<?=$vende['photo'];?>" class="img-responsive" alt="Dhoma" width="100%" height="200px">
              <br> <br>
                <section class="text-justify">
                <a href="vende.php?vende=<?= $vende['id']; ?>" class="btn btn-block btn-dark">Me shume: </a>
              </section>
            </div>

      <?php endwhile; ?>
        </div>
      </div>
    </section>


    <footer class="py-5 bg-inverse">
      <div class="container">
        <p class="m-0 text-center ">Copyright &copy; InxhinieriInformatike2020</p>
      </div>
    </footer>

 
  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</div></section></div></section></p>

  </body>

</html>
