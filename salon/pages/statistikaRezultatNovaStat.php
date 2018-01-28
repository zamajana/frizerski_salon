
                        <?php

                        include "konekcija.php";

                        if (isset($_GET["datumOd"]) && isset($_GET["datumDo"]) && $_GET["datumOd"]!='' && $_GET["datumDo"]!='') {
                                $datumOd = strtotime($_GET["datumOd"]);
                                $datumDo = strtotime($_GET["datumDo"]);
                                $ukupno = 0;
                                $frizeri = array();
                                $frizeriImena = array();
                                $iznosi = array();

                                $upitFrizeri="SELECT ID, ime, prezime FROM frizer WHERE status = true";
                                if ($u=mysqli_query($baza, $upitFrizeri)) {
                                    $brojac = 0;
                                    while ($red=mysqli_fetch_array($u))
                                    {
                                        $frizeri[$brojac]=$red['ID'];
                                        $frizeriImena[$brojac]=$red['ime']." ".$red['prezime'];
                                        $brojac++;
                                    }
                                } else {
                                    echo "<p>Dogodila se greška prilikom citanja frizera.</p>";
                                    die();
                                }

                                $brojac = 0;
                                foreach ($frizeri as $key => $frizId) {
                                    $iznos = 0;
                                    $upitRez = "SELECT r.iznos AS iznos FROM rezervacija r LEFT JOIN frizer f ON r.frizerID=f.ID WHERE f.ID = ".$frizId." AND r.datum BETWEEN ".$datumOd." AND ". $datumDo."";
                                    if ($u=mysqli_query($baza, $upitRez)) {
                                        while ($red=mysqli_fetch_array($u))
                                        {
                                            $iznos = $iznos + $red['iznos'];
                                        }
                                    ?>
                                        <div class="form-group">
                                            <label for="frizerIznos"><?php echo $frizeriImena[$brojac]?></label>
                                            <input name="<?php echo 'frizer'.$frizId ?>" class="form-control" id="frizerIznos" value="<?php echo $iznos ?>" readonly="true">
                                            </input>
                                        </div>
                                    <?php
                                        $iznosi[$brojac] = $iznos;
                                        $ukupno = $ukupno + $iznos;
                                        $brojac++;
                                    } else {
                                        echo "<p>Dogodila se greška prilikom citanja iznosa.</p>";
                                        die();
                                    }
                                }

                                ?>

                                <div class="form-group">
                                    <label for="ukupnoInput">Ukupno</label>
                                    <input name="ukupnoIznos" class="form-control" id="ukupnoInput" value=" <?php echo $ukupno ?>" readonly="true">
                                    </input>
                                </div>

                                <button type="submit" class="btn btn-primary">Sačuvaj</button>

                                <?php

                            }
                        ?>
                                        

                    

                                    
