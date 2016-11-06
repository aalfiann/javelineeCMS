<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php theme::url('assets/js/jquery-1.11.0.js')?>"></script>
	<script src="<?php theme::url('assets/js/classie.js')?>"></script>
    <script src="<?php theme::url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php theme::url('assets/js/smoothscroll.js')?>"></script>
	<script src="<?php theme::url('assets/js/jquery.stellar.min.js')?>"></script>
	<script src="<?php theme::url('assets/js/fancybox/jquery.fancybox.js')?>"></script>    
	<script src="<?php theme::url('assets/js/main.js')?>"></script>
		<script>
		$(function(){
			$.stellar({
				horizontalScrolling: false,
				verticalOffset: 40
			});
		});
		</script>
		
		<script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });
	   </script>
    <?=GA()?>
    <?php java::loadmore()?>