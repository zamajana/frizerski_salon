
               <div class="box-header">
                        <?php

                        $param=$_GET["param"];

                        if($param!=null && $param!=""){

                        include "konekcija.php";

                            $danas = strtotime($param);?>
                            <h3 class="box-title">Prikaz rezervacija za izabrani datum: <?php echo date('d.m.Y.', $danas) ?></h3></br>
                            <?php
                           
                            $upitVremena="SELECT r.ID AS rezId, r.vreme AS vremeRez FROM rezervacija r WHERE r.datum=".$danas." order by r.vreme asc";
                            $upitFrizer="SELECT f.ID AS idFrizera, f.ime AS imeFrizera, f.prezime AS prezFrizera FROM frizer f";
                            $vremena=mysqli_query($baza, $upitVremena);
                            $frizeri=mysqli_query($baza, $upitFrizer);
                            if (!$vremena || !$frizeri) {
                                echo "Nastala je greška pri pravljenju upita.";
                                die();
                            } 
                            if (mysqli_num_rows($vremena)==0 || mysqli_num_rows($frizeri)==0){
                                echo "Nema podataka.";
                            }
                            else {
                                $vremenaNiz=array();
                                $i=0;
                                while($redVreme=mysqli_fetch_array($vremena)){
                                    if(!in_array($redVreme['vremeRez'], $vremenaNiz)){
                                        $vremenaNiz[$i]=$redVreme['vremeRez'];
                                        $i++; 
                                    }else{
                                        continue;
                                    }   
                                }
                                
                            ?>
                        </div>
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Vreme</th>
                                    <?php 
                                    $frizeriNiz=array();
                                    $j=0;
                                    while($redFrizer=mysqli_fetch_array($frizeri)){
                                        $frizeriNiz[$j]=$redFrizer['idFrizera'];
                                        echo "<th>".$redFrizer['imeFrizera']." ".$redFrizer['prezFrizera']."</th>";
                                        $j++;
                                    }
                                    ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $vremeBr=0;
                                while($vremeBr<sizeof($vremenaNiz)){
                                    $vremeRez=$vremenaNiz[$vremeBr];
                             
                                        echo "<tr>";
                                        echo "<td>";
                                        if($vremeRez!=null) echo date('g:i A', $vremeRez);
                                        echo "</td>";

                                        $frizBr=0;
                                        while($frizBr<sizeof($frizeriNiz)){  
                                            echo "<td>";
                                            $frizerId=$frizeriNiz[$frizBr];

                                            $upitPoVremenu="SELECT r.ID AS rezId, r.iznos AS iznos, f.id AS idFrizera, k.ime AS imeKlijenta, k.prezime AS prezKlijenta, k.tel AS telKlijenta 
                                            FROM rezervacija r LEFT JOIN klijent k ON r.klijentID=k.ID LEFT JOIN frizer f ON r.frizerID=f.ID 
                                            WHERE r.datum=".$danas." AND r.vreme=".$vremeRez." AND f.id=".$frizerId." order by r.vreme, f.ID asc";
                                            
                                            if (!$rez=mysqli_query($baza, $upitPoVremenu)) {
                                                echo "Nastala je greška pri pravljenju upita.";
                                                die();
                                            }else if(mysqli_num_rows($rez)!=0){
                                                $redRez=mysqli_fetch_array($rez);
                                                $usluge = null;
                                                $upitRezUsluge="SELECT u.naziv AS nazivUsluge FROM rezusluga r LEFT JOIN usluga u ON r.uslugaID=u.ID WHERE r.rezID=".$redRez['rezId'];
                                                if (!$u=mysqli_query($baza, $upitRezUsluge)) {
                                                    echo "Nastala je greška pri pravljenju upita.</div>";
                                                    die();
                                                }else {
                                                    $br = 0;
                                                    while ($red=mysqli_fetch_array($u)){
                                                        $usluge[$br]=$red['nazivUsluge'];
                                                        $br++;
                                                    }
                                                }
                                                $rezTitle = "";
                                                if($usluge!=null && count($usluge)!=0){
                                                     $uslugeString = implode(", ", $usluge);
                                                     $rezTitle = $uslugeString." | ";
                                                }
                                                $rezTitle = $rezTitle."Iznos = ".$redRez['iznos'];
                                                echo "<div data-toggle='tooltip' title='".$rezTitle."'>".$redRez['imeKlijenta']." ".$redRez['prezKlijenta']."</div>";
                                            } 
                                            echo "</td>";
                                            $frizBr++;
                                        }
                                        echo "</tr>";
                                  
                                    $vremeBr++;
                                        
                                } ?>

                                </tbody>
                                </table>

                            <?php
                            }

                            ?>
                        </div>
                    </div>
<?php }?>