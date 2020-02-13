<?php

require_once 'file.php';
include 'header.php';
include 'navigation.php';

if(isset($_GET['vende'])) {
  $vendeID = $_GET['vende'];
  $select = $db->query("SELECT * FROM vendet WHERE id = '{$vendeID}' ");
  $s = $db->query("SELECT * FROM vendet WHERE id = '{$vendeID}' ");
  $data = mysqli_fetch_assoc($s);


if(isset($_POST['Rezervoni'])) {
  if(isset($_POST['emri']) && isset($_POST['email']) && isset($_POST['telefon'])){
        $emri = $_POST['emri'];
        $email = $_POST['email'];
        $people = $_POST['people'];
        $telefon = $_POST['telefon'];

      $save = $db->query("INSERT INTO rezervo_vende ( 'id','rezervime','emri','email','telefon')
                            VALUES ('$vendeID','people',$emri','$email','$telefon')");

      if($save){
        $rezervimeRe = $data['rezervime'] - $people;
        $update = $db->query("UPDATE vendet SET rezervime = '$rezervimeRe' WHERE id = '$vendeID' ");
      }
      $_SESSION['vende_success'] = 'Rezervimi u be!';
      header("Location: vende.php?vende=$vendeID ");


  } else {
  echo 'JU lutem plotesoni te gjitha fushat e kerkuara!';
  }
}


} elseif( !(isset($_GET['vende'])) || $_GET['vende']=='' ) {
  header("Location: vendet.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body style="background-color:#a6a6a6">
     <!-- Pershrkimi i hotelit -->
<div class="container">
    <?php while($vende = mysqli_fetch_assoc($select)): ?>
       <div class="page-header">
         <h2 class="text-center"><?= $vende['title']; ?></h2>
       </div>

       <div class="row">
         <div class="col-md-6">
           <img class="" style="width:100%; height:400px" src="<?= $vende['photo']; ?>">
         </div>

         <!-- Right collumn for details -->
         <div class="col-md-6">
           <hr />
           <p><b>Ku ndodhet:</b> <?= $vende['location']; ?></p>
           <p><b>Cmimi (per nje person):</b>
                 <?= $vende['cmimi']; ?> leke</p>
           <p><b>Pershkrimi:</b> <?= $vende['details']; ?></p>
           <p><b>Rezervime te mbetura:</b>
                 <?= $vende['rezervime']; ?></p> 
                 <?=($vende['rezervime'] <= 0)?
                 '<p class="text-danger"> Rezervimet mbaruan, nuk mund të rezervoni më për vende! </p>':'';?>
           <hr />

           <p> Deshironi te rezervoni per nje udhetim ne kete vend? </p> 
            <h3 style="color: red;"> Për të rezervuar ju lutem plotësoni formularin e mëposhtëm të regjistrimit! </h3>
    
           <a href="/images/shigjete.png"/></a>
           <br> <br><br><br><br><br><br><br><br><br>
           </div>

           <div class="page-header">
                    <h2 ><strong> Lini te dhenat tuaja:</strong> </h2><br><br>
              </div>
                <form action="vende.php?vende=<?=$vendeID?>" method="POST" >
                    <div class="row">

                    <div class="col-md-8">
                        <label class="form-control-label">Emri/Mbiemri:</label>
                        <input type="text" class="form-control " name="emri"   placeholder="Emri" <?=($vende['rezervime'] <= 0)?>>
                        <br>
                    </div>


                    <div class="col-md-8">
                        <label class="form-control-label">Numri i telefonit: </label>
                        <input type="text" class="form-control" name="number" id="" placeholder="psh. 0692233444"  <?=($vende['rezervime'] <= 0)?'readonly':'';?>>
                        <br>
                    </div>

                    <div class=" col-md-8">
                      <label class="form-control-label">Email: </label>
                      <input type="text" class="form-control" name="email" id="" placeholder="Adresa juaj e emailit"  <?=($vende['rezervime'] <= 0)?'readonly':'';?>>
                        <br>
                    </div>

                     <div class="col-md-8">
                        <label class="form-control-label">Per sa veta doni te rezervoni:</label>
                        <input type="number" class="form-control" name="people"  id="" placeholder="Nr i personave"  <?=($vende['rezervime'] <= 0)?'readonly':'';?>>
                        <br>
                    </div>
                    <div class="col-md-8">
                    <input type="submit" class="btn btn-dark form-control" value="Rezervoni" name=" <?=($vende['rezervime'] <= 0)?'readonly':'Rezervoni';?> class="btn btn-dark form-control  <?=($vende['rezervime'] <= 0)? 'disabled':'';?>>
                    <br>
                  </div>
                </form>

              </div>
           </div>

         </div>
       </div>
     </form></div></div></body></html>
<?php endwhile; ?>

        </div>

<br /><br /><br /><br /><br>