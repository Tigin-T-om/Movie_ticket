<?php include 'distributorheader.php';
$did=$_SESSION['did'];
extract($_GET);
if (isset($_POST['bids'])) {
	extract($_POST);
    $q="select * from auction_details where auction_id='$auction_id'";
    $val=select($q);
    if(sizeof($val) > 0 ){
        $q="update auction_details set offered_amount='$bamo' where auction_id='$auction_id' ";
        update($q);
        alert(' Successfully');
        return redirect('distributorviewfilims.php');
        
    }else{

        $q="insert into auction_details values(null,'$auction_id','$did','$bamo','pending')";
        insert($q);
        alert(' Successfully');
        return redirect('distributorviewfilims.php');
    }

}


$price = $starting;



 ?>

      
 <script type="text/javascript">
 	
 	var check = function() {
 		
  if (parseInt(document.getElementById('elm').value) >= parseInt(document.getElementById('elms').value)) {
    document.getElementById('message').style.color = 'red';
    document.getElementById('bids').style.visibility = "hidden";
    document.getElementById('message').innerHTML = 'Please enter value greater than above amount';
  }
  else{
  	document.getElementById('message').style.color = 'green';
  	document.getElementById('bids').style.visibility = "visible";
    document.getElementById('message').innerHTML = 'ok';
  }
}


 </script>
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
<center>

<div style="width: 100%;height: 100vh;background: url('images/tc.jpg');background-size: cover;" >

<h1 style="padding-top: 200px;">Make Bids</h1>
	<form method="post">
		<table class="table" style="width: 500px">
		<?php
			$m="SELECT MAX(offered_amount) as offered_amount FROM auction_details WHERE auction_id='$auction_id' ORDER BY offered_amount DESC  ";
      		$y=select($m);

            $i=1;
            foreach($y as $row){
		?>
		<tr>
			<th>Base/ Last Amount</th>
      <?php if ($row['offered_amount']) {?>
			<td style="color: black"><input type="text" readonly class="form-control" value="<?php echo $row['offered_amount']?>" id="elm" name="bam"></td>
        <?php }else{?>
			<td style="color: black"><input type="text" readonly class="form-control" value="<?php echo $price?>" id="elm" name="bam"></td>
    <?php }?>
    
    </tr>
        <?php }?>
		<tr>
			<th>Bid Amount</th>
			<td style="color: black"><input type="text" class="form-control" name="bamo" id="elms" onchange ='check();'><span id='message'></span></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit"  name="bids" id="bids" class="btn btn-success" value="submit"></td>
		</tr>
	</table>

		
	</form>
</div>


</center>

<?php include 'footer.php' ?>