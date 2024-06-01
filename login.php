<?php include 'publicheader.php';

if(isset($_POST['sub'])){

    extract($_POST);
    
    
    $q="select * from login where username='$uname' and password='$pss'";
    $res=select($q);
    if (sizeof($res) > 0){
        $_SESSION['lid']  = $res[0]['login_id'];
        $lid=$_SESSION['lid'];


    if ($res[0]['usertype'] == 'producer'){
        alert("login Successfully");
        return redirect("producerhome.php");
    }
    
    else if($res[0]['usertype'] == 'distributor'){
     $q="select * from distributors where login_id='$lid'";
        $val = select($q);
        if (sizeof($val) > 0){
            $_SESSION['did']=$val[0]['distributor_id'];
            $did=$_SESSION['did'];
            alert("login Successfully");
            return redirect("distributorhome.php");
        }
    }


    else if($res[0]['usertype'] == 'director'){
        $q="select * from director where login_id='$lid'";
        $val = select($q);
        if (sizeof($val) > 0){
            $_SESSION['dirid']=$val[0]['director_id'];
            $dirid=$_SESSION['dirid'];
            $_SESSION['mid']=$val[0]['movie_id'];
            $fid=$_SESSION['mid'];
            alert("login Successfully");
            return redirect("directorhome.php");
        }
    }

    else if($res[0]['usertype'] == 'production controller'){
        $q="select * from production_controller where login_id='$lid'";
        $val = select($q);
        if (sizeof($val) > 0){
            $_SESSION['cid']=$val[0]['controller_id'];
            $cid=$_SESSION['cid'];
            alert("login Successfully");
            return redirect("controllerhome.php");
        }
    }

    else if($res[0]['usertype'] == 'actor'){
        $q="select * from actors where login_id='$lid'";
        $val = select($q);
        if (sizeof($val) > 0){
            $_SESSION['aid']=$val[0]['actor_id'];
            $aid=$_SESSION['aid'];
            alert("login Successfully");
            return redirect("actorhome.php");
        }
    }
}
}
?> 
<div class="container-floating" style="background: url('images/netflixbg.jpg');height:100vh;">
      <div class="row justify-content-center" style="display: flex;align-items: center;justify-content:center;background: rgba(0,0,0,.6);height: 100vh;">
          <center>
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center justify-content-center" >
            <div data-aos="zoom-out" style="width: 400px;box-sizing: content-box;padding: 50px; border: 2px solid #000; box-shadow: 2px 4px 16px 383636;background: rgba(0,0,0,.8);width: 400px;margin-top: -100px;" >
                
                <h2 style="font-size: 30px;color:white" class="text-white" id="hstyle">Login</h2>
    
          <form  method="post">

<table class="table text-white"  style="color:white">
  
      <tr>
        <th>username</th>
        <td><input type="text" required class="form-control" name="uname" id=""></td>
    </tr>
      <tr>
        <th>Password</th>
        <td><input type="password" required class="form-control" name="pss" id=""></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="submit" class="btn btn-success" name="sub" id="">
        </td>
    </tr>
</table>
</form>

          </div>
          </div>
        </div>
        
      </div>
    </div>
    <style>
    body

    {
        overflow: hidden;
    }
</style>
          <?php include 'footer.php' ?> 