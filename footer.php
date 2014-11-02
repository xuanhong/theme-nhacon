<!-- Footer -->

  <footer class="row">
    <div class="twelve columns">
      <hr />
      <div class="row">
        <div class="twelve columns">
          <p class="text-center"><?php echo get_theme_mod( 'footer_text' );  ?> | &copy; All Rights Reserved </p>
        </div>
      </div>
    </div>
  </footer>

  <?php if (get_theme_mod( 'google_analytics' )) { 
 echo get_theme_mod( 'google_analytics' );       
 } ?>
<?php wp_footer(); ?>
</body>
</html>

  <!-- End Footer -->