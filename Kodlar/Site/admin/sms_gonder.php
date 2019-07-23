﻿<html>

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
                        <a href="uyeler.php"><i class="fa fa-fw fa-table"></i> Üyeler</a>
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
                                <a href="uye_ekle.php">Üye Ekle</a>
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
                            Kan Ara 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Kan Ara 
							
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<?php
include("baglan.php");
$sayac=0;
$kan=$_POST["kan"];
$mesafe=$_POST["km"];
$sorgu1=mysql_query("SELECT en,boy FROM hastane");
while($sonuc1=mysql_fetch_array($sorgu1)){
$hen=$sonuc1['en'];
$hboy=$sonuc1['boy'];
}
 $sorgu=mysql_query("SELECT ku.adsoy as ad,ko.en as en,ko.boy as boy,ku.tel as tel FROM kullanici ku,konum ko WHERE ku.email=ko.email AND ku.kan='$kan'");
 while ($sonuc = mysql_fetch_array($sorgu)){	
		$ad = $sonuc['ad'];
        $en = $sonuc['en'];
        $boy = $sonuc['boy'];    
		$tel = $sonuc['tel'];  		

		$get_pickup_coords = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$en,$boy&destinations=$hen,$hboy";
		$pickup_data = file_get_contents($get_pickup_coords);
		$pickup_result = json_decode($pickup_data, true);   
		$sure= $pickup_result['rows'][0]['elements'][0]['duration']['text'];
		$km = $pickup_result['rows'][0]['elements'][0]['distance']['text'];

		$km1=$km*1.609344;
		$km2=round($km1);
		if($km2<$mesafe){
			$sayac=$sayac+1;
			// Textlocal account details
			$username = urlencode('acilkan@outlook.com');
			$sender = urlencode("Acil Kan");
			$hash = urlencode('f260362518aea0d8cc127e2e7fe8ce24470df30b90ecf71ccf7a641c998122d2');
	
			// Message details
			$numbers = $tel;
			$message = rawurlencode("Sayin '.$ad.' acil '.$kan.'  kana ihtiyac vardir.Karabük Eğitim ve Araştırma Hastahanesi");
 
			// Prepare data for POST request     
			$data = http_build_query(array('username' => $username, 'hash' => $hash, 'numbers' =>$numbers, "sender" => $sender, "message" => $message));

	$opts = array('http' =>
    array(
        'method'  => 'POST',
		'header'  => 'Content-type: application/x-www-form-urlencoded;  charset=utf-8',
        'content' => $data
    )
);

$context = stream_context_create($opts);

$result = file_get_contents('http://api.txtlocal.com/send/', false, $context);
var_dump($result);
							}
	}

	echo $sayac."tane kişiye sms gönderildi";
echo $numbers;
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