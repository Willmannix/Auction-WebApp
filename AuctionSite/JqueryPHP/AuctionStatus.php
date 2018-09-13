<?php

  $auctionid = $_POST['auctionid'];
  $status = "expired";
    $conn = new mysqli('localhost', 'root', '', 'auctionsite');
    $conn1 = new mysqli('localhost', 'root', '', 'auctionsite');
       $sql1='SELECT  * FROM auction WHERE auctionid="'.$auctionid.'"';
 $rs=$conn->query($sql1);
     
      $row=$rs->fetch_assoc();
       $highestbid = $row["highestbid"];
       $winnerid = $row["useridhighestbid"];
    $title= $row["title"];
    $description = $row["description"];
    
   $sql2='INSERT IGNORE INTO successfulbids(userid,auctionid,price,title,description)VALUES("'.$winnerid.'","'.$auctionid.'","'.$highestbid.'","'.$title.'","'.$description.'")';
 @$conn1->query($sql2); 
 
 $sql = "UPDATE auction
        SET status = '$status'
        WHERE auctionid = '$auctionid'";
 @$conn->query($sql);  //execute the query and check it worked    
                            
     
 
       
      
                            
     
 
 
                         
 

   
  

