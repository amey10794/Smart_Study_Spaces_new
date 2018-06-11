<?php

session_start();
date_default_timezone_set("America/New_York");
//echo date_default_timezone_get();
//unset($_SESSION["seqNumber4"]);
//unset($_SESSION["seqNumber5"]);
////////////////////for iot 4
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://backend.sigfox.com/api/devices/1C9FBA/messages");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n\"prefix\" : \"test-device-\",\n  \"ids\" : [\n    { \"id\" : \"C031\", \"pk\": \"16b3cc86699ab4d3091a05ee\" }\n  ]\n}");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, "59f2697f5005746507d6fc39" . ":" . "40f44fbee459c888063c30e3ad3fbdea");
$headers = array();
$headers[] = "Content-Type: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result4 = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
$result4=json_decode($result4);

$newresult4=$result4->{"data"};
//For Iot 5
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://backend.sigfox.com/api/devices/1C9FBE/messages");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n\"prefix\" : \"test-device-\",\n  \"ids\" : [\n    { \"id\" : \"C031\", \"pk\": \"16b3cc86699ab4d3091a05ee\" }\n  ]\n}");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, "59f2697f5005746507d6fc39" . ":" . "40f44fbee459c888063c30e3ad3fbdea");
$headers = array();
$headers[] = "Content-Type: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result5 = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
$result5=json_decode($result5);

$newresult5=$result5->{"data"};

//print_r($newresult);
//$_SESSION['seqNumber']=$newresult[0]->{"seqNumber"};
//print_r($newresult);
//print_r($newresult);
//print_r($newresult[0]->{"data"});

//require('index.html');
$servername="localhost";
$username="root";
$passworddb="";

$connection=new mysqli($servername,$username,$passworddb,'smartStudyDB');
//Making connection
if($connection->connect_error){
    
    die("Connection failed:". $connection->connect_error);
}else{
//    echo "Connection Succesful";
}

//datatable4- Creation of datatable4 which stores data coming from iot4
$que="CREATE TABLE IF NOT EXISTS Datatable4(
uid int UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
data INT,
time VARCHAR(50)

)";
//echo "<br/>";
if($connection->query($que)===TRUE){
//    echo "Userstable created succesfully";
}else{
    echo $connection->error."this is table creation error";
}
//datatable5- Creation of datatable5 which stores data coming from iot5
$que="CREATE TABLE IF NOT EXISTS Datatable5(
uid int UNSIGNED AUTO_INCREMENT PRIMARY KEY UNIQUE,
data INT,
time VARCHAR(50)

)";
//echo "<br/>";
if($connection->query($que)===TRUE){
//    echo "Userstable created succesfully";
}else{
    echo $connection->error."this is table creation error";
}





?>


<html>
    <header>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="iot5">

    <title>Smart Study Spaces</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

        <style>
            h3{
                background-color: deepskyblue;
            }
            p{
                background-color: lightblue;
            }
            .data{
                background-color: limegreen;
            }
            .nodata{
                background-color: red;
            }
            .green{
                background-color: green;
            }
            .red{
                background-color: red;
            }
            #chairs {
                border: 1px solid;
                padding: 10px;
                box-shadow: 5px 10px #888888;

            }
            .shadow {
                -moz-box-shadow:    inset 0 0 10px #000000;
                -webkit-box-shadow: inset 0 0 10px #000000;
                box-shadow:         inset 0 0 10px #000000;
            }
        </style>
    </header>
    <body style="background-color: #e5e8e8;">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Smart Study Spaces</a>

    </div>
</nav>

<!-- Header -->
<header class="masthead">
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Welcome To Smart Study Spaces <?php echo $_SESSION['firstname']  ?></div>
            <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
            <a href="#chairs"> <button class=" btn btn-success">Experience It!</button></a>
        </div>
    </div>
</header>
        <br/>
        <br/>
        <div class="container">
            <h2><center>Looking for a seat?</center></h2>
<div style=" height: 450px;background-color: #85c1e9" id="chairs"  class="row" >
<!--    <div class="row">-->
    <div style="background-color: #f7dc6f; height: 10%; width: 100%" class="shadow" ></div>

<div class="mx-auto my-auto">
    <h4  ><center><span class="badge badge-success free4" >Free</span></center></h4>
            <center><img src="img/greenarmchair.png" id="iot4"  class="img-responsive " style="border: 1px solid black"></center>
    <br/>
            <h4 ><span class="badge badge-info" >Study Space 1</span></h4>
</div>


<div class="mx-auto my-auto">
    <h4 ><center><span class="badge badge-success free5" >Free</span></center></h4>
    <center><img src="img/greenarmchair.png" id="iot5"  class="img-responsive " style="border: 1px solid black"></center>
    <br/>
    <h4><span class="badge badge-info">Study Space 2</span></h4>
