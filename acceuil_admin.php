<?php
session_start();
?>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-image: url('images/snow.jpg'); height:100px">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="acceuil_admin.php?lien=acceuil" style="color:black; font-size:35px;"><img src="images/logo.png" width="80" height="70"/></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index_admin.php?lien=produit" style="color:black; font-size:17px; margin-top:10px">Produits</a>
                    </li>
                    <li>
                        <a href="index_admin.php?lien=client" style="color:black; font-size:17px; margin-top:10px">Clients</a>
                    </li>
                    <li>
                        <a href="index_admin.php?lien=achat" style="color:black; font-size:17px; margin-top:10px">Achats</a>
                    </li>
                
                    <li>
                        <a href="#" style="color:black; font-size:17px; margin-top:10px"><?php echo $_SESSION['login'];?></a>
                    </li>
                    <li style="margin-left:550px">
                        <a href="logout.php" style="color:black; font-size:15px; margin-top:10px;">deconnexion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->

        
        <div class="container">

            

        <div class="row" style="margin-top:30px; text-align:center">
            <h3>Welcome Admin</h3>
            <div style="text-align:center">
                
                
            <br>
            <img src="images/logo.png" width="520" height="450"/>
                
                </div>
            
            
            
            
            
            
            
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
            
            
</body>
    

</html>



























