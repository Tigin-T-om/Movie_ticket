<?php include 'distributorheader.php';
$did=$_SESSION['did'];
?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>Your Auction history</h1>
          <table class="table" >
            <tr align="">
                <th></th>
                <th>Title</th>
                <th>description</th>
              
       
                <th>Starting price</th>
             
                <th>Bid Start Date</th>
                <th>Bid End Date</th>
                <th>Offered Amount</th>
                <th>Status</th>
            </tr>
            <?php 
          $q="SELECT *,MAX(offered_amount) as offered_amount FROM  `movie` INNER JOIN `auction` USING (movie_id) INNER JOIN auction_details USING (auction_id)  where `auction_details`.distributor_id='$did' group by details_status";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                <td><img width="100" height="120" src="<?php echo $row['poster'] ?>" alt=""></td>
                <td><?php echo $row['movie_title']?></td>
                <td><?php echo $row['movie_desc']?></td>
         
            
                <td><?php echo $row['starting_price']?></td>
               
                <td><?php echo $row['bid_start_date']?></td>
                <td><?php echo $row['bid_end_date']?></td>
                <td><?php echo $row['offered_amount']?></td>
                <td><?php echo $row['details_status']?></td>
                
                
                <?php if ($row['details_status'] == 'winner'){?>
                    <?php 
                    $aid=$res[0]['auction_id'];
                    $q1="select * from payment where not auction_id='$aid'  ";
                    $val=select($q1);
                    if(sizeof($val)>0){
                    if ($val[0]['payemnt_status'] == 'payment completed'){?>
                        <td>Payment Completed</td>
                        <?php }elseif ($val[0]['payemnt_status'] == 'Payment Confirmed by Producer'){?>
                            <td>Payment Confirmed by Producer</td>
                            <?php }?>
                            <?php }else{?>
                           
                    <td><a class="btn btn-success"  href="distributormakepayment.php?auction_id=<?php echo $row['auction_id'] ?>&amount=<?php echo $row['offered_amount']?>"> Make Payment </a></td>
                    <?php } ?>

                   
                               
              
                <?php }else{?>



                    <?php }?>
                 </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>