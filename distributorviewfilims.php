<?php include 'distributorheader.php';

$q2="SELECT CURDATE() as m";                            
$res=select($q2);




?>

<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>Avilabe Filims For Auction</h1>
          <table class="table" >
            <tr align="">
                <th></th>
                <th>Title</th>
                <th>description</th>
                <th>cast and crew</th>
                <th>release Date</th>
                <th>Starting price</th>
                <th>Advance Amount</th>
                <th>Bid Start Date</th>
                <th>Bid End Date</th>

            </tr>
            <?php 
            $q="SELECT * FROM  `movie` inner join `auction` using (movie_id) where auction_status='start'";
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
                <td><?php echo $row['bid_start_date']?></td>
                <td><?php echo $row['bid_end_date']?></td>
             

           
                <td><a class="btn btn-success" href="distributormakebid.php?auction_id=<?php echo $row['auction_id'] ?>&starting=<?php echo $row['starting_price'] ?>">Make bid</a></td>
                
                 </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>