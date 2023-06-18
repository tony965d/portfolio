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

<section class="mv js-mv">
  <div class="mv__inner">
    <div class="mv__images">
      <div class="swiper js-mv-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="slide-img mv__img">
              <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header1.png')); ?>" alt="ビルが立ち並ぶ画像です">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slide-img mv__img">
              <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header2.png')); ?>" alt="ビルを下から見た画像です">
            </div>
          </div>
          <div class="swiper-slide">
            <div class="slide-img mv__img">
              <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header3.png')); ?>" alt="ビルを上空から見た画像です">
            </div>
          </div>
        </div>
      </div>
      <div class="mv__body">
        <h2 class="mv__title">メインタイトルが入ります</h2>
        <p class="mv__subtitle">サブタイトルが入ります</p>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>