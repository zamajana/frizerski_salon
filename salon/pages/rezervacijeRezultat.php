<?php

$param=$_GET["param"];

include "konekcija.php";

$upit="SELECT r.ID AS rezId, r.datum AS datumRez, r.vreme AS vremeRez, r.iznos AS iznos, f.ime AS imeFrizera, f.prezime AS prezFrizera, k.ime AS imeKlijenta, k.prezime AS prezKlijenta, k.tel AS telKlijenta 
FROM rezervacija r LEFT JOIN klijent k ON r.klijentID=k.ID LEFT JOIN frizer f ON r.frizerID=f.ID
WHERE k.ime LIKE '".$param."%' OR k.prezime LIKE '".$param."%' OR k.tel LIKE '%".$param."%' OR f.ime LIKE '".$param."%'
order by r.datum desc, r.vreme desc";
                            if (!$rez=mysqli_query($baza, $upit)) {
                                echo "Nastala je greška pri pravljenju upita.</div>";
                                die();
                            } if (mysqli_num_rows($rez)==0){
                                echo "Nema podataka.</div>";
                            }
                            else {
                            ?>

  <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th title="Redni broj">#</th>
                                    <th>Datum</th>
                                    <th>Vreme</th>
                                    <th>Frizer</th>
                                    <th>Klijent</th>
                                    <th>Usluge</th>
                                    <th>Iznos</th>
                                    <th title="Akcije"><i class="fa fa-cog"></i></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $brojac = 1;
                                while ($red=mysqli_fetch_array($rez))
                                {
                                    $rezId=$red['rezId'];
                                    $rezDatum=$red['datumRez'];
                                    $rezVreme=$red['vremeRez'];
                                    $frizer=$red['imeFrizera']." ".$red['prezFrizera'];
                                    $klijent=$red['imeKlijenta']." ".$red['prezKlijenta'].", tel: ".$red['telKlijenta'];
                                    $usluge = null;
                                    $iznos=$red['iznos'];
                                    $upitRezUsluge="SELECT u.naziv AS nazivUsluge FROM rezusluga r LEFT JOIN usluga u ON r.uslugaID=u.ID WHERE r.rezID=".$rezId;
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
                                    ?>
                                    <tr>
                                        <td><?php echo $brojac?></td>
                                        <td><?php if($rezDatum!=null) echo date('d.m.Y.', $rezDatum)?></td>
                                        <td><?php if($rezVreme!=null) echo date('g:i A', $rezVreme)?></td>
                                        <td><?php echo $frizer?></td>
                                        <td><?php echo $klijent?></td>
                                        <td><?php if($usluge!=null && count($usluge)!=0) echo implode(", ", $usluge)?></td>
                                        <td><?php echo $iznos?></td>
                                        <td title="Akcije">
                                            <form role="form" method="get">
                                                <a href="rezervacijaIzmena.php?id=<?php echo $rezId?>" title="Izmeni rezervaciju"><i class="fa fa-pencil" style="margin-right: 15px; margin-left:5px;"></i></a>
                                                <a href="rezervacijePretraga.php?id=<?php echo $rezId?>" title="Obriši rezervaciju"><i class="fa fa-times"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                    $brojac++;
                                }
                                ?>

                                </tbody>
                                </table>

                            <?php
                            }

                            ?>