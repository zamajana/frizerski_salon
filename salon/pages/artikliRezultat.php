<?php

$param=$_GET["param"];

include "konekcija.php";

$upit="SELECT ID, naziv, cena, kolicina FROM prodaja WHERE naziv LIKE '".$param."%'";
                            if (!$u=mysqli_query($baza, $upit)) {
                                echo "Nastala je greška pri pravljenju upita.";
                                die();
                            } if (mysqli_num_rows($u)==0){
                                echo "Nema podataka.";
                            }
                            else {
                            ?>

  <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                <!--    <th>Izbor</th> -->
                                    <th title="Redni broj">#</th>
                                    <th>Naziv</th>
                                    <th>Cena</th>
                                    <th>Količina</th>
                                    <th title="Akcije"><i class="fa fa-cog"></i></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $brojac = 1;
                                while ($red=mysqli_fetch_array($u))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $brojac?></td>
                                        <td><?php echo $red["naziv"]?></td>
                                        <td><?php echo $red["cena"]?> din.</td>
                                        <td><?php echo $red["kolicina"]?></td>
                                        <td title="Akcije">
                                            <form role="form" method="get">
                                                <a href="artikalIzmena.php?id=<?php echo $red["ID"]?>" title="Izmeni artikal"><i class="fa fa-pencil" style="margin-right: 15px; margin-left:5px;"></i></a>
                                                <a href="artikliPretraga.php?id=<?php echo $red["ID"]?>" title="Obriši artikal"><i class="fa fa-times"></i></a>
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

