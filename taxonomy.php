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

<section class="mv-sub js-mv">
  <div class="mv-sub__inner">
  <div class="mv-sub__images">
    <div class="mv-sub__img">
      <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header-blog.png')); ?>" alt="ビルの中で人が並んでいる画像です">
    </div>
    <div class="mv-sub__body">
      <h2 class="mv-sub__title">ブログ</h2>
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

<section class="sub-blog top-sub">
  <div class="sub-blog__inner inner">
    <div class="sub-blog__wrapper">

      <div class="blog__cards cards">
        
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        
        <a href="<?php echo $blog ?>" class="cards__item card">
          <div class="card__icon">
            <!-- <?php    
            $limit =2;
            $num = $wp_query->current_post;
            if ( $limit > $num ):
                echo '<div class="card__icon-text">New</div>';
            endif;
            ?> -->

            <?php
              $last_post_ids = array();
              $lastposts = get_posts('post_type=blog&posts_per_page=1'); // 『blog』はカスタム投稿タイプスラッグ
              foreach($lastposts as $lastpost) {
                $last_post_ids[] = $lastpost->ID;
              }
            ?>
            <?php if ( in_array( $post->ID, $last_post_ids ) ) : ?>
            <span class="card__icon-text">NEW</span>
            <?php endif; ?>


          </div>
          <div class="card__img">
            <img src="<?php echo esc_url(get_theme_file_uri('../images/common/blog1.png')); ?>" alt="パソコンで何かのデータを映している画像です">
          </div>

          <div class="card__contents">
            <div class="card__content">
              <h3 class="card__title"><?php the_title(); ?></h3>
              <p class="card__text"><?php the_content(); ?></p>
            </div>
            <div class="card__body">
              <div class="card__category"><?php get_terms(); ?></div>
              <time datetime="<?php the_time('Y.m.d'); ?>" class="card__date"><?php the_time('Y.m.d'); ?></time>
            </div>
          </div>
        </a>
        <?php endwhile; ?>
        <?php endif;  ?>
      </div>
      
    </div>

    <div class="page-nav">
      <?php
      $paged = get_query_var("paged") ? get_query_var("paged") : 1;
      $query = new WP_Query(
        array(
          'paged' => '投稿タイプ',
          'posts_per_page' => 10,
          'paged' => $paged
        )
      );
      ?>
      <?php if(function_exists("wp_pagenavi")) wp_pagenavi(array('query' => $query)); ?>
    </div>
  </div>
</section>
  

<section class="contact top-contact">
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
        <a href="<?php echo $contact ?>" class="button button--contact">お問い合わせへ</a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>



<!-- <div class="unit">
        <div class="unit__image"></div>
        <div class="unit__title"></div>
      </div> -->