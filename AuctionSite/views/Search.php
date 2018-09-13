<?php

$descriptionarray = $description;
$titlearray = $title;
$startingpricearray = $startingprice;
$auctionidarray = $auctionid;
$imgextarray = $imgext;
$durationarray = $duration;
$timestamparray = $timestamp;
$menuNav = $data['menuNav'];
 $menuNavTwo = $data['menuNavTwo'];
$highestbidarr = $highestbid;









?>
<html lang="en">
<head>
  <title>Auction Site</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
      background-color: orange;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    
    }
    
 
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Auction Store</h1>      
   
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php foreach($menuNav as $menuItem){echo "<li>$menuItem</li>";}?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php foreach($menuNavTwo as $menuItemone){echo "<li>$menuItemone</li>";}?>
      </ul>
    </div>
  </div>
</nav>
    
      <div class="container-fluid text-center">
  
  <form class="form-inline" method="post" action="index.php?pageID=Search">Search for auction:
    <input type="text" class="form-control" name="search" role="form" size="50" placeholder="Search">
    <button type="submit" class="btn btn-danger" name="submit">Search</button>
  </form>
  <p><br></p>
  <p><br></p>
</div>

<div class="container">    
 
    <div class="row">
          <?php   
          if (sizeof($auctionidarray) >0)
          {
    for($i = 1; $i <= sizeof($auctionidarray); $i++)
               {  
                   date_default_timezone_set('Europe/London');
                  $date2 = new DateTime($timestamparray[$i-1]);
                  
                  $date3 = $date2;
                  $durationhhmmss1 = explode(":",$durationarray[$i-1]);
                $date3->add(new DateInterval("PT$durationhhmmss1[0]H$durationhhmmss1[1]M")); 
              
               
$date1 = new DateTime(date('Y-m-d H:i:s'));




    
   
    $durationyymmdd = explode("-",$date3->format('Y-m-d'));
    $durationhhmmss = explode(":",$date3->format('H:i:s'));
     
    $countdown = $durationyymmdd[1]." ".$durationyymmdd[2].", ".$durationyymmdd[0]." ". $durationhhmmss[0].":".$durationhhmmss[1].
            ":".$durationhhmmss[2];
    
    
    
     
     
    
     
     
  

       ?>
            
         <a href="<?php $_SERVER['PHP_SELF']?>?pageID=AuctionPage0<?php echo $auctionidarray[$i-1]?>"><div class="col-sm-4"> 
      
             <div class="panel panel-success">
      
                 <div class="panel-heading">  <?php echo $titlearray[$i-1]?>  </div> 
        <div class="panel-body">
            
           <img src="Uploads/<?php echo $auctionidarray[$i-1].$zero.".".$imgextarray[$i-1]?>" class="img-responsive" style="width:100%; height:300px;" alt="Image"></div>
        </a>
           <div class="panel-footer">Description: <?php echo $descriptionarray[$i-1];?>
            
            <br>
            
            <p id="highestbid"> Highest bid: €<?php echo $highestbidarr[$i-1]; ?> </p>
            
           <p id="demo_<?php echo $auctionidarray[$i-1]; ?>"></p>
        
        </div>
                 </div>
             </div></a>

           <script>
// Set the date we're counting down to



// Update the count down every 1 second
 
var x = setInterval(function() {

    var countDownDate = new Date("<?php echo $countdown;?>").getTime();
    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
  
  
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo_<?php echo $auctionidarray[$i-1];?>").innerHTML = "EXPIRED";
            var aucid = "<?php echo $auctionidarray[$i-1]; ?>";
          $.ajax({
    url: "JqueryPHP/AuctionStatus.php",
    method: "POST",
    data: {'auctionid': aucid }
  
});
    location.reload();
    }
    else
    {
        document.getElementById("demo_<?php echo $auctionidarray[$i-1];?>").innerHTML =  hours + "h "
    + minutes + "m " + seconds + "s ";
    
    }
    
    // If the count down is over, write some text 
   
}, 333);


    
    

</script>    
       <?php
      
       }
       
          }
          else {
              
             
          }
   ?> 
    </div>
  





    
    
</body>
</html>



