
<?php include'producerheader.php';
  $dirid=$_SESSION['dirid'];
?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>
<center>
    <h1>Chat With Actors</h1>
          <table class="table" style="width: 1300px;" >
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
               
                <td><?php echo $row['firstname'].$row['lastname']?></td>
            
                <td><a href="<?php echo $row['photo']?>"><img width="100" height="100" src="<?php echo $row['photo']?>" alt=""></a></td>
                <td><?php echo $row['firstname']?></td>
                <td><?php echo $row['lastname']?></td>
                <td><?php echo $row['phone']?></td>
                <td><?php echo $row['email']?></td>
               <td><a class="btn btn-success" href="producerchatactors.php?actid=<?php echo $row['login_id']?>">Chat</a></td>

                         </tr>
            <?php }?>
          </table>
          <?php include 'footer.php'?>