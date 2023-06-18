<?php 
  $home = esc_url(home_url('/'));
  $news = esc_url(home_url( '/news' ));
  $concept = esc_url(home_url( '/concept' ));
  $liquor = esc_url(home_url( '/liquor' ));
  $about = esc_url(home_url( '/about' ));
  $blog = esc_url(home_url( '/blog' ));
  $contact = esc_url(home_url( '/contact' ));
?>


  <footer class="footer top-footer">
    <div class="footer__inner inner">
      <nav class="footer__nav footer-nav">
        <div class="footer-nav__logo">
          <a href="<?php echo $home ?>"><img src="<?php echo esc_url(get_theme_file_uri('../images/common/logo1.png')); ?>" alt=""></a>
        </div>
        <ul class="footer-nav__items">
          <li class="footer-nav__item"><a href="<?php echo $home ?>">トップ</a></li>
          <li class="footer-nav__item"><a href="<?php echo $news ?>">NEWS</a></li>
          <li class="footer-nav__item"><a href="<?php echo $concept ?>">CONCEPT</a></li>
          <li class="footer-nav__item"><a href="<?php echo $liquor ?>">LIQUOR</a></li>
          <li class="footer-nav__item"><a href="<?php echo $about ?>">ABOUT</a></li>
          <li class="footer-nav__item"><a href="<?php echo $blog ?>">BLOG</a></li>
          <li class="footer-nav__item"><a href="<?php echo $contact ?>">CONTACT</a></li>
        </ul>
      </nav>
      <div class="footer__page-top js-footer">
        <div class="footer__arrow"></div>
      </div>
      <div class="footer__copyright">
        <small>
          &copy;2022-<?php the_time('Y'); ?> 
          <?php echo bloginfo('name'); ?> Inc.
        </small>
      </div>
    </div>
  <?php wp_footer(); ?>
  </footer>
</body>
</html>