</div>
    <div style="background-color: #f7dc6f; height: 10%; width: 100%" class="shadow"></div>
<!--    </div>-->
</div>
        </div>



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Custom scripts for this template -->
<script src="js/agency.min.js"></script>
<!--    <script>-->
<!--<!-- GRID CREATION -->-->
<!--for (i = 0; i < 7; i++)-->
<!--{-->
<!--for(j = 0;j < 7;j++)-->
<!--{-->
<!--<!-- create id's for each div in the grid -->-->
<!--var a = String(i)+"a"+String(j);-->
<!--<!-- creating divs -->-->
<!--$('#grid').append('<div id ='+a+' class = "cell"><img src="img/armchair.png" style="max-width: 80%; height: auto;" ></div>');-->
<!--}-->
<!--}-->
<!--var data=[];-->
<!--</script>-->

        <?php
        //data entry and session creation for iot4
    $latestdata4=$newresult4[0]->{"data"};
    $latesttime4=date("G:i:s", $newresult4[0]->{"time"});
//        echo "<h1>Data Received from IOT 5</h1>";
        $que = "INSERT INTO Datatable4 (data,time)
VALUES ('$latestdata4','$latesttime4')";
        if($latestdata4==1){
        echo "<script> $('#iot4').attr('src','img/redarmchair.png')</script>";
            echo "<script> $('.free4').addClass('badge-danger')</script>";
            echo "<script> $('.free4').removeClass('badge-success')</script>";
            echo "<script> $('.free4').text('Occupied')</script>";
        }


//echo "<br/>";
if($_SESSION['seqNumber4']<$newresult4[0]->{"seqNumber"}) {
    if ($connection->query($que) === TRUE) {
        echo "Inserted data succesfully";

    } else {
        echo $connection->error;
    }
}
echo "<script>
console.log(".$_SESSION['seqNumber4'].")

</script>";
$_SESSION['seqNumber4']=$newresult4[0]->{"seqNumber"};
        echo "<script>
console.log(" . $_SESSION['seqNumber4'] . ")

</script>";
        ///////// data entry and session creation for iot5
        $latestdata5=$newresult5[0]->{"data"};
        $latesttime5=date("G:i:s", $newresult5[0]->{"time"});
        //        echo "<h1>Data Received from IOT 5</h1>";
        $que = "INSERT INTO Datatable5 (data,time)
VALUES ('$latestdata5','$latesttime5')";
        if($latestdata5==1){
            echo "<script> $('#iot5').attr('src','img/redarmchair.png')</script>";
            echo "<script> $('.free5').addClass('badge-danger')</script>";
            echo "<script> $('.free5').removeClass('badge-success')</script>";
            echo "<script> $('.free5').text('Occupied')</script>";
        }


        echo "<br/>";
        if($_SESSION['seqNumber5']<$newresult5[0]->{"seqNumber"}) {
            if ($connection->query($que) === TRUE) {
                echo "Inserted data succesfully";

            } else {
                echo $connection->error;
            }
        }
        echo "<script>
console.log(".$_SESSION['seqNumber5'].");

</script>";
        $_SESSION['seqNumber5']=$newresult5[0]->{"seqNumber"};
        echo "<script>
console.log(".$_SESSION['seqNumber5'].") 

</script>";

//                for($i=0;$i<49;$i++) {
//
//                    echo "<h3>" . date("D, d F Y; G:i:s A;e;I", $newresult[$i]->{"time"}) . "</h3>";
//                    echo "<p> Data Received-" . $newresult[$i]->{"data"} . "</p>";
//                    echo "<p> Sequence Number-" . $newresult[$i]->{"seqNumber"} . "</p>";
//                    echo "<br>";
//                }
//            $data=$newresult[$i]->{"data"}
//        echo "<script>data.push(".$newresult[$i]->{'data'}.");</script>"    ;
//        }
//        echo "<script>console.log(data)</script>";
//        echo "<script>
//        for (i = 0; i < 7; i++)
//            {
//            for(j=0;j<7;j++){
//            var ab ='#'+ String(i)+'a'+String(j);
//            console.log(ab);
////            console.log(data);
//            $(ab).addClass('data');
//            if(data[j+i]==01){
////            console.log('inside the data loop')
////            console.log($(ab).attr('class'));
////            console.log(data);
//            $(ab).addClass('nodata')
//            $(ab).removeClass('data');
//
//            }
//            $(ab).text(data[j+i]);
//
//            }
//            }
//
//        </script>";

        $que = "SELECT * FROM Datatable4";

        echo "<br/>";

        $result=$connection->query($que);
