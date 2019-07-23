<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
            <!-- Top Menu Items -->
           
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                  
                    
                    <li>
                        <a href="uyeler.php"><i class="fa fa-fw fa-table"></i> Ãœyeler</a>
                    </li>
                    <li>
                        <a href="hastane.php"><i class="fa fa-fw fa-edit"></i> Hastane</a>
                    </li>
                    <li>
                        <a href="kan_ara.php"><i class="fa fa-fw fa-desktop"></i> Kan Ara</a>
                    </li>
					
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-file"></i> Ekle <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="hastane_ekle.php">Hastane Ekle</a>
                            </li>
                            <li>
                                <a href="uye_ekle.php">Ãœye Ekle</a>
							</li>
							
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hastane Ekle 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Hastane Ekle
							
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<?php
include("baglan.php");
if ($_POST){//Post ile formdan deðerler geldiyse
    $ad=$_POST["ad"];
	$x=$_POST["x"];
	$y=$_POST["y"];
    $kontrol=mysql_query("insert into hastane (ad,en,boy) values ('$ad','$x','$y')");
    if ($kontrol){//Sorgu baþarýlý bir þekilde çalýþtýrýldýysa
	    echo "KayÄ±t BaÅŸarÄ±lÄ±";
    }
    else{
	    echo "KayÄ±t EsnasÄ±nda Bir Sorun OluÅŸtu!";
    }
}else{//Sayfa ilk defa açýlýyorsa
?>
<table>
	<form name="form1" method="post" action="hastane_ekle.php">
		<tr><td>AdÄ±:</td><td><input type="text" name="ad"/></td></tr>
		<tr><td>Konum-X:</td><td><input type="text" name="x"/></td></tr>
		<tr><td>Konum-Y:</td><td><input type="text" name="y"/></td></tr>
		<tr><td><input type="submit" name="gonder" value="Kaydet"/></td></tr>
	</form>
	</table>
<?php
}
?>
                

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                      
                <!-- /.row -->

                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>