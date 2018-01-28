
                        <?php

                        include "konekcija.php";

                        if (isset($_GET["statId"]) && $_GET["statId"]!='') {
                                $idStat =  $_GET["statId"];

                                $upitStatistika = "SELECT opis, datumOd, datumDo, ukupno FROM statistika WHERE ID = '".$idStat."'";
                                if ($u=mysqli_query($baza, $upitStatistika)) {

                                    $red=mysqli_fetch_array($u);
                                    $opis=$red['opis'];
                                    $datumOd = $red["datumOd"];
                                    $datumDo = $red["datumDo"];
                                    $ukupno = $red['ukupno'];
                                    $datumOdConvert=date('d.m.Y.', $datumOd);
                                    $datumDoConvert=date('d.m.Y.', $datumDo);
                                        ?>

                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="opisInput">Opis</label>
                                            <input name="opisStat" class="form-control" id="opisInput" value="<?php echo $opis?>" disabled="true" disabled="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="datumOdInput">Datum od</label>
                                            <input name="datumOd" class="form-control" id="datumOdInput" value="<?php echo $datumOdConvert?>" disabled="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="datumDoInput">Datum do</label>
                                            <input name="datumDo" class="form-control" id="datumDoInput" value="<?php echo $datumDoConvert?>" disabled="true">
                                        </div>

                                    </div>

                                    <div class="box-footer">

                                        <?php 

                                        $upitFrizeri="SELECT ID, ime, prezime FROM frizer WHERE status = true";
                                        if ($u2=mysqli_query($baza, $upitFrizeri)) {
                                            while ($red2=mysqli_fetch_array($u2))
                                            {
                                                $frizerId=$red2['ID'];
                                                $frizerIme=$red2['ime']." ".$red2['prezime'];
                                                $upitIznos = "SELECT iznos FROM statistikafrizer WHERE statistikaID='".$idStat."' AND frizerID='".$frizerId."'";
                                                if ($u3=mysqli_query($baza, $upitIznos)){
                                                    $red3=mysqli_fetch_array($u3);
                                                    $frizerIznos=$red3['iznos'];
                                                    ?>

                                                    <div class="form-group">
                                                        <label for="frizerIznos"><?php echo $frizerIme?></label>
                                                        <input name="frizerIznosInput" class="form-control" id="frizerIznos" value="<?php echo $frizerIznos?>" disabled="true">
                                                    </div>

                                                    <?php
                                                }
                                            }
                                        } else {
                                            echo "<p>Dogodila se greška prilikom citanja frizera.</p>";
                                            die();
                                        }

                                        ?>

                                        <div class="form-group">
                                            <label for="ukupnoInput">Ukupno</label>
                                            <input name="ukupno" class="form-control" id="ukupnoInput" value="<?php echo $ukupno?>" disabled="true">
                                        </div>
                                                    
                                    </div>

                                <?php    
                                }
}
                                ?>




                    

                                    
