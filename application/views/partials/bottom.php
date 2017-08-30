<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<footer class="footer">
        <div class="container-fluid">
            <p class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script> copyright reserved by <a href="">Shariful Islam</a>
            </p>
        </div>
    </footer>
    </div><!-- End of Container -->
	
	<script>
		base_url = '<?php echo base_url(); ?>';
	</script>

	<!--   Core JS Files   -->
    <script src="<?php echo base_url('/asset/js/jquery-3.2.1.min.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('/asset/js/bootstrap.min.js') ?>" type="text/javascript"></script>
	
	<!--  SweetAlert Plugin    -->
	<script src="<?php echo base_url('/asset/js/sweetalert.min.js') ?>" type="text/javascript"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url('/asset/js/app.js') ?>" type="text/javascript"></script>

	<!-- sweet alert to show flush message -->
	<script>
	    <?php if ( isset($_SESSION['message']) ) :?>
	        swal({
	            title: "<?php echo $_SESSION['message']; ?>",
	            type: "<?php echo $_SESSION['type']; ?>",
	            timer: 3000,
	            showConfirmButton: false,
	            html: true
	        });
	    <?php endif; ?>
	</script>
</body>
</html>