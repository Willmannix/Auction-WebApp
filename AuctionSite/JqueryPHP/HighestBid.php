<?php



  
  if (isset($_POST['newbid'])) 
  {
  $newbid=$_POST['newbid'];
 
          $userid = $_POST['userid'];
  $auctionid = $_POST['auctionid'];
    $conn = new mysqli('localhost', 'root', '', 'auctionsite');
    $conn1 = new mysqli('localhost', 'root', '', 'auctionsite');
    
    $sql2='INSERT IGNORE INTO prevbids(userID,auctionID)VALUES("'.$userid.'","'.$auctionid.'")';
                        
 @$conn1->query($sql2);//execute the query and check it worked    
                           
 $sql = "UPDATE auction
        SET highestbid = '$newbid', useridhighestbid = '$userid'
        WHERE auctionid = '$auctionid'";
 if(@$conn->query($sql)){  //execute the query and check it worked    
                            return TRUE;
                        } 
                        

                        
         
  }
  

  
  
  
  
  
  


 






