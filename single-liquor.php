<?php get_header(); ?>

  <?php 
    $home = esc_url(home_url('/'));
    $news = esc_url(home_url( '/news' ));
    $concept = esc_url(home_url( '/concept' ));
    $liquor = esc_url(home_url( '/liquor' ));
    $about = esc_url(home_url( '/about' ));
    $blog = esc_url(home_url( '/blog' ));
    $contact = esc_url(home_url( '/contact' ));
  ?>

<div class="wp-breadcrumb wp-breadcrumb--works inner">
  <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
  
<section class="single-works top-works--single">
  <div class="single-works__inner inner">
    
    <div class="single-works__tittle">
      <h2 class="single-works__text"><?php the_title(); ?></h2>
    </div>

    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="card__body card__body--single single-works__card">
      <time datetime="<?php the_time('Y.m.d'); ?>" class="card__date--single"><?php the_time('Y.m.d'); ?></time>
      <div class="card__category card__category--single">
        <?php 
          $terms = get_the_terms($post->ID,'liquor_category') ;
          foreach($terms as $term) {
            echo $term->name ;
          }
          ?>
      </div>
    </div>
    
    <?php endwhile; ?>
    <?php endif;  ?>

  </div>
  <div class="single-works__images inner">
    <div class="single-works__wrapper">
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
      <div class="swiper js-works-swiperMain">
        <div class="swiper-wrapper">

        <?php
          $img = SCF::get('img');
          foreach ($img as $fields) { 
              $imgurl = wp_get_attachment_image_src($fields['img_liquor'] , 'full');          
        ?>
          <div class="swiper-slide single-works__image"><img src="<?php echo $imgurl[0]; ?>" alt="" /></div>
        <?php }; ?>


        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div> 

      <div class="swiper js-works-swiperThumbnail swiper-space swiperThumbnail">
        <div class="swiper-wrapper">

        <?php
          $img = SCF::get('img');
          foreach ($img as $fields) { 
              $imgurl = wp_get_attachment_image_src($fields['img_liquor'] , 'full');          
        ?>
          <div class="swiper-slide single-works__image single-works__image--size"><img src="<?php echo $imgurl[0]; ?>" alt="" /></div>
          
        <?php }; ?>

        </div>
      </div>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
    
  <div class="single-works__box inner">
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>

    <?php
      $point = SCF::get('point');
      foreach ($point as $fields ) { ?>

    
    <div class="point single-works__point">
      <span class="point__title"><?php echo $fields['point_title']; ?></span>
      <p class="point__text"><?php echo $fields['point_text']; ?></p>
    </div>

    <?php }; ?>

    <!-- <div class="point">
      <span class="point__title">制作のポイント</span>
      <p class="point__text"><?php the_field('works_detail'); ?></p>
    </div>

    <div class="point">
      <span class="point__title">デザインのポイント</span>
      <p class="point__text"><?php the_field('design_detail'); ?></p>
    </div>

    <div class="point">
      <span class="point__title">その他</span>
      <p class="point__text"><?php the_field('other_detail'); ?></p>
    </div> -->

    <?php endwhile; ?>
    <?php endif; ?>


  </div>
    
    
  <div class="page-nav page-nav--single inner">
    <p class="page-nav__left page-nav__sub">
      <?php next_post_link('%link', 'NEXT'); ?>
    </p>
    <p class="page-nav__top page-nav__sub">
        <a href="<?php echo $works ?>">一覧</a>
    </p>
    <p class="page-nav__right page-nav__sub">
      <?php previous_post_link('%link', 'PREV'); ?>
    </p>
  </div>
  
</section>
  


<section class="blog top-blog--single">
  <div class="blog__inner inner">

    <div class="blog__wrapper">
      <div class="related">
        <p class="related__title">関連記事</p>
      </div>
      <div class="blog__cards cards">
        
      
      <?php
        $terms = get_the_terms($post->ID,'works_category');
        foreach( $terms as $term ) {
          $term_slug = $term->slug; // 現在表示している投稿が所属しているタームを取得
        }

        $blog_query = new WP_Query(
          array(
            'post_type' => 'blog',
            'taxonomy' => 'blog_category',
            'term' => $term_slug,
            'posts_per_page' => 4,
            'orderby' => 'rand',
          )
        );
      ?>

        <?php if ( $blog_query->have_posts() ) : ?>
        <?php while ( $blog_query->have_posts() ) : ?>
        <?php $blog_query->the_post(); ?>
        
        <a href="<?php the_permalink(); ?>" class="cards__item card cards__item--single">

          <div class="card__img card__img--single">
            <?php if (has_post_thumbnail()) { ?>
              <?php the_post_thumbnail('blog_category'); ?>
              <?php } else { ?>
                <img src="<?php echo esc_url(get_theme_file_uri('../images/common/noimage.jpg')); ?>" alt="画像がありません">
            <?php } ?>
            <!-- <img src="<?php echo esc_url(get_theme_file_uri('../images/common/blog1.png')); ?>" alt="パソコンで何かのデータを映している画像です"> -->
          </div>

          <div class="card__contents card__contents--single">
            <div class="card__content">
              <h3 class="card__title card__title--single"><?php the_title(); ?></h3>
            </div>
            <div class="card__text u-mobile">
              <?php
                if ( mb_strlen( $post->post_content, 'UTF-8' ) > 26 ) {
                  $content = mb_substr( strip_tags( $post->post_content ), 0, 26, 'UTF-8' );
                  echo $content . '…';
                } else {
                  echo strip_tags( $post->post_content );
                }
              ?>
              </div>
            <div class="card__body">
              <div class="card__category">
                <?php
                $terms = get_the_terms($post->ID, 'blog_category');
                foreach ($terms as $term) {
                  echo $term->name ;
                }
                ?>
              </div>
              <time datetime="<?php the_time('Y.m.d'); ?>" class="card__date"><?php the_time('Y.m.d'); ?></time>
            </div>
          </div>
        </a>
        <?php wp_reset_postdata(); ?>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
      
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

