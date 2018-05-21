<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>CRUD</title>
	
    <link rel="stylesheet" href="<?php echo href('assets/components/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo href('assets/components/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo href('assets/components/Ionicons/css/ionicons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo href('assets/components/morris.js/morris.css') ?>">

    <link rel="stylesheet" href="<?php echo href('assets/components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo href('assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo href('assets/components/select2/dist/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo href('assets/dist/css/AdminLTE.min.css') ?>">
    <link rel="stylesheet" href="<?php echo href('assets/dist/css/skins/_all-skins.min.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?php echo href('assets/css/custom.css') ?>"/>

    <script src="<?php echo href('assets/components/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?php echo href('assets/js/jquery.form.min.js'); ?>"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <a href="<?php echo href(); ?>" class="logo">
            <span class="logo-mini"><b>T</b>este</span>
            <span class="logo-lg"><b>T</b>este</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#"><span>Estado</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo href('estados/estados') ?>"><i class="fa fa-circle-o"></i> <span>Lista de Estados</span></a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <span>Cidades</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo href('cidades/cidades') ?>"><i class="fa fa-circle-o"></i> <span>Lista de cidades</span></a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><span>Endereços</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo href('enderecos/enderecos') ?>"><i class="fa fa-circle-o"></i> <span>Lista de endereços</span></a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>