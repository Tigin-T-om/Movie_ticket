<?php include'producerheader.php';
?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
<h1 class="g-head">View Filim Schedules</h1>
          <table class="table" style="box-shadow: 0px 0px 16px 1px hsl(264,44%,32%);width: 97%;margin-top: 20px;" >
            <tr align="">
                <th></th>
                <th>movietitle</th>
                <th>Description</th>
              
                <th>Schedule Place</th>
                <th>Schedule Date</th>
             
           
            </tr>
            <?php 
            $q="SELECT * FROM `movie` INNER JOIN `filim_schedule` ON `movie`.`movie_id`=`filim_schedule`.`filim_id`";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                <td><a href="<?php echo $row['poster']?>"><img height="100" width="100" src="<?php echo $row['poster']?>" alt=""></a></td>
                <td><?php echo $row['movie_title']?></td>
                <td><?php echo $row['movie_desc']?></td>
                <td><?php echo $row['filim_schedule_place']?></td>
                <td><?php echo $row['filim_schedule_date']?></td>
                <td><a class="btn btn-danger" href="producerupdatefilimschedule.php?fs_id=<?php echo $row['filim_schedule_id']?>">Update Schedule</a></td>
                
            </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>