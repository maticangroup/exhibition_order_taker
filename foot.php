<ul class="success-messages">
    <?php
    if (isset($_SESSION['success_messages'])) :
        $success_messages = $_SESSION['success_messages'];
        foreach ($success_messages as $success_message) : ?>
            <li><?= $success_message ?></li>
        <?php
        endforeach;
        $_SESSION['success_messages'] = [];
    endif;
    ?>
</ul>
<ul class="error-messages">
    <?php
    if (isset($_SESSION['error_messages'])) :
        $error_messages = $_SESSION['error_messages'];
        foreach ($error_messages as $error_message) :?>
            <li><?= $error_message ?></li>
        <?php
        endforeach;
        $_SESSION['error_messages'] = [];
    endif;
    ?>
</ul>
</body>
</html>