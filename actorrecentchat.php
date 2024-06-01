<?php include'actorheader.php';
  $lid=$_SESSION['lid'];

// echo $q="SELECT * FROM `login` WHERE `login_id`IN(SELECT IF(`sender_id`='$lid',`reciever_id`,`sender_id`) AS lid FROM `messages` WHERE `sender_id`='$lid' OR `reciever_id`='$lid'";

?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>

<center>
    <h1>
        Recent Chats
    </h1>
        <!-- <table class="table" style="width: 800px;">
        <tr>
            <th>Name</th>
            <th>type</th>
        </tr>
        <?php 

    
    echo  $q1="select * from messages INNER JOIN login ON login.`login_id`=messages.`receiver_id`  where  (sender_id='$lid' and receiver_id='0') or (sender_id='0' and receiver_id='$lid')  ";
        $ress=select($q);

        $i=1;
        foreach($ress as $rows){
        
        ?>
        <tr>
        <td><?php echo $rows['NAMES']?></td>
            <td><?php echo $rows['usertype']?></td>
        </tr>
        <?php }?>
        </table> -->
<table class="table" style="width: 800px;">
<tr>
        <th>Name</th>
        <th>type</th>
    </tr>

<?php 
    $qr="SELECT * FROM `messages` WHERE (`sender_id`='$lid' AND `receiver_id`='0') OR (`sender_id`='0' AND `receiver_id`='$lid')";
    $qrs=select($qr);
    if(sizeof($qrs)>0){ ?>

        <tr>
            <td>Producer</td>
            <td>Producer</td>
            <td><a class="btn btn-success" href="actorchatproducer.php">Chat</a></td>
        </tr>

 <?php   }
    
?>



    <?php 

   
    $q="SELECT usertype,login_id AS rid,CONCAT(firstname,' ',lastname) AS NAMES FROM `director` INNER JOIN login USING (login_id) WHERE login_id IN( SELECT IF(sender_id='$lid',receiver_id,sender_id) FROM messages WHERE `sender_id`='$lid' OR receiver_id='$lid') UNION SELECT usertype,login_id AS rid,Product_house_name AS NAMES FROM `producer` INNER JOIN login USING (login_id) WHERE login_id IN( SELECT IF(sender_id='$lid',receiver_id,sender_id) FROM messages WHERE `sender_id`='$lid' OR receiver_id='$lid') UNION SELECT usertype,login_id AS rid,CONCAT(firstname,' ',lastname) AS NAMES FROM `production_controller` INNER JOIN login USING (login_id) WHERE login_id IN( SELECT IF(sender_id='$lid',receiver_id,sender_id) FROM messages WHERE `sender_id`='$lid' OR receiver_id='$lid')
  ";
     $res=select($q);

     $i=1;
     foreach($res as $row){
    
    ?>
    <tr align="">
        <td><?php echo $row['NAMES']?></td>
        <td><?php echo $row['usertype']?></td>
        <?php if ($row['usertype'] == 'director') {?>
        <td><a class="btn btn-success" href="actorchatdirector.php?did=<?php echo $row['rid']?>">Chat</a></td>
        <?php }else if ($row['usertype'] == 'production controller') {?>
            <td><a class="btn btn-success" href="actorchatcontroller.php?cid=<?php echo $row['rid']?>">Chat</a></td>
            
            <?php }
             ?>
    </tr>
    <?php }?>
</table>
<?php include 'footer.php'?>
