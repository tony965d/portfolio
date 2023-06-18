<?php get_header(); ?>
  
  <?php 
    $home = esc_url(home_url('/'));
    $news = esc_url(home_url( '/news' ));
    $content = esc_url(home_url( '/content' ));
    $works = esc_url(home_url( '/works' ));
    $overview = esc_url(home_url( '/overview' ));
    $blog = esc_url(home_url( '/blog' ));
    $contact = esc_url(home_url( '/contact' ));
  ?>

<section class="error">
  <div class="error__inner inner">
    <div class="error__wrapper">
      <div class="error__title">404 Not Found</div>
      <div class="error__subtitle">お探しのページは<br class="u-mobile">見つかりませんでした。</div>
      <div class="error__btn">
        <a href="<?php echo $home ?>" class="button">TOPへ</a>
      </div>
    </div>
  </div>
</section>
  
<?php get_footer(); ?>

