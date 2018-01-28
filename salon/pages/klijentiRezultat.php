<?php

$param=$_GET["param"];

include "konekcija.php";

$upit="SELECT ID, ime, prezime, datumRodj, tel FROM klijent WHERE ime LIKE '".$param."%' OR prezime LIKE '".$param."%' OR tel LIKE '%".$param."%'";

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
                <th title="Redni broj">#</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Datum rođenja</th>
                <th>Telefon</th>
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
                <td><?php echo $red["ime"]?></td>
                <td><?php echo $red["prezime"]?></td>
                <td><?php if($red["datumRodj"]!=null) echo date('d.m.Y.', $red["datumRodj"])?></td>
                <td><?php echo $red["tel"]?></td>
                <td title="Akcije">
                    <form role="form" method="get">
                    <a href="klijentIzmena.php?id=<?php echo $red["ID"]?>" title="Izmeni klijenta"><i class="fa fa-pencil" style="margin-right: 15px; margin-left:5px;"></i></a>
                    <a href="klijentiPretraga.php?id=<?php echo $red["ID"]?>" title="Obriši klijenta"><i class="fa fa-times"></i></a>
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

