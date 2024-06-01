<?php include'producerheader.php';
?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>Available Schedules</h1>
          <table class="table" >
            <tr align="">
         
                <th>Name</th>
                <th>phone</th>
                <th>Schedule Date</th>
                <th>Schedule Place</th>
             
              
            </tr>
            <?php 
            $q="select * from actors inner join actor_schedule using (actor_id) where actor_id='$aid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                <td><?php echo $row['firstname'].$row['lastname']?></td>
            
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['schedule_date']?></td>
                <td><?php echo $row['schedule_place']?></td>
           
                
            </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>