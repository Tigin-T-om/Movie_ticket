<?php include 'producerheader.php';


if(isset($_GET['start'])){
    extract($_GET);

    $q="update auction set auction_status='start' where auction_id='$start'  ";
    update($q);
    return redirect("producerviewauction.php");
}


if(isset($_GET['stop'])){
    extract($_GET);

    $q="update auction set auction_status='stop' where auction_id='$stop'  ";
    update($q);
    $q="update auction_details set details_status='ended' where details_id='$details_id'  ";
    update($q);



    return redirect("producerviewauction.php");
}
?>

<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1 class="g-head">Auctions</h1>
          <table class="table" style="box-shadow: 0px 0px 16px 1px hsl(264,44%,32%);width: 97%;margin-top: 20px;" >
            <tr align="">
                <th></th>
                <th>Title</th>
                <th>description</th>
                <th>cast and crew</th>
                <th>release Date</th>
                <th>Starting price</th>
                <th>Advance Amount</th>
    
                <th>Status</th>
            </tr>
            <?php  
            $q="SELECT * FROM  `movie` inner join `auction` using (movie_id) inner join auction_details using (auction_id) group by auction_id";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                <td><img width="100" height="120" src="<?php echo $row['poster'] ?>" alt=""></td>
                <td><?php echo $row['movie_title']?></td>
                <td><?php echo $row['movie_desc']?></td>
                <td><?php echo $row['cast_and_crew']?></td>
                <td><?php echo $row['release_date']?></td>
                <td><?php echo $row['starting_price']?></td>
                <td><?php echo $row['advance_amount']?></td>
         
                <td><?php echo $row['auction_status']?></td>

                <?php if($row['auction_status'] == 'pending'){?>
                <td><a class="btn btn-success" href="?start=<?php echo $row['auction_id']?>">Start</a></td>
                <?php }else  if($row['auction_status'] == 'start'){?>
                <td><a class="btn btn-danger" href="?stop=<?php echo $row['auction_id']?>&details_id=<?php echo $row['details_id']?>">Stop</a></td>
                <?php }else if($row['auction_status'] == 'stop'){?>
             
                        <!-- <td>Auction Ended !</td> -->
                        <td>
                            <a class="btn btn-warning" href="producerviewbids.php?auction_id=<?php echo $row['auction_id']?>">View Bids</a>
                        </td>
                    <?php }?>
                
                 </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>