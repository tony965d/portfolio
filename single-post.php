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
  
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<section class="single top-single">
  <div class="single__inner inner">
    <div class="single__sub-tittle">
      <h2 class="single__text"><?php the_title(); ?></h2>
    </div>

    <div class="card__body card__body--single">
      <time datetime="<?php the_time('Y.m.d'); ?>" class="card__date--single"><?php the_time('Y.m.d'); ?></time>
      <div class="card__category card__category--single">
        <?php 
          $terms = get_the_terms( $post->ID,'category');
          foreach($terms as $term) {
            echo $term->name ;
          }
          ?>
      </div>
    </div>
    
  </div>


    
  <div class="single__thumbnail inner">
    <div class="single__thumbnail-image">
      <?php if (has_post_thumbnail()) { ?>
        <?php the_post_thumbnail(); ?>
        <?php } ?>
    </div>
  </div> 
  <div class="single__post">
    <div class="single__body inner">
      <?php the_content(); ?>
    </div>
  </div>
      
  
  <div class="page-nav page-nav--single">
    <p class="page-nav__left page-nav__sub">
      <?php next_post_link('%link', 'NEXT'); ?>
    </p>
    <p class="page-nav__top page-nav__sub">
      <a href="<?php echo $news ?>">一覧</a>
    </p>
    <p class="page-nav__right page-nav__sub">
      <?php previous_post_link('%link', 'PREV'); ?>
    </p>
  </div>

</section>

<?php endwhile; ?>
<?php endif; ?>

<section class="blog top-blog--single">
  <div class="blog__inner inner">

    <div class="blog__wrapper">
      <div class="related">
        <p class="related__title u-desktop">関連記事</p>
        <p class="related__title related__title--mobile u-mobile">おすすめ記事</p>
      </div>
      <div class="blog__cards blog__cards--single cards">
        
        <?php
          $blog_query = new WP_Query(
            array(
              'post_type'      => 'blog',
              'taxonomy' => 'blog_category',
              'posts_per_page' => 4,
            )
          );
        ?>
        <?php if ( $blog_query->have_posts() ) : ?>
        <?php while ( $blog_query->have_posts() ) : ?>
        <?php $blog_query->the_post(); ?>
        
        <a href="<?php the_permalink(); ?>" class="cards__item card cards__item--single">

          <div class="card__img card__img--single">
            <?php if (has_post_thumbnail()) { ?>
              <?php the_post_thumbnail(); ?>
              <?php } else { ?>
                <img src="<?php echo esc_url(get_theme_file_uri('../images/common/noimage.jpg')); ?>" alt="画像がありません">
            <?php } ?>
          </div>

          <div class="card__contents card__contents--single">
            <div class="card__content">
              <h3 class="card__title card__title--single"><?php the_title(); ?></h3>
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
              <time datetime="<?php the_time('Y.m.d') ?>" class="card__date"><?php the_time('Y.m.d'); ?></time>
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

