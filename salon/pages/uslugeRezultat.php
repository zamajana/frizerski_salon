<?php

$param=$_GET["param"];

include "konekcija.php";

$upit="SELECT ID, naziv, cena FROM usluga WHERE naziv LIKE '".$param."%'";
                            if (!$u=mysqli_query($baza, $upit)) {
                                echo "Nastala je greška pri pravljenju upita</div>";
                                die();
                            } if (mysqli_num_rows($u)==0){
                                echo "Nema podataka.</div>";
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
                                    <!--    <td><input name="check[]" type="checkbox" value="<?php echo $red["ID"]?>" /></td> -->
                                        <td><?php echo $brojac?></td>
                                        <td><?php echo $red["naziv"]?></td>
                                        <td><?php echo $red["cena"]?> din.</td>
                                        <td title="Akcije">
                                            <form role="form" method="get">
                                                <a href="uslugaIzmena.php?id=<?php echo $red["ID"]?>" title="Izmeni uslugu"><i class="fa fa-pencil" style="margin-right: 15px; margin-left:5px;"></i></a>
                                                <a href="uslugePretraga.php?id=<?php echo $red["ID"]?>" title="Obriši uslugu"><i class="fa fa-times"></i></a>
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

