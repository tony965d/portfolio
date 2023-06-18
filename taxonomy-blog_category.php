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
      <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header7.jpg'))?>" alt="">
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

  
<section class="sub-blog top-sub top-sub--page">
  <div class="sub-blog__inner inner">

    <div class="categories sub-blog__categories">
      <div class="categories__all">
      <a class="categories__all-btn is-active" href="<?php echo $blog ?>">ALL</a>
      </div>
      <?php
        $args = [
          'taxonomy' => 'blog_category',
          'hide_empty' => 0, 
        ];
          $terms = get_terms($args);
          
          if ( count( $terms ) != 0 ) {
            // タームのリスト $terms を $term に格納してループ
            foreach ( $terms as $term ) {
                // 投稿でタームのスラッグを選択していれば、currentを付与
                if ( is_object_in_term( $post->ID, 'blog_category', $term->slug ) ) {
                    echo '<div class="categories__category"><a class="categories__category-bg is-active current" href="'.get_term_link($term).'">'.$term->name.'</a></div>';
                } else {
                    echo '<div class="categories__category"><a class="categories__category-bg is-active" href="'.get_term_link($term).'">'.$term->name.'</a></div>';
                }          
            }
          }
        ?>
    </div>  

    <div class="sub-blog__wrapper">
      <div class="blog__cards cards">
        
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        
        <a href="<?php the_permalink(); ?>" class="cards__item card">
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
            <?php if (has_post_thumbnail()) { ?>
              <?php the_post_thumbnail('blog'); ?>
              <?php } else { ?>
                <img src="<?php echo esc_url(get_theme_file_uri('../images/common/noimage.jpg')); ?>" alt="画像がありません">
            <?php } ?>
            <!-- <img src="<?php echo esc_url(get_theme_file_uri('../images/common/blog1.png')); ?>" alt="パソコンで何かのデータを映している画像です"> -->
          </div>

          <div class="card__contents">
            <div class="card__content">
              <h3 class="card__title"><?php the_title(); ?></h3>
              <div class="card__text">
                <?php
                  if ( mb_strlen( $post->post_content, 'UTF-8' ) > 26 ) {
                    $content = mb_substr( strip_tags( $post->post_content ), 0, 26, 'UTF-8' );
                    echo $content . '…';
                  } else {
                    echo strip_tags( $post->post_content );
                  }
                ?>
              </div>
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
        <?php endwhile; ?>
        <?php endif;  ?>
      </div>
    </div>

    <div class="page-nav page-nav--blog">
      <?php if(function_exists('wp_pagenavi')) wp_pagenavi();?>
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