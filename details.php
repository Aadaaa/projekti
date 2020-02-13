<?php
require_once 'file.php';
include 'header.php';
include 'navigation.php';


if(isset($_GET['Dhoma'])) {
  $DhomaID = $_GET['Dhoma'];
  $select = $db->query("SELECT * FROM dhoma WHERE id = '{$DhomaID}' ");
  $s = $db->query("SELECT * FROM dhoma WHERE id = '{$DhomaID}'");

  if(isset($_POST['data_hyrjes'])) {
    if( !empty($_POST['emri']) && !empty($_POST['data_hyrjes']) && !empty($_POST['data_daljes']) && !empty($_POST['telefon'] ) )
    {

        $emri = $_POST['emri'];
        $data_hyrjes = $_POST['data_hyrjes'];
        $data_daljes = $_POST['data_daljes'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $r_number = mysqli_fetch_assoc($s);
        $r = $r_number['Dhoma_number'];
        $current_date = date("Y-m-d");
 
        
        if($data_hyrjes >= $current_date){
          if($data_daljes >= $data_hyrjes){
          $insert = "INSERT INTO 'rezervime' ('id', 'emri', 'data_hyrjes', 'data_daljes', 'telefon', 'people', 'email', 'Dhoma') 
                            VALUES (NULL, '$emri', '$data_hyrjes', '$data_daljes', '$telefon','$people', '$email', '$r' )";
            
              $_SESSION['Dhoma_success'] = 'Rezervimi i dhomes u be!';
              $save = $db->query($insert); 
                  if($save){
                    $rs = $db->query("SELECT * FROM dhoma WHERE id = '{$DhomaID}' ");
                    $rms = mysqli_fetch_assoc($rs);
                    $dhomaRe = $rms['dhoma'] - $dhoma;
                    if($dhomaRe <= 0){
                      $dhomaRe = 0;
                    }
                    $update = $db->query("UPDATE dhoma SET `dhoma`='$dhomaRe' WHERE id = '{$DhomaID}' ");
                    header("Location: details.php?Dhoma=$DhomaID");
                  }
          
                  echo "<br /> <br />";
            } else {
              echo '<p class="text-center alert alert-danger">Gabim. Ju lutem shenoni nje date dalje pas dates aktuale.</p>';
            }

        } else {
          echo '<p class="text-center alert alert-danger">Gabim. Ju lutem shenoni nje date hyrje pas dates aktuale.</p>';
        }

       
    }
    else
    {
        echo '<br /> Ju lutem plotesoni te gjitha fushat e mesiperme!';
    }
  }

} elseif( !(isset($_GET['Dhoma'])) || $_GET['Dhoma']=='' ) {
  header("Location: dhoma.php");
}

?>

     <!-- Te dhenat e dhomave -->
     <!DOCTYPE html>
     <header>
       <title></title>
     </header>
    <body style="background-color:#a6a6a6">
<div class="container">
    <?php 
    while($Dhoma = mysqli_fetch_assoc($select)): 
      ?>
       <div class="page-header">
         <h2 class="text-left"><?= $Dhoma['Dhoma_number']; ?></h2>
       </div>

       <div class="collumn">
         <div class="col-md-8">
           <img style="width:80%; height:80%" src="<?= $Dhoma['photo']; ?>">
         </div>


         <div class="col-md-8">
           <hr />
           <p><b>LLoji i dhomave qe ofrojme:</b> <?= $Dhoma['lloji']; ?></p>

           <p><b>Numri i dhomave te lira:</b> <?= $Dhoma['dhoma']; ?></p>
           <p><b>Cmimi i dhomes (per 1 nate):</b> <?= $Dhoma['cmimi']; ?></p>
          <p><b>Detaje per dhomen:</b> <?= $Dhoma['details']; ?></p>
           <?=($Dhoma['dhoma'] <= 0)?'<p class="text-danger">Na vjen keq! Nuk ka me dhoma te lira ne kete hotel!</p>':'';?>
         </div>
       </div><br>
  <h3 style="color: red;"> Për të rezervuar ju lutem plotësoni formularin e mëposhtëm të regjistrimit! </h3>
    
      <br><br> <br> <br><br>
      <h2 class="text-left">Lini te dhenat tuaja per te rezervuar: </h2>
         


         <form action="details.php?dhoma=<?=$DhomaID?>" method="POST">
              <div class="collumn"> <!-- per ti vendosur te dhenat ne forme kolone  -->
                  
                    <div class="col-md-8">
                    <label class="form-control-label">Emer/Mbiemer:</label>
                      <input type="text" class="form-control" name="emri" placeholder="psh. Ana Hoxha" <?=($Dhoma['dhoma'] <= 0)?'readonly':'';?>>
                      <br>
                    </div>

                    <div class="col-md-8">
                     <label class="form-control-label">Data e hyrjes:</label>
                      <input type="date" class="form-control" name="data_hyrjes" <?=($Dhoma['dhoma'] <= 0)?'readonly':'';?>>
                      <br>
                    </div>
                  
                     <div class="col-md-8">
                      <label class="form-control-label">Data e daljes:</label>
                      <input type="date" class="form-control" name="data_daljes" <?=($Dhoma['dhoma'] <= 0)?'readonly':'';?>>
                      <br>
                    </div>

                    <div class="col-md-8">
                        <label class="form-control-label">Telefon:</label>
                      <input type="text" class="form-control" name="telefon" placeholder="psh. 0692233444" <?=($Dhoma['dhoma'] <= 0)?'readonly':'';?>>
                      <br>
                    </div>
                    <div class="col-md-8">
                        <label class="form-control-label">Emaili:</label>
                      <input type="email" class="form-control" name="email" placeholder="Adresa juaj e emailit" <?=($Dhoma['dhoma'] <= 0)?'readonly':'';?>>
                      <br>
                    </div>
                   <div class="col-md-8">
                         <label class="form-control-label">Numri i personave:</label>
                      <input type="number" class="form-control" max="5" name="people" <?=($Dhoma['dhoma'] <= 0)?'readonly':'';?>>
                    </div>
                     <div class="col-md-8">
                        <label></label>
                        <input type="submit" class="form-control btn btn-dark" value="Rezervoni" name="data_hyrjes" <?=($Dhoma['dhoma'] <= 0)?'disabled':'';
                        ?>>
                        <br>
                    </div>
                  
                    

              </div>
         </form>
         <?php endwhile; ?>
        </div>
      </body>
      </html>
