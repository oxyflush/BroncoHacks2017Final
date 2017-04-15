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
    
    /*
    $sql="SELECT * FROM profile ORDER BY pid";
    $posts= $db -> query($sql);
    $row = array();
    while ($post = $posts->fetch_assoc()) {
        $row[] = $post;
        //$text=$post["ftext"];
        //$name=$post["fname"]." ".$post["lname"];
    }
    */
    
    // query top 3 for index.php
    $select = "SELECT u.username, pt.abstract, pt.content, ROUND(pt.fund / pt.goal * 100, 2) complete, pt.goal, pt.imgurl";
    $from   = "FROM project pt, user u, post p";
    $where  = "WHERE pt.pid = p.pid AND p.uid = u.uid";
    $others = "ORDER BY complete DESC";
    $sql = $select . ' ' . $from . ' ' . $where . ' ' . $others;
    $tables = $db -> query($sql);
    $rows = array();
    while($table=$tables->fetch_assoc()) {
        echo $table['username']."<br>";
        echo $table['abstract']."<br>";
        echo $table['content']."<br>";
        echo $table['complete']."<br>";
        echo $table['goal']."<br>";
        echo $table['imgurl']."<br>";
        echo "-------------------<br>";
    }
    
    //$myJSON = json_encode($row);
    //$myJSON2 = json_encode($name);
    //echo $myJSON1;
    //echo $myJSON;
    //phpmyadmin-ctl install 
    $db->close();
?>