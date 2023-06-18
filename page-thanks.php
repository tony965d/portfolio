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

<section class="thanks">
  <div class="thanks__inner inner">

    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="thanks__wrapper">
      <div class="thanks__title"><?php the_title(); ?></div>
      <div class="thanks__subtitle"><?php the_content(); ?></div>
      <div class="thanks__btn">
        <a href="<?php echo $home ?>" class="button">TOPへ</a>
      </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
  
<?php get_footer(); ?>


 <!-- <dl class="explain">
        <div class="explain__block">
          <dt class="explain__header">会社名</dt>
          <dd class="explain__description">テキストが入ります</dd>
        </div>
      </dl> -->