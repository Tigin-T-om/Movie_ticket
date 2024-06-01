
<?php include'actorheader.php';

?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>Chat With production Controller</h1>
          <table class="table" style="width: 1000px;" >
            <tr align="">
              
                <th>Name</th>
                <th>Phone1</th>
                <th>Phone2</th>
                <th>Email</th>
              
            </tr>
            <?php 
            $q="SELECT * FROM production_controller";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
               
                <td><?php echo $row['firstname'].$row['lastname']?></td>
            
                <td><?php echo $row['phone1']?></td>
                <td><?php echo $row['phone2']?></td>
                <td><?php echo $row['email']?></td>
               <td><a class="btn btn-success" href="actorchatcontroller.php?cid=<?php echo $row['login_id']?>">Chat</a></td>

                         </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>