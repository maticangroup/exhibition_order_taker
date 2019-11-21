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



<!-- Main Footer Start -->
<footer class="main--footer main--footer-light">
    <p>Copyright &copy; <a href="#">Matican</a>. All Rights Reserved.</p>
</footer>
<!-- Main Footer End -->
</main>
<!-- Main Container End -->
</div>
<!-- Wrapper End -->

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/jquery.sparkline.min.js"></script>
<script src="assets/js/raphael.min.js"></script>
<script src="assets/js/morris.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/jquery-jvectormap.min.js"></script>
<script src="assets/js/jquery-jvectormap-world-mill.min.js"></script>
<script src="assets/js/horizontal-timeline.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/jquery.steps.min.js"></script>
<script src="assets/js/dropzone.min.js"></script>
<script src="assets/js/ion.rangeSlider.min.js"></script>
<script src="assets/js/datatables.min.js"></script>
<script src="assets/js/main.js"></script>

<!-- Page Level Scripts -->

</body>
</html>
