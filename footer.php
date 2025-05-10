<footer class="main-footer">
  <div class="container footer-container">
    <span>Get In Touch</span>
  </div>
  <div class="footer-mobile-nav">
    <nav class="footer-subnav">
      <?php
      // wp_nav_menu(array(
      //   'theme_location' => 'services-menu-mobile',
      //   'container' => false,
      // ));
      ?>
    </nav>
  </div>

  <hr />
  <div class="subfooter">
    <div>
      <p><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?> All Rights Reserved</p>
    </div>
  </div>
  <?php wp_footer(); ?>
</footer>
</body>

</html>