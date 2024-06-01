<?php include'producerheader.php';
 $q2="SELECT CURDATE() as m";                            
	$res=select($q2);
    
//     if($res[0]['m'] == )


if(isset($_POST['sub'])){
    extract($_POST);

    $q="insert into auction values(null,'$mid','$sprice','$advance','$dstartdate','$benddate','start')";
    $lid=insert($q);

    alert("Action Set Successfully");
    return redirect("producerhome.php");
  
}


?>

<style>
    div table{
        color: white;
    }
    h1,h2{
        color: white;
    }
    body{
        overflow: hidden;
    }
</style>

<div style="width: 100%;height: 100vh;background: url('images/tc.jpg');background-size: cover;" >
<center>
          <form  style="width: 50%;height: 500px;padding-top: 200px;" method="post" enctype="multipart/form-data">

          

    <h2 style="font-size: 30px;" class="text-white" id="hstyle">Set Auction Details</h2>
<table class="table " >
    <tr>
        <th>Starting Price </th>
        <td><input type="number" required class="form-control" name="sprice" id=""></td>
    </tr>
    <tr>
        <th>Advance Amount </th>
        <td><input type="number" required class="form-control" name="advance" id=""></td>
    </tr>
    <tr>
        <th>Bid Start Date </th>
        <td><input type="date" required class="form-control"  min="<?php echo $res[0]['m'] ?>"  name="dstartdate" id=""></td>
    </tr> 
    <tr>
        <th>Bid End Date </th>
        <td><input type="date" required class="form-control"  min="<?php echo $res[0]['m'] ?>" name="benddate" id=""></td>
    </tr>
   
      
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" name="sub" id="">
        </td>
    </tr>
</table>

</div>

      

<?php include 'footer.php'?>