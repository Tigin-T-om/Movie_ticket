
<?php include'actorheader.php';
 
?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>Chat With Directors</h1>
          <table class="table" style="width: 1000px;" >
            <tr align="">
              
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
              
            </tr>
            <?php 
            $q="SELECT * FROM director";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <tr align="">
               
                <td><?php echo $row['firstname'].$row['lastname']?></td>
            
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['email']?></td>
               <td><a class="btn btn-success" href="actorchatdirector.php?did=<?php echo $row['login_id']?>">Chat</a></td>

                         </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>