//        print_r($result);
        $jsonArray4 = array();

        //check if there is any data returned by the SQL Query

        if ($result->num_rows > 0) {
            //Converting the results into an associative array
            while($row = $result->fetch_assoc()) {
                $jsonArrayItem4 = array();
                $jsonArrayItem4['uid'] = $row['uid'];
                $jsonArrayItem4['data'] = $row['data'];
                $jsonArrayItem4['time'] = $row['time'];
                //append the above created object into the main array.
                array_push($jsonArray4, $jsonArrayItem4);
            }
        }
        $jsonArray4=json_encode($jsonArray4);
        $jsonArray4=json_decode($jsonArray4);
//        print_r($jsonArray4);
        $size4=sizeof($jsonArray4);
//        echo $jsonArray4[$size4-2]->{'data'};






//unset($_SESSION['fivecount4']);

        if($latestdata4==0 ){

            if(isset($_SESSION['fivecount4'])){
//                echo "it is set";

            }
            else{
                $_SESSION['fivecount4']=0;
            }
            echo "<script>console.log(1234)</script>";
            echo "<script>console.log(".$_SESSION['fivecount4'].")</script>";
            echo "<script>console.log(1234)</script>";
            if($_SESSION['fivecount4']>0 && $_SESSION['fivecount4']<3){
                echo "inside the 1st if loop";
                $_SESSION['fivecount4']=$_SESSION['fivecount4']+1;
                echo "<script>console.log(12)</script>";
                echo "<script>console.log(".$_SESSION['fivecount4'].")</script>";
                echo "<script>console.log(12)</script>";

            }
            if($_SESSION['fivecount4']==3){
                echo "inside the 2nd if";
                echo "<script> $('#iot4').attr('src','img/greenarmchair.png')</script>";
                echo "<script> $('.free4').addClass('badge-success')</script>";
                echo "<script> $('.free4').removeClass('badge-danger')</script>";
                echo "<script> $('.free4').text('Free')</script>";
                $_SESSION['fivecount4']=0;
            }
            if($jsonArray4[$size4-2]->{'data'}==1){
                echo "inside 1st for loop";


                $_SESSION['fivecount4']=$_SESSION['fivecount4']+1;
                echo "<script>console.log(789)</script>";
                echo "<script>console.log(".$_SESSION['fivecount4'].")</script>";
                echo "<script>console.log(789)</script>";

            }


        }
/////////////////////////
        /////////////////////////
        /////////////////////////
        $que = "SELECT * FROM Datatable5";

        echo "<br/>";

        $result=$connection->query($que);
        //        print_r($result);
        $jsonArray5 = array();

        //check if there is any data returned by the SQL Query

        if ($result->num_rows > 0) {
            //Converting the results into an associative array
            while($row = $result->fetch_assoc()) {
                $jsonArrayItem5 = array();
                $jsonArrayItem5['uid'] = $row['uid'];
                $jsonArrayItem5['data'] = $row['data'];
                $jsonArrayItem5['time'] = $row['time'];
                //append the above created object into the main array.
                array_push($jsonArray5, $jsonArrayItem5);
            }
        }
        $jsonArray5=json_encode($jsonArray5);
        $jsonArray5=json_decode($jsonArray5);
        //        print_r($jsonArray4);
        $size5=sizeof($jsonArray5);
        //        echo $jsonArray4[$size4-2]->{'data'};






        //unset($_SESSION['fivecount5']);

        if($latestdata5==0 ){

            if(isset($_SESSION['fivecount5'])){
                echo "it is set";

            }
            else{
                $_SESSION['fivecount5']=0;
            }
            echo "<script>console.log(1234)</script>";
            echo "<script>console.log(".$_SESSION['fivecount5'].")</script>";
            echo "<script>console.log(1234)</script>";
            if($_SESSION['fivecount5']>0 && $_SESSION['fivecount5']<3){
                echo "inside the 1st if loop";
                $_SESSION['fivecount4']=$_SESSION['fivecount4']+1;
                echo "<script>console.log(12)</script>";
                echo "<script>console.log(".$_SESSION['fivecount4'].")</script>";
                echo "<script>console.log(12)</script>";

            }
            if($_SESSION['fivecount5']==3){
                echo "inside the 2nd if";
                echo "<script> $('#iot5').attr('src','img/greenarmchair.png')</script>";
                echo "<script> $('.free5').addClass('badge-success')</script>";
                echo "<script> $('.free5').removeClass('badge-danger')</script>";
                echo "<script> $('.free5').text('Free')</script>";
                $_SESSION['fivecount5']=0;
            }
            if($jsonArray4[$size5-2]->{'data'}==1){
                echo "inside 1st for loop";


                $_SESSION['fivecount5']=$_SESSION['fivecount5']+1;
                echo "<script>console.log(789)</script>";
                echo "<script>console.log(".$_SESSION['fivecount5'].")</script>";
                echo "<script>console.log(789)</script>";

            }


        }








        echo "<script>function reloading(){location.reload(true)}</script>";
        echo "<script>setTimeout(reloading,30000);</script>"

//        

//        }
        
        ?>



    </body>
</html>