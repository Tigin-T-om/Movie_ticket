<?php include'producerheader.php';
 
 $lid=0;
// echo $q="SELECT * FROM `login` WHERE `login_id`IN(SELECT IF(`sender_id`='$lid',`reciever_id`,`sender_id`) AS lid FROM `messages` WHERE `sender_id`='$lid' OR `reciever_id`='$lid'";

?>
<div style="width: 100%;height: 200px;background: url('images/netflixbg.jpg');" >

</div>

<center>
    <h1 class="g-head">
        Recent Chats
    </h1>
<table class="table" style="box-shadow: 0px 0px 16px 1px hsl(264,44%,32%);width:700px;margin-top: 20px;">
    <tr>
        <th>Name</th>
        <th>type</th>
    </tr>

    <?php 

   
  $q="SELECT usertype,login_id AS rid,CONCAT(firstname,' ',lastname) AS NAMES FROM `actors` INNER JOIN login USING (login_id) WHERE login_id IN( SELECT IF(sender_id='0',receiver_id,sender_id) FROM messages WHERE `sender_id`='0' OR receiver_id='0')
 UNION 
 SELECT usertype,login_id AS rid,CONCAT(firstname,' ',lastname) AS NAMES FROM `production_controller` INNER JOIN login USING (login_id) WHERE login_id IN( SELECT IF(sender_id='0',receiver_id,sender_id) FROM messages WHERE `sender_id`='0' OR receiver_id='0') 
 UNION 
 SELECT usertype,login_id AS rid,CONCAT(firstname,' ',lastname) AS NAMES FROM `director` INNER JOIN login USING (login_id) WHERE login_id IN( SELECT IF(sender_id='0',receiver_id,sender_id) FROM messages WHERE `sender_id`='0' OR receiver_id='0')
 
  ";
     $res=select($q);

     $i=1;
     foreach($res as $row){
    
    ?>
    <tr>
        <td><?php echo $row['NAMES']?></td>
        <td><?php echo $row['usertype']?></td>
        <?php if ($row['usertype'] == 'director') {?>
        <td><a class="btn btn-success" href="producerchatdirector.php?did=<?php echo $row['rid']?>">Chat</a></td>
        <?php }else if ($row['usertype'] == 'production controller') {?>
            <td><a class="btn btn-success" href="producerchatcontroller.php?cid=<?php echo $row['rid']?>">Chat</a></td>
            
            <?php }else if ($row['usertype'] == 'actor') {?>
                <td><a class="btn btn-success" href="producerchatactors.php?actid=<?php echo $row['rid']?>">Chat</a></td>


            <?php }?>
    </tr>
    <?php }?>
</table>
<?php include 'footer.php'?>
