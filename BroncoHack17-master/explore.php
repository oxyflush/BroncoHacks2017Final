<?php 
    session_start();
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "broncohack";
    $dbport = 3306;
    
    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 

    <link href="css/default_layout.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/explore.css" rel="stylesheet">
    
     <link href="https://fonts.googleapis.com/css?family=News+Cycle" rel="stylesheet" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet" type="text/css">

    <link href="img/logo_small.png" type="image/gif" rel="shortcut icon" />


    <!-- Custom Fonts -->
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>




    <!-- Navigation -->
     <nav id="navcontainer" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div id="nav">
                <a href="index.php"><img id="logo" src="img/logo_text2.png" alt="FundFuture"></a>
                <a class="navbar-brand special" href="index.php">Explore</a>
                <!-- reverse order for float right -->
                <a class="navbar-brand f_right special" href="#"> Start a Campaign </a>
                <a class="navbar-brand f_right" href="account.php"> Sign In </a>
                <a class="navbar-brand f_right" href="index.php#link"> About Us </a>
            </div>
        </div>
        <!-- /.container -->
    </nav>


    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
         <h1 class="mt-4 mb-3">Explore <!-- <small>Subheading</small> --></h1> 

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Explore</li>
        </ol>

        <div class="row">
            <?php 
             $select = "SELECT u.username, pt.support, pt.topic, pt.abstract, pt.content, ROUND(pt.fund / pt.goal * 100, 2) complete, pt.fund, pt.goal, pt.imgurl";
             $from   = "FROM project pt, user u, post p";
             $where  = "WHERE pt.pid = p.pid AND p.uid = u.uid";
             $others = "ORDER BY complete DESC";
             $sql = $select . ' ' . $from . ' ' . $where . ' ' . $others;
             $tables = $db -> query($sql);
             $rows = array();
    while($table=$tables->fetch_assoc()) {
        $name=$table['topic'];
        $schoolname=$table['username'];
        $abstract=$table['abstract'];
        $content=$table['content'];
        $complete=$table['complete'];
        $goal=$table['goal'];
        $fund=$table['fund'];
        $support=$table['support'];
        $imgurl=$table['imgurl'];

    
        ?>
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    
                    <a href="#"><img class="card-img-top img-fluid image-limit" src="<?php echo $imgurl; ?>" alt=""></a>
                    <p class = "bottomleft" style = "color:white;"> <?php echo $fund ?> <span style="font-size:20px; padding: 0 5px">of</span> <?php echo $goal ?></p>
                    <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $complete?>%">
                                <span class="sr-only">70% Complete</span>
                            </div>
                    </div>
                    <div class="card-block">
                        <h3 class="card-title"><a href="#"><?php echo $name?></a></h3>
                        <p class="card-text" style="font-size: 16px;"><?php echo $abstract; ?> </p>
                        <button type="button" class="btn btn-success donate_button">Donate</button>
                    </div>    
                </div>
            </div>
<?php } ?>
        </div>

        <!-- Pagination -->
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
     <footer>
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <p>Contact Us: contact@FundingFuture.org</p>
                        <p>Address: 500 El Camino Real, Santa Clara, CA</p>
                        <p>Copyright &copy; Bronco Hack 2017 FundingFuture</p>
                    </center>
                </div>
            </div>
        </footer>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>
<?php $db->close(); ?>
</html>