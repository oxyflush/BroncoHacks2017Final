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

    <link href="css/index.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=News+Cycle" rel="stylesheet" type="text/css">

        <link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet" type="text/css">

    <link href="img/logo_small.png" type="image/gif" rel="shortcut icon" />


</head>

<body>

    <!-- Navigation -->
    <nav id="navcontainer" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div id="nav">
                <a href="index.php"><img id="logo" src="img/logo_text2.png" alt="FundFuture"></a>
                <a class="navbar-brand special" href="explore.php">Explore</a>
                <!-- reverse order for float right -->
                <a class="navbar-brand f_right special" href="start.html"> Start a Campaign </a>
                <a class="navbar-brand f_right" href="account.php"> Sign In </a>
                <a class="navbar-brand f_right" href="#link"> About Us </a>
            </div>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">


<div id="top">
    <h1> DUTCH SCHOOL OF SOUTHERN CALIFORNIA </h1>
    <div id="featured">
        <img src="img/s1.jpg" alt="school1">
    </div>
    <div id="featured_des">
        <div class="card h-100">
            <h2 id="featured_money">$650 <span style="font-size:20px; padding: 0 5px">of</span> $2000</h2>
            <p id="featured_complete"> 32.5% Complete</p>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:32.5%">
                    <span class="sr-only">32.5% Complete</span>
                </div>
            </div>
            <div class="card-block">
                <h3 class="card-title"><a href="#">Dutch School of Southern California</a></h3>
                <p class="card-text">The Dutch School of Southern California is the only school that provides Dutch language and culture education in Southern California. Our school is also an important place where children with (partly) Dutch or Belgian background meet. The school is close to our heart.</p>
                <center><button type="button" class="btn btn-success">Donate</button></center>
            </div>
        </div>
    </div>
</div>

<div id="top_three">
    <div class="title"><center><h2> Explore </h2> </center></div>
     <?php 
             $select = "SELECT u.username, pt.support, pt.topic, pt.abstract, pt.content, ROUND(pt.fund / pt.goal * 100, 2) complete, pt.fund, pt.goal, pt.imgurl";
             $from   = "FROM project pt, user u, post p";
             $where  = "WHERE pt.pid = p.pid AND p.uid = u.uid";
             $others = "ORDER BY complete DESC";
             $sql = $select . ' ' . $from . ' ' . $where . ' ' . $others;
             $tables = $db -> query($sql);
             $rows = array();
             $count=0;
 
    while($count<3){
        $table=$tables->fetch_assoc();
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
    <br>
<div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="card h-100">
        <a href="#"><img class="feature_img" src="<?php echo $imgurl; ?>" alt=""></a>
        <p class = "bottomleft">$<?php echo $goal; ?></p>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $complete;?>%">
                <span class="sr-only"><?php echo $complete;?>% Complete</span>
            </div>
        </div>
        <div class="card-block">
            <h3 class="card-title"><a href="#"><?php echo $name; ?></a></h3>
            <p class="card-text"><?php echo $abstract; ?></p>
            <center><button type="button" class="btn btn-success">Donate</button></center>
        </div>
    </div>
</div>
<?php $count++;
}?>

</div>

<center><a href="explore.html"><button type="button" class="btn btn-success" id="see_more">See More</button></a></center>

<br><hr class="no-margin"></br>

<div class="data" id="link">
  <img class="background-img" src="img/Artboard.png">
  <!-- <div class="data-left">
    <center><h1>1,000,000 Sponsors</h1></center>
  </div>
  <div class="data-right">
    <center><h1>1000 funding in 18 months</h1></center>
  <br>    <center><h1>$30,000,000 donated</h1></center>
  </br> -->
  </div>

  <br><hr class="no-margin"></br>

<div id="why_us">
    <div class="why">
        <img class="land-pic left-pic" src="img/boy.png">
        <div class="right-pic text-area">
          <h1> Reliable</h1>
          <br><h3> We review and verify every school to make sure your donation is received by a valid fund raiser.
  Donate Now        </h3></br>
  <br><button class="btn btn-success">Donate Now</button></br>

        </div>
    </div>
<hr class="no-margin">
    <div class="why">
      <img class="land-pic right-pic"src="img/girls.png">
      <div class="left-pic text-area">
        <h1> Trackable</h1>
        <br><h3> Updates on the use of your donation will be provided in real-time.
</h3></br>
<br><button class="btn btn-success">Sign in Now</button></br>
      </div>
    </div>
<hr class="no-margin">
    <div class="why">
      <img class="land-pic left-pic" src="img/kids.png">
      <div class="right-pic text-area">
        <h1> Impactful</h1>
        <br><h3> Make a even bigger impact by encouraging your friends and families to make a donation.
 </h3></br>
 <br><button class="btn btn-success">Share Now</button></br>

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
