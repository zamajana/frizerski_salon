
                        <?php

                        include "konekcija.php";

                                $opis =  $_GET["param"];

                                $upit="SELECT ID, opis FROM statistika WHERE opis LIKE '%".$opis."%' order by datumOd desc";
                                if (!$u=mysqli_query($baza, $upit)) {
                                    echo "Nastala je greška pri pravljenju upita.</div>";
                                    die();
                                } if (mysqli_num_rows($u)==0){
                                    echo "Nema podataka.";
                                }else{

                                    ?>
                                             <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th title="Redni broj">#</th>
                                                    <th>Opis</th>
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
                                                        <td><a onclick="pregledStatistike(<?php echo $red["ID"]?>)"><?php echo $red["opis"]?></a></td>
                                                        <td title="Akcije">
                                                            <form role="form" method="get">
                                                                <a href="statistikaPretraga.php?id=<?php echo $red["ID"]?>" title="Obriši statistiku"><i class="fa fa-times"></i></a>
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





                    

                                    
