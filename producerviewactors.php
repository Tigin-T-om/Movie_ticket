<?php include'producerheader.php';
?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<style>
    /* table tr{
        display: flex;
        justify-content: space-between;
        align-items: center;
    } */
    td{
        padding-bottom: -20px !important;
    }
</style>
<center>
    <h1 class="g-head">View Actors</h1> 
          <table class="table" style="box-shadow: 0px 0px 16px 1px hsl(264,44%,32%);width: 97%;margin-top: 20px;" >
            <tr align="">
                <th></th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>phone</th>
             
                <th>Email</th>
            </tr>
            <?php 
            $q="select * from actors  ";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
                <td><a href="<?php echo $row['photo']?>"><img width="100" height="100" src="<?php echo $row['photo']?>" alt=""></a></td>
                <td><?php echo $row['firstname']?></td>
                <td><?php echo $row['lastname']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['email']?></td>
                <td><a class="btn btn-warning" href="producerviewactorschedule.php?aid=<?php echo $row['actor_id']  ?>">View Schedule</a></td>
                
            </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>