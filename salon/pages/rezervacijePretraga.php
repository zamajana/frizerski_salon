<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pretraga rezervacija</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
         <?php
                            include "konekcija.php";
                            session_start();
                            ?>
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="home.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Tajci & Boba
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        <!-- Notifications: style can be found in dropdown.less -->

                        <!-- Tasks: style can be found in dropdown.less -->

                        <!-- User Account: style can be found in dropdown.less -->
                        <?php
                        include "userLogout.php";
                        ?>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                    </div>
                    <!-- search form
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                     /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="home.php">
                                <i class="fa fa-home"></i> <span>Početna</span>
                            </a>
                        </li>
                        <li>
                            <a href="rezervacijaNova.php">
                                <i class="fa fa-book"></i> <span>Nova rezervacija</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="rezervacijePretraga.php">
                                <i class="fa fa-calendar"></i> <span>Pregled rezervacija</span>
                            </a>
                        </li>
                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Klijenti</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="klijentiPretraga.php"><i class="fa fa-angle-double-right"></i> Pretraga klijenata</a></li>
                                <li><a href="klijentNovi.php"><i class="fa fa-angle-double-right"></i> Novi klijent</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-magic"></i>
                                <span>Usluge</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="uslugePretraga.php"><i class="fa fa-angle-double-right"></i> Pretraga usluga</a></li>
                                <li><a href="uslugaNova.php"><i class="fa fa-angle-double-right"></i> Nova usluga</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Prodaja</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="artikliPretraga.php"><i class="fa fa-angle-double-right"></i> Pretraga artikala</a></li>
                                <li><a href="artikalNovi.php"><i class="fa fa-angle-double-right"></i> Novi artikal</a></li>
                            </ul>
                        </li>
                        <?php 
                         if(isset($_SESSION['login']) && $_SESSION['userID']==1){
                        ?>
                        <li>
                            <a href="frizeri.php">
                                <i class="fa fa-cut"></i> <span>Frizeri</span>
                            </a>
                        </li>
                         <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Statistika</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="statistikaPretraga.php"><i class="fa fa-angle-double-right"></i> Pregled</a></li>
                                <li><a href="statistikaNova.php"><i class="fa fa-angle-double-right"></i> Nova statistika</a></li>
                            </ul>
                        </li>
                        <?php }?>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Rezervacije
                        <small>Pretraga</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li ><a href="home.php"><i class="fa fa-home"></i> Početna</a></li>
                        <li ><a href="rezervacijePretraga.php"><i></i> Pretraga rezervacija</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="col-xs-12">
                        <?php

                        if (isset($_GET["id"])) {
                            $idRezervacije = $_GET["id"];
                            $upit = "DELETE FROM rezervacija WHERE ID = ".$idRezervacije;
                            if (mysqli_query($baza, $upit)) {
                                echo "<p> Uspešno ste obrisali rezervaciju.</p>";
                                echo "<br>";
                            } else {
                                echo "<p> Dogodila se greška prilikom brisanja rezervacije.</p>";
                            }
                        }

                        ?>
                    <div class="box">
                        <div class="box-header">
                            <?php

                            $upit="SELECT r.ID AS rezId, r.datum AS datumRez, r.vreme AS vremeRez, r.iznos AS iznos, f.ime AS imeFrizera, f.prezime AS prezFrizera, k.ime AS imeKlijenta, k.prezime AS prezKlijenta, k.tel AS telKlijenta FROM rezervacija r LEFT JOIN klijent k ON r.klijentID=k.ID LEFT JOIN frizer f ON r.frizerID=f.ID order by r.datum desc, r.vreme desc";
                            if (!$rez=mysqli_query($baza, $upit)) {
                                echo "Nastala je greška pri pravljenju upita.</div>";
                                die();
                            } if (mysqli_num_rows($rez)==0){
                                echo "Nema podataka.</div>";
                            }
                            else {
                            ?>
                            <div class="box-body">
                                <div class="form-group">
                                    <input name="param" class="form-control" id="paramInput" placeholder="Unesite parametar pretrage (ime, prezime ili tel klijenta, ime frizera)"
                                    onkeyup="pronadjiRezervaciju(paramInput.value)">
                                </div>

                            </div>
                        </div>
                        <div id="rezervacijeRezultat" class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                <!--    <th>Izbor</th> -->
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
                                    $iznos=$red['iznos'];
                                    $usluge = null;
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
                        </div>
                    </div>
                </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- page script -->
        <script src="../ajax/rezervacijePretraga.js" type="text/javascript"></script> 
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
    </body>
</html>
