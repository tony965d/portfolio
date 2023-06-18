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

<section class="mv-sub js-mv">
  <div class="mv-sub__inner">
  <div class="mv-sub__images">
    <div class="mv-sub__img">
      <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header9.jpg'))?>" alt="">
    </div>
    <div class="mv-sub__body">
      <h2 class="mv-sub__title">お酒</h2>
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

<section class="sub-works top-sub top-sub--page">
  <div class="sub-works__inner inner">
    <div class="categories sub-works__categories">
      <div class="categories__all">
        <a class="categories__all-btn is-active" href="<?php echo $liquor ?>">ALL</a>
      </div>
      
      <?php
      $args = [
        'taxonomy' => 'liquor_category',
        'hide_empty' => 0, 
      ];
        $terms = get_terms($args);
        
        if ( count( $terms ) != 0 ) {
          // タームのリスト $terms を $term に格納してループ
          foreach ( $terms as $term ) {
              // 投稿でタームのスラッグを選択していれば、currentを付与
              if ( is_object_in_term( $post->ID, 'liquor_category', $term->slug ) ) {
                  echo '<div class="categories__category"><a class="categories__category-bg is-active current" href="'.get_term_link($term).'">'.$term->name.'</a></div>';
              } else {
                  echo '<div class="categories__category"><a class="categories__category-bg is-active" href="'.get_term_link($term).'">'.$term->name.'</a></div>';
              }          
          }
        }
      ?>
    </div>  

  </div>
  <div class="sub-works__wrapper sub-works__wrapper-inner inner">
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

    <div class="unit sub-works__unit">
      <a href="<?php the_permalink(); ?>" class="unit__image">
        <p class="unit__category">
          <?php 
          $terms = get_the_terms($post->ID, 'liquor_category');
          foreach ($terms as $term) {
            echo $term->name ;
          }
          ?>
        </p>
        <?php if (has_post_thumbnail()) { ?>
          <?php the_post_thumbnail(''); ?>
        <?php } else { ?>
          <img src="<?php echo esc_url(get_theme_file_uri('../images/common/noimage.jpg')); ?>" alt="画像がありません">
        <?php } ?>
      </a>
      <span class="unit__title"><?php the_title(); ?></span>
    </div>

    <?php endwhile; ?>
    <?php endif;  ?>
    
  </div>

  <div class="page-nav inner">
    <?php if(function_exists("wp_pagenavi")) wp_pagenavi(); ?>
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