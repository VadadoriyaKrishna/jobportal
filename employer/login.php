<?php
require_once("../include/initialize.php");

// login confirmation
if(isset($_SESSION['ADMIN_USERID'])){
    redirect(web_root."admin/index.php");
} 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TimesJobs | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo web_root;?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo web_root;?>plugins/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo web_root;?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo web_root;?>plugins/iCheck/square/blue.css">
    <style>
        .hold-transition{
            background-image:url('bg.avif');
        }
        .login-box-body{
            background-color:#f2f2f2;
            border:5px solid black;
            border-radius:10px;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-box-body" style="min-height: 400px;">
        <h1 class="login-box-msg">Login to TimesJobs</h1>
        <hr/>
        <p><?php check_message(); ?></p>

        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name="user_email">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="user_pass">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group">
                <label for="role">Login As:</label>
                <select name="role" class="form-control">
                    <option value="admin">employer</option>
                    
                </select>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" name="btnLogin" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
if(isset($_POST['btnLogin'])){
    $email = trim($_POST['user_email']);
    $password  = trim($_POST['user_pass']);
    $hashed_password = sha1($password);
    $role = $_POST['role'];

    if ($email == '' OR $password == '') {
        message("Invalid Username and Password!", "error");
        redirect("login.php");
    } else {
        $user = new User();
        $res = $user->userAuthentication($email, $hashed_password, $role);
        if ($res) {
            if ($role == 'admin') {
                $_SESSION['ADMIN_USERID'] = $_SESSION['USERID'];
                $_SESSION['ADMIN_FULLNAME'] = $_SESSION['FULLNAME'] ;
                $_SESSION['ADMIN_USERNAME'] =$_SESSION['USERNAME'];
                $_SESSION['ADMIN_PASSWORD'] =$_SESSION['PASS'];
                $_SESSION['ADMIN_ROLE'] = $_SESSION['ROLE'];
                $_SESSION['ADMIN_PICLOCATION'] = $_SESSION['PICLOCATION'];

                unset( $_SESSION['USERID'] );
                unset( $_SESSION['FULLNAME'] );
                unset( $_SESSION['USERNAME'] );
                unset( $_SESSION['PASS'] );
                unset( $_SESSION['ROLE'] );
                unset($_SESSION['PICLOCATION']);

                redirect(web_root."admin/index.php");
            } elseif ($role == 'employer') {
                $_SESSION['EMPLOYER_USERID'] = $_SESSION['USERID'];
                $_SESSION['EMPLOYER_FULLNAME'] = $_SESSION['FULLNAME'] ;
                $_SESSION['EMPLOYER_USERNAME'] =$_SESSION['USERNAME'];
                $_SESSION['EMPLOYER_PASSWORD'] =$_SESSION['PASS'];
                $_SESSION['EMPLOYER_ROLE'] = $_SESSION['ROLE'];
                $_SESSION['EMPLOYER_PICLOCATION'] = $_SESSION['PICLOCATION'];

                unset( $_SESSION['USERID'] );
                unset( $_SESSION['FULLNAME'] );
                unset( $_SESSION['USERNAME'] );
                unset( $_SESSION['PASS'] );
                unset( $_SESSION['ROLE'] );
                unset($_SESSION['PICLOCATION']);

                redirect(web_root."employer/index.php");
            }
        } else {
            message("Invalid Email, Password, or Role. Please check your credentials and try again.", "error");
            redirect(web_root."admin/login.php");
        }
    }
}
?>

<!-- jQuery 2.1.4 -->
<script src="<?php echo web_root;?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo web_root;?>bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo web_root;?>plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>                                 