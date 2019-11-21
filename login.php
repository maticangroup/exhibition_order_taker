<?php require "head.php"; ?>
<div class="login-form">
    <form action="login.php">
        <div class="login-form-element">
            Welcome to the order taking platform
        </div>
        <div class="login-form-element">
            <div class="element-title">
                Username
            </div>
            <div class="element-input">
                <input name="username" type="text">
            </div>
        </div>
        <div class="login-form-element">

            <div class="element-title">
                Password
            </div>
            <div class="element-input">
                <input name="password" type="password">
            </div>

        </div>
        <div class="login-form-element submit">
            <div class="element-input">
                <input type="submit" value="Login">
            </div>
        </div>
    </form>
</div>


<?php
if (isset($_REQUEST['username'])):
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $user = (isset($users[$username])) ? $users[$username] : null;
    manage_login($user, $password);
endif;
?>

<?php require "foot.php"; ?>
