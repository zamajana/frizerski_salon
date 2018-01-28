<?php

$param=$_GET["param"];

include "konekcija.php";

// if($param!=null && $param!=""){

$upit="SELECT ID, ime, prezime, tel FROM klijent WHERE ime LIKE '".$param."%' OR prezime LIKE '".$param."%' OR tel LIKE '%".$param."%'";

if (!$u=mysqli_query($baza, $upit)) {
    echo "Nastala je greška pri pravljenju upita.";
    die();
} if (mysqli_num_rows($u)==0){
    echo "Nema podataka.";
}
else {
   ?>

   <div class="form-group">
     <?php
            $brojac = 1;
            while ($red=mysqli_fetch_array($u))
            {
            ?>
        <div class="radio">
            <label>
                <input type="radio" name="klijentSel" value="<?php echo $red["ID"]?>" >
                     <?php echo $red["ime"]." ".$red["prezime"].", ".$red["tel"]?>
                </input>
            </label>
         </div>
         <?php
                $brojac++;
            }
        ?>
    </div>
     <?php
        }


    // }
        ?>

