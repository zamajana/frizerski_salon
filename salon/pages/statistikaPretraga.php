<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pregled statistike</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
         <!-- daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" /> 
        <!-- Bootstrap Color Picker -->
        <link href="../css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <!-- Bootstrap time Picker -->
        <link href="../css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
   
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
       
    </script>
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
                        <?php include("userLogout.php"); 

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
                                <li class="active"><a href="statistikaPretraga.php"><i class="fa fa-angle-double-right"></i> Pregled</a></li>
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
                        Pregled statistike
                    </h1>
                    <ol class="breadcrumb">
                        <li ><a href="home.php"><i class="fa fa-home"></i> Početna</a></li>
                        <li ><a href="#"><i></i> Statistika</a></li>
                        <li ><a href="statistikaPretraga.php"><i></i> Pregled</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="col-xs-12">


                        <form role="form" method="post" action="statistikaPretraga.php">
                            <div class="row">
                            
                                <div class="col-md-6">
                                    <div class="box box-danger">
                                        <div class="box-header">
                                        <h3 class="box-title">Pretraga</hr>

                                            <?php
                                                $upit="SELECT ID, opis FROM statistika order by datumOd desc";
                                                if (!$u=mysqli_query($baza, $upit)) {
                                                    echo "Nastala je greška pri pravljenju upita.</div>";
                                                    die();
                                                } if (mysqli_num_rows($u)==0){
                                                    echo "Nema podataka.</div>";
                                                }
                                                else {
                                            ?>

                                            <div class="box-body">
                                                <div class="form-group">
                                                    <input name="param" class="form-control" id="paramInput" placeholder="Pretraži po opisu"
                                                    onkeyup="nadjiStatistiku(paramInput.value)">
                                                </div>
                                            </div>

                                        </div>
                                            <div class="box-body" id="statistikeTabela">
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

                                                </div>

                                                <?php
                                                }

                                                ?>

                        
                                        
                                    </div>
                                </div>
                            

                                <div class="col-md-6">
                                    <div class="box box-success">
                                        <div class="box-header">
                                        <h3 class="box-title">Pregled</hr></br>
                                        </div>
                                        <form role="form" id="statistikaPregled">
                                            <!-- <div class="box-body" id="statistikaPregled">
                                            </div>
                                         <div class="box-footer">
                                            </div> --> 
                                        </form>
                                    </div>
                                </div>

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
        <!-- InputMask -->
        <script src="../js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="../js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="../js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="../js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- page script -->
        <script src="../ajax/statistika.js" type="text/javascript"></script> 

        <script type="text/javascript">
 
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });


  
        </script>
    </body>
</html>
