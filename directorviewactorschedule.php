
<?php include'directorheader.php';
  $dirid=$_SESSION['dirid'];
?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>View Actor Schedules</h1>
    <table class="table" >
            <tr align="">
                <th></th>
                <th>Name</th>
                <th>phone</th>
                <th>Email</th>
                <th>Schedule Date</th>
                <th>Schedule Place</th>
             
                
            </tr>
            <?php 
            $q="select * from actors inner join actor_schedule using (actor_id) ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                <td><a href="<?php echo $row['photo']?>"><img width="100" height="100" src="<?php echo $row['photo']?>" alt=""></a></td>
                <td><?php echo $row['firstname'].$row['lastname']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['schedule_date'] ?></td>
                <td><?php echo $row['schedule_place'] ?></td>
                <!-- <td><a href="">View Schedule</a></td> -->
                
            </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>