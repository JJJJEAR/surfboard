<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css"></style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
    <script>
        function password_show_hide(){
            let x=document.getElementById("password");
            let show_eye=document.getElementById("show_eye");
            let hide_eye=document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if(x.type==="password"){
                x.type="text";
                show_eye.style.display="none";
                hide_eye.style.display="block"
            }
            else{
                x.type="password";
                show_eye.style.display="block";
                hide_eye.style.display="none";
            }          
        }
    </script>
</head>
<body>
<div class="container">
    <?php
        if(isset($_SESSION['id'])){
            header("Location:index.php");
        }
    ?>

    <H1 style="font-size: 200%"><center><b> WebBoard JJ </b></center></H1>
    <?php include "nav.php"; ?>
    <br>  
    
    <form action="verify.php" method="post">
    <?php
        if(isset($_SESSION['error']) == "1"){
    ?>
    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <?php
            if(isset($_SESSION['error'])){
                echo"<div class='alert alert-danger'>ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</div>";
                unset($_SESSION['error']);
            }
        ?>
        </div>
        <div class="col-md-4"></div>
    </div>
    <?php
        }
    ?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card text-dark bg-light" >
                <div class="card-header">เข้าสู่ระบบ</div>
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label class="form-label">Login :</label>
                        <input type="text" class="form-control" name="Login" required>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Password :</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="Pwd" id="password" required>
                            <span class="input-group-text " onclick="password_show_hide();">
                                <i class="bi bi-eye-fill" id="show_eye"></i>
                                <i class="bi bi-eye-slash-fill d-none" id="hide_eye"></i>
                            </span>
                        </div>
                    </div>    
                    <center>
                        <button type="submit" class="btn btn-secondary btn-sm">Login</button>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    </form>
    <div class="mt-4" align="center">ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a></div>
</div>
</body>
</html>