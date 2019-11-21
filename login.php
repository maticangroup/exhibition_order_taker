<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php"; ?>


<?php
if (isset($_REQUEST['username'])):
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $user = (isset($users[$username])) ? $users[$username] : null;
    manage_login($user, $password);
endif;
?>
<?php require "head.php"; ?>
<div class="row gutter-20 mt-5">
    <div class="col-4"></div>
    <div class="col-md-4">
        <!-- Panel Start -->

        <div class="row my-5">
            <div class="col-12 text-center">
                <img width="50%"
                     src="http://bitaplastic.com/wp-content/themes/bita-fa/option-tree/assets/images/logo.png"
                     alt="">
            </div>
        </div>

        <div class="panel ">

            <form action="login.php" class="panel-content" method="post">


                <div class="form-group">
                    <label>
                        <span class="label-text">Username</span>
                        <input type="text" name="username" placeholder="Mobile Number..."
                               class="form-control">
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <span class="label-text">Password</span>
                        <input type="password" name="password" placeholder="Password..."
                               class="form-control">
                    </label>
                </div>
                <div class="form-group text-center mt-4 ">

                    <input type="submit" value="Login" class="btn btn-sm btn-rounded btn-success btn-block">
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="success-messages list-unstyled">
                            <?php
                            if (isset($_SESSION['success_messages'])) :
                                $success_messages = $_SESSION['success_messages'];
                                foreach ($success_messages as $success_message) : ?>
                                    <li class="text-success"><?= $success_message ?></li>
                                <?php
                                endforeach;
                                $_SESSION['success_messages'] = [];
                            endif;
                            ?>
                        </ul>
                        <ul class="error-messages list-unstyled">
                            <?php
                            if (isset($_SESSION['error_messages'])) :
                                $error_messages = $_SESSION['error_messages'];
                                foreach ($error_messages as $error_message) :?>
                                    <li class="text-danger"><?= $error_message ?></li>
                                <?php
                                endforeach;
                                $_SESSION['error_messages'] = [];
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="col-4"></div>
</div>

<?php require "foot.php"; ?>
