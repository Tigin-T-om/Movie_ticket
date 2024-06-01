<?php include 'producerheader.php';
$did=$_SESSION['did'];


$q="SELECT * FROM  `movie` INNER JOIN `auction` USING (movie_id) INNER JOIN auction_details USING (auction_id) inner join distributors using (distributor_id) where auction_id='$auction_id' ORDER BY offered_amount DESC ";
$ress=select($q);

if(isset($_POST['submitbid'])){
    extract($_POST);
     $q="SELECT * FROM  `movie` INNER JOIN `auction` USING (movie_id) INNER JOIN auction_details USING (auction_id) inner join distributors using (distributor_id) where auction_id='$auction_id' ORDER BY offered_amount DESC ";
    $res=select($q);

    $ftw =  $res[0]['offered_amount'];
    $auc_id =  $res[0]['auction_id'];

    $q="update auction_details set details_status='winner' where offered_amount='$ftw' and auction_id='$auc_id'";
    update($q);

    $q="update auction_details set details_status='failed' where not offered_amount='$ftw' and auction_id='$auc_id'";
    update($q);
    alert("Auction Ended");
    return redirect("producerhome.php");

}


?>
<center>
    <h1>Auction Bids    </h1>

    <?php if( $ress[0]['details_status'] == 'ended'){?>
    <div style="width: 100%;height: 80px;justify-content: flex-end; display:flex ;">
    <form action="" method="POST" style="margin-right: 20% !important;">

        <input class="btn btn-danger" value="Submit Bid" name="submitbid" type="submit" style="height: 30px;">
    </form>
    </div>
    <?php }?>
          <table class="table" style="width: 1400px;">
            <tr align="center">
                <th></th>
                <th>Title</th>
                <th>Distributor Name</th>
                <th>Distributor Phone</th>
                <th>Distributor Place</th>
                <th>Distributor Email</th>
              
       
                <th>Starting price</th>
             
                <th>Bid Start Date</th>
                <th>Bid End Date</th>
                <th>Offered Amount</th>
                <th>Status</th>
            </tr>
            <?php 
            $q="SELECT * FROM  `movie` INNER JOIN `auction` USING (movie_id) INNER JOIN auction_details USING (auction_id) inner join distributors using (distributor_id) where auction_id='$auction_id' ORDER BY details_id DESC ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="center">
                <td><img width="100" height="120" src="<?php echo $row['poster'] ?>" alt=""></td>
                <td><?php echo $row['movie_title']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['place']?></td>
                <td><?php echo $row['email']?></td>
                
            
                <td><?php echo $row['starting_price']?></td>
               
                <td><?php echo $row['bid_start_date']?></td>
                <td><?php echo $row['bid_end_date']?></td>
                <td><?php echo $row['offered_amount']?></td>
                <td><?php echo $row['details_status']?></td>
               
                <?php if ($row['details_status'] == 'winner'){?>
                      <td>  <a class="btn btn-success" href="producerviewpayment.php?did=<?php echo $row['distributor_id']?>&aid=<?php echo $row['auction_id']?>">View Payment</a></td>
                    <?php }?>
                
                 </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>