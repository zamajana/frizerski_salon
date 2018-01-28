<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nova statistika</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

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
                        <?php include("userLogout.php"); ?>
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
                        <li>
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
                         <li class="treeview active">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Statistika</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="statistikaPretraga.php"><i class="fa fa-angle-double-right"></i> Pregled</a></li>
                                <li class="active"><a href="statistikaNova.php"><i class="fa fa-angle-double-right"></i> Nova statistika</a></li>
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
                        Statistika
                    </h1>
                    <ol class="breadcrumb">
                        <li ><a href="home.php"><i class="fa fa-home"></i> Početna</a></li>
                        <li ><a href="#"><i></i> Statistika</a></li>
                        <li ><a href="statistikaNova.php"><i></i> Nova statistika</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="col-xs-12">
                        <?php

                            if(isset($_POST["opisStat"]) && isset($_POST["datumOd"]) && isset($_POST["datumDo"]) && isset($_POST["ukupnoIznos"])){
                                $opis = trim($_POST["opisStat"]);
                                $datumOd = strtotime($_POST["datumOd"]);
                                $datumDo = strtotime($_POST["datumDo"]);
                                $ukupno = $_POST["ukupnoIznos"];
                                $upit = "INSERT INTO statistika(ID, opis, datumOd, datumDo, ukupno) VALUES ('', '".$opis."','".$datumOd."','".$datumDo."','".$ukupno."')";
                                if (!mysqli_query($baza, $upit)) {
                                    echo "<p>Dogodila se greška prilikom upisa statistike u bazu.</p>";
                                    die();
                                    } else {
                                        $upit = "SELECT ID FROM statistika WHERE (opis='".$opis."' AND datumOd=".$datumOd." AND datumDo=".$datumDo." AND ukupno='".$ukupno."')";
                                        if ($u=mysqli_query($baza, $upit)){
                                            if(sizeof($u)!=1){
                                                echo "<p>Baza je vratila vise od jedne statistike za zadati uslov.</p>";
                                                die(); 
                                            }else{
                                                $red=mysqli_fetch_array($u);
                                                $idStat = $red['ID'];

                                                $upitFrizeri="SELECT ID FROM frizer WHERE status = true";
                                                if ($u=mysqli_query($baza, $upitFrizeri)) {
                                                    while ($red=mysqli_fetch_array($u))
                                                    {
                                                        $frizerId=$red['ID'];
                                                        $iznosInput="frizer".$frizerId;
                                                        $iznosFrizera=0;
                                                        if(isset($_POST[$iznosInput])){
                                                            $iznosFrizera=$_POST[$iznosInput];
                                                        }

                                                        $upitStatistika="INSERT INTO statistikafrizer (ID, statistikaID, frizerID, iznos) VALUES ('',".$idStat.",".$frizerId.",'".$iznosFrizera."')";
                                                        if (!mysqli_query($baza, $upitStatistika)) {
                                                             echo "<p>Dogodila se greška prilikom upisa statistike za frizera u bazu.</p>";
                                                             die();
                                                        }
                                                    }
                                                    echo "<p>Uspešno ste sačuvali novu statistiku.</p>";
                                                } else {
                                                    echo "<p>Dogodila se greška prilikom citanja frizera.</p>";
                                                    die();
                                                }

                                            }
                                        }else{
                                           echo "<p>Dogodila se greška prilikom čitanja statistke iz baze.</p>";
                                           die(); 
                                        }
                                    }
                            }
                            
                        ?>

                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Nova statistika</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="post" action="statistikaNova.php">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="opisInput">Opis</label>
                                            <input name="opisStat" class="form-control" id="opisInput" placeholder="Unesite opis">
                                        </div>
                                        <div class="form-group">
                                            <label>Datum od</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input id="datumOdInput" name="datumOd" type="text" class="form-control" data-inputmask="'alias': 'dd.mm.yyyy'" data-mask/>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                        <div class="form-group">
                                            <label>Datum do</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input id="datumDoInput" name="datumDo" type="text" class="form-control" 
                                                data-inputmask="'alias': 'dd.mm.yyyy'" data-mask
                                                onblur="novaStatistika(datumOdInput.value, datumDoInput.value)"/>
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                        
                                    </div><!-- /.box-body -->

                                    <div id="statistikaRezultat" class="box-footer">
                                        
                                    </div>
                                </form>
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
        <!-- page script -->
         <script src="../ajax/statistika.js" type="text/javascript"></script> 
        <!-- InputMask -->
        <script src="../js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd.mm.yyyy", {"placeholder": "dd.mm.yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();
                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});

            });
        </script>
    </body>
</html>
