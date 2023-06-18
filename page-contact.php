<?php get_header(); ?>

  <?php 
    $home = esc_url(home_url('/'));
    $news = esc_url(home_url( '/news' ));
    $content = esc_url(home_url( '/concept' ));
    $works = esc_url(home_url( '/liquor' ));
    $overview = esc_url(home_url( '/about' ));
    $blog = esc_url(home_url( '/blog' ));
    $contact = esc_url(home_url( '/contact' ));
  ?>

<section class="mv-sub js-mv">
  <div class="mv-sub__inner">
    <div class="mv-sub__images">
      <div class="mv-sub__img">
        <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header8.jpg'))?>" alt="">
      </div>
      <div class="mv-sub__body">
        <h2 class="mv-sub__title">お問い合わせ</h2>
      </div>
    </div>
  </div>
</section>

<div class="wp-breadcrumb wp-breadcrumb--news inner">
  <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
  
  
<section class="sub-contact top-sub--contact">
  <div class="sub-contact__inner inner">
    
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php echo do_shortcode('[contact-form-7 id="944" title="お問い合わせ"]'); ?>
      <?php endwhile; ?>
    <?php endif;  ?>

  </div>
</section>

<section class="contact top-contact u-mobile">
  <div class="contact__inner inner">
    <div class="contact__header section-header">
      <h2 class="section-header__title">お問い合わせ</h2>
      <div class="section-header__subtitle section-header__subtitle--top">Contact</div>
    </div>
    <div class="contact__content">
      <div class="contact__body">
        <p class="contact__text">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
      </div>
      <div class="contact__btn">
        <a href="<?php echo $contact; ?>" class="button button--contact">お問い合わせへ</a>
      </div>
    </div>
  </div>
</section>
  
<?php get_footer(); ?>


 <!-- <dl class="explain">
        <div class="explain__block">
          <dt class="explain__header">会社名</dt>
          <dd class="explain__description">テキストが入ります</dd>
        </div>
      </dl> -->