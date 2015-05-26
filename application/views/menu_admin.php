<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cilukba Inc.">
    <meta name="author" content="RomadhonFajar">

    <title>Cilukba Inc.</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="<?=base_url()?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!-- Add custom CSS here -->
    <link href="<?=base_url()?>css/landing-page.css" rel="stylesheet">

</head>

<body>

	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">CILUKBA INC.</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?=base_url()?>">Home</a>
                    </li>
                    <li class="dropdown"><a nohref class="dropdown-toggle" data-toggle="dropdown">Uang Masuk</a>
						<ul class="dropdown-menu">
							<li class="dropdown"><a nohref class="dropdown-toggle" data-toggle="dropdown">Penjualan Masuk</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url()?>penjualan_masuks/inputpenjualan_a">Input Data Penjualan</a></li>
                                    <li><a href="<?=base_url()?>penjualan_masuks/datapenjualan">View Data Penjualan</a></li>
                                </ul>
                            </li>
							<li class="dropdown"><a nohref class="dropdown-toggle" data-toggle="dropdown">Hutang</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url()?>keuangans/inputhutang">Input Data Hutang</a></li>
                                    <li><a href="<?=base_url()?>keuangans/datahutang">View Data hutang</a></li>
                                </ul>
                            </li>
						</ul>
                    </li>
                    <li class="dropdown"><a nohref class="dropdown-toggle" data-toggle="dropdown">Uang Keluar</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown"><a nohref class="dropdown-toggle" data-toggle="dropdown">Gaji Pegawai</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url()?>pembiayaan_gajis/inputgaji_a">Input Data Gaji Pegawai</a></li>
                                    <li><a href="<?=base_url()?>pembiayaan_gajis/datagaji">View Data Gaji Pegawai</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a nohref class="dropdown-toggle" data-toggle="dropdown">Pembiayaan Divisi</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url()?>pembiayaan_divisis/inputpembiayaan_a">Input Data Pembiayaan</a></li>
                                    <li><a href="<?=base_url()?>pembiayaan_divisis/datapembiayaan">View Data Pembiayaan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?=base_url()?>keuangans/logout">Log Out</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<div class="intro-header" style="min-height:100%;">
	
		<div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message" style="padding-top:5%; padding-bottom:5%;">
						