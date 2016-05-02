<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel | <?php echo SITE_NAME;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo SITE_URL;?>/admin/lib/layout/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Core CSS -->
    <link href="<?php echo SITE_URL;?>/admin/lib/layout/css/styles.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="<?php echo SITE_URL;?>/admin/lib/layout/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Morris -->
    <link href="<?php echo SITE_URL;?>/admin/lib/layout/vendors/morris/morris.css" rel="stylesheet">
    
    <!-- phpVMS RSS -->
    <link rel="alternate" href="<?php echo SITE_URL?>/lib/rss/latestpireps.rss" title="latest pilot reports" type="application/rss+xml" />
    
    <link rel="alternate" href="<?php echo SITE_URL?>/lib/rss/latestpilots.rss" title="latest pilot registrations" type="application/rss+xml" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    <?php
    Template::Show('core_htmlhead.php');
    ?>
  </head>
    
    <body>
    <?php
    Template::Show('core_htmlreq.php');
    ?>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo SITE_URL;?>/admin"><?php echo SITE_NAME;?> Admin Panel</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right" style="padding-right: 15px;">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo Auth::$userinfo->firstname.' '.Auth::$userinfo->lastname; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo SITE_URL;?>/index.php/profile">Profile</a></li>
                    <li><a href="<?php echo SITE_URL;?>/index.php/login/logout">Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

<br><br>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2" style="min-width: 270px;">
          	<div class="sidebar content-box" style="margin-bottom: 1px;">
                <?php
                Template::Show('core_sidebar.php');
                ?>
            </div>
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
					<?php
                    Template::Show('core_navigation.php');
                    ?>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10" style="max-width: 1000px;">
		  	<div class="row">
		  			<div class="content-box-large">
                      <div id="mainContent">
                        <div id="results"></div>
                        <div id="bodytext">
		</div>
    </div>
    
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo SITE_URL;?>/admin/lib/layout/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo SITE_URL;?>/admin/lib/layout/js/custom.js"></script>