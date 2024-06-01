
       
           <?php include 'distributorheader.php';
           $did=$_SESSION['did'];
           if(isset($_POST['sub'])){
            extract($_POST);
            $q="insert into payment values(null,'$auction_id', '$did', '$amount','payment completed')";
            insert($q);
            alert("Payment Successfull");
            return redirect("distributorhome.php");
           }
           
           ?>
           <style>
    div table{
        color: white;
    }
    h1,h2,th{
        color: white;
    }
</style>

<div style="width: 100%;height: 100vh;background: url('images/tc.jpg');background-size: cover;" >

<div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center" style="display: flex;align-items: center;justify-content:center;width: 100%;">
          <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid grey; box-shadow: 2px 4px 16px grey;margin-top: 20px;" >
          <center>
          <form  method="post">

    <h2 style="font-size: 30px;" class="text-white" id="hstyle">Payment</h2>
<table class="table " >
    <tr>
        <th>Amount </th>
        <td><input type="text" readonly value="<?php echo $amount ?>" required class="form-control" name="fname" id=""></td>
    </tr>
    <tr>
        <th>Card No </th>
        <td><input type="text" placeholder="8973-2653-8897-1243" required class="form-control" name="place" id=""></td>
    </tr> 
    <tr>
        <th>Cvv </th>
        <td><input type="password" placeholder="***" required class="form-control" name="phone" id=""></td>
    </tr>
    <tr>
        <th>Expeiry Date</th>
        <td><input type="date" placeholder="23/08/2001" required class="form-control" name="email" id=""></td>
    </tr>
   
   
    
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" name="sub" id="">
        </td>
    </tr>
</table>
</form>
          </center>
            </div>
          </div>
</div>


      

<?php include 'footer.php'?>
