	<div class="outer-container">
    <footer class="footer--primary">
    		<p>&copy; Copyright <?php $the_year = date("Y"); echo $the_year; ?> Variety Pet Foods, LLC.  all rights reserved.</p>
    		<?php wp_nav_menu( array('theme_location' => 'footer_primary_nav') ); ?>
    </footer>
  </div>

    <script src="<?= assets_url() ?>build/js/plugins.min.js"></script>
    <script src="<?= assets_url() ?>build/js/main.min.js"></script>
    <?php wp_footer(); ?>
  </body>
</html>
