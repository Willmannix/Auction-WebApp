<?php
$auctionid = $_POST['auctionid'];
 $conn = new mysqli('localhost', 'root', '', 'auctionsite');
$sql='SELECT  * FROM auction WHERE auctionid="'.$auctionid.'"';
 if($rs=$conn->query($sql)){ 
     
      $row=$rs->fetch_assoc();
       $highestbid = $row["highestbid"];
 }
 
 echo $highestbid;
