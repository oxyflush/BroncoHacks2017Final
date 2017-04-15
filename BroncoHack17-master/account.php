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

    <title>Funding Future</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 
    <!-- general CSS for nav -->
    <link href="css/default_layout.css" rel="stylesheet">
        
    <link href="css/account.css" rel="stylesheet">
        
    <link href="https://fonts.googleapis.com/css?family=News+Cycle" rel="stylesheet" type="text/css">
        
    <link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet" type="text/css">
            
    <link href="img/logo_small.png" type="image/gif" rel="shortcut icon" />
    
    <script src="js/account.js"></script>


</head>

<body onload="openTab(event, 'campaign')">

   <!-- Navigation -->
     <nav id="navcontainer" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div id="nav">
                <a href="index.php"><img id="logo" src="img/logo_text2.png" alt="FundFuture"></a>
                <a class="navbar-brand special" href="index.php">Explore</a>
                <!-- reverse order for float right -->
                <a class="navbar-brand f_right special" href="start.html"> Start a Campaign </a>
                <a class="navbar-brand f_right" href="#"> Sign In </a>
                <a class="navbar-brand f_right" href="index.php#link"> About Us </a>
            </div>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="col-sm-3 col-md-2 sidebar card">
            <img class="avatar" src="img/avatar.png">
            <br><br><br>
            <center><h2> <b> John Ryan</b></h2> </center>
            <hr>
            <h3> <b>Summary</b></h3>
            <p> Total Donation</p>
            <p class="money card"> $100 </p>
            <p> Donation From Your Social Network Impact</p>
            <p class="money card"> $300 </p>
        </div>
        
        <div class="tab" style="padding-bottom: 10px">
            <button class="tablinks" onclick="openTab(event, 'campaign')"> Campaign </button>
            <button class="tablinks" onclick="openTab(event, 'donation')"> Donation </button>
        </div>
        <br>
    <div id="campaign" class="tabcontent">
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
        <div class="single_campaign card">
            <div class="sub_campaign">
                <div>
                <h3 class="campaign_name"> <?php echo $name; ?> </h3>
                </div>
                <button> Post </button>
                <button> Edit </button>
                <br>
            </div>
                <div class="campaign_progress">
                <p class="campaign_ratio"> <?php echo $fund; ?> / <?php echo $goal; ?></p>
                <p class="campaign_support"> <?php echo $support; ?> people supported </p>
                <p class="campaign_percent"> <?php echo $complete; ?>% done</p>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $complete; ?>%">
                        <span class="sr-only">50% Complete</span>
                    </div>
                </div>
            </div>
        </div>
            <br><br>
        
        <?php } ?>
        
        </div>
        
        <div id="donation" class="tabcontent">
            <div class="single_donation card">
            <div class="sub_donation">
                <div>
                    <h3 class="donation_name"> Library Reconstruction </h3>
                </div>
                <p class="donation_dollar"> $10 Supported</p>
                <br>
            </div>
            <div class="donation_progress">
                <p class="donation_ratio"> 12000/24000 </p>
                <p class="donation_support">2014 people supported </p>
                <p class="donation_percent"> 50% done</p>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                        <span class="sr-only">50% Complete</span>
                    </div>
                </div>
                <p class="donation_people">50 people donated $1000 because of you share</p>
            </div>
            </div>
        </div>

        
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
