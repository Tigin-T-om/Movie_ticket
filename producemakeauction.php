
<?php include'producerheader.php';
?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1 class="g-head">Make Movies for Auction</h1>
          <table class="table" style="box-shadow: 0px 0px 16px 1px hsl(264,44%,32%);width: 97%;margin-top: 20px;">
            <tr align="">
                <th></th>
                <th>Title</th>
                <th>description</th>
                <th>cast and crew</th>
                <th>release Date</th>
            </tr>
            <?php 
            $q="select * from movie";
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
                <td><a class="btn btn-danger" href="produceractionset.php?mid=<?php echo $row['movie_id']?>">Make Auction</a></td>
                         </tr>
            <?php }?>
          </table>

          <?php include 'footer.php'?>