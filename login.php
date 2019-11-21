<?php require "head.php"; ?>


<div class="row gutter-20 mt-5">
    <div class="col-3"></div>
    <div class="col-md-6">
        <!-- Panel Start -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Login Form</h3>
            </div>

            <form action="login.php" class="panel-content">
                <div class="form-group">
                    <label>
                        <span class="label-text">Username</span>
                        <input type="text" name="username" placeholder="Enter Your Mobile Number..." class="form-control">
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <span class="label-text">Password</span>
                        <input type="password" name="password" placeholder="Enter Your Password..." class="form-control">
                    </label>
                </div>

                <input type="submit" value="Submit" class="btn btn-sm btn-rounded btn-success">
            </form>
        </div>
    </div>
    <div class="col-3"></div>
</div>





<!--<div class="login-form">-->
<!--    <form action="login.php">-->
<!--        <div class="login-form-element">-->
<!--            Welcome to the order taking platform-->
<!--        </div>-->
<!--        <div class="login-form-element">-->
<!--            <div class="element-title">-->
<!--                Username-->
<!--            </div>-->
<!--            <div class="element-input">-->
<!--                <input name="username" type="text">-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="login-form-element">-->
<!---->
<!--            <div class="element-title">-->
<!--                Password-->
<!--            </div>-->
<!--            <div class="element-input">-->
<!--                <input name="password" type="password">-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--        <div class="login-form-element submit">-->
<!--            <div class="element-input">-->
<!--                <input type="submit" value="Login">-->
<!--            </div>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->


<?php
if (isset($_REQUEST['username'])):
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $user = (isset($users[$username])) ? $users[$username] : null;
    manage_login($user, $password);
endif;
?>

<?php require "foot.php"; ?>
