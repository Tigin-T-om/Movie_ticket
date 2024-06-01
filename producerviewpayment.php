<?php include'producerheader.php';

if(isset($_GET['pid'])){

     $q="update payment set payemnt_status='Payment Confirmed by Producer' where payment_id='$pid' ";
    update($q);
    alert("Successful");
    // return redirect("distributorhome.php");
}
?>

<center>
    <h1>View Payment</h1>
          <table class="table" style="width: 1300px;">
            <tr align="center">
                <th></th>
                <th>Name</th>
                <th>Place</th>
                <th>phone</th>
                <th>Email</th>
                <th>movie Title</th>
                <th>Movie Description</th>
                <th>Amount</th>
             
            </tr>
            <?php 
            $q=" SELECT * FROM `movie` INNER JOIN `auction` USING (movie_id) INNER JOIN auction_details USING (auction_id) INNER JOIN distributors USING (distributor_id) INNER JOIN payment USING (auction_id)  WHERE payment.`distributor_id`='$did' and auction_id='$aid' group by payment.`distributor_id`  ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="center">
                <td><a href="<?php echo $row['poster']?>"><img width="100" height="100" src="<?php echo $row['poster']?>" alt=""></a></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['place']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['movie_title']?></td>
                <td><?php echo $row['movie_desc']?></td>
                <td><?php echo $row['amount_paid']?></td>
                <?php if ($row['payemnt_status'] == 'Payment Confirmed by Producer'){?>
                    <td>Payment Already confirmed</td>
                    <?php }else{?>
                    <td><a class="btn btn-danger" href="?pid=<?php echo $row['payment_id']?>&aid=<?php echo $aid ?>&did=<?php echo $did?>">Confirm Payment</a></td>
                        <?php }?>
                </tr>
            <?php }?>
          </table>

          <?php include 'footer.php'?>