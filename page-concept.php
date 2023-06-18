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
      <img src="<?php echo esc_url(get_theme_file_uri('../images/common/header4.jpg'))?>" alt="">
    </div>
    <div class="mv-sub__body">
      <h2 class="mv-sub__title">概念</h2>
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

<section class="sub-content top-sub">
  <div class="sub-content__inner inner">
    <div class="content-body sub-content__philosophy">
      <h3 class="content-body__title content-body__title--center">アイラウイスキーとは</h3>
      <p class="content-body__text content-body__text--center">
        「スコッチウイスキーの聖地」と呼ばれるアイラ島生まれのウイスキー
        アイラウイスキーは、スコッチウイスキーの6大産地のひとつアイラ島で生産されているシングルモルトウイスキーの総称です。「アイラモルト」とも呼ばれ、際立つ個性を持つ銘柄が多いことで知られています。
      </p>
    </div>
  </div>

  <div class="sub-content__contents sub-content__contents--top inner" id="concept1">
    <div class="sub-content__images">
      <img src="<?php echo esc_url(get_theme_file_uri('../images/common/concept2.jpg')) ?>" alt="">
    </div>
    <div class="content-body sub-content__body sub-content__body--right inner">
      <h3 class="content-body__title">スコッチウイスキーの聖地</h3>
      <p class="content-body__text">
        アイラウイスキーを育むアイラ島は、スコットランドの北西に連なるヘブリディーズ諸島の最南端に位置する島です。面積は約600平方キロメートルと日本の淡路島ほどの大きさで、島で暮らす約3,500人の住民の多くがウイスキー産業に携わっているといわれています。
        アイラ島は「スコッチの聖地」や「スコッチウイスキーの聖地」と呼ばれますが、この地にアードベッグやボウモア、ラフロイグ、ラガヴーリン、ブルックラディ（ブルイックラディ）、カリラ、ブナハーブン、キルホーマンと、スコッチウイスキーを代表する名門蒸溜所が集中しているからです。
      </p>
    </div>
  </div>
  <div class="sub-content__contents sub-content__contents--reverse inner" id="concept2">
    <div class="sub-content__images">
      <img src="<?php echo esc_url(get_theme_file_uri('../images/common/concept3.jpg')) ?>" alt="">
    </div>
    <div class="content-body sub-content__body sub-content__body--left inner">
      <h3 class="content-body__title">スモーキーなピート香とヨード香が特徴</h3>
      <p class="content-body__text">
      アイラ島は、島の約4分の1が厚いピート層で覆われた島で、古くから島の恵みともいえるピートがウイスキー造りに盛んに活用されてきました。スコッチウイスキーを象徴するピート香は、麦芽の乾燥時にピートを焚き込むことで生まれますが、ピートが豊富なアイラ島では、他の地域よりも比較的ピートの使用量が多いのが特徴です。
      それに加えて、ピート層を通過した水を仕込み水としている蒸溜所が多いため、ピート香の強い銘柄が目立ちます。
      また、海に囲まれたアイラ島のピートには、潮風によって運ばれた海藻などが多く含まれていて、これを麦芽の乾燥に用いることで、「潮風が香るヨード臭（ヨードチンキのような匂い）」や「クレゾールのような薬品臭」などと表現される、強烈なヨード香がもたらされています。
      </p>
    </div>
  </div>
  <div class="sub-content__contents inner" id="concept3">
    <div class="sub-content__images">
      <img src="<?php echo esc_url(get_theme_file_uri('../images/common/concept4.jpg')) ?>" alt="">
    </div>
    <div class="content-body sub-content__body sub-content__body--right inner">
      <h3 class="content-body__title">アイラウイスキーの歴史</h3>
      <p class="content-body__text">
        アイラ島では2022年1月現在、9つの蒸溜所が稼働しています。そのうち、もっとも古い蒸溜所は1779年創業のボウモア蒸溜所です。
        次いで19世紀になって、1815年にアードベッグ蒸溜所とラフロイグ蒸溜所、1816年にラガヴーリン蒸溜所、1846年にカリラ蒸溜所、1881年にブナハーブン蒸溜所とブルックラディ蒸溜所が創業。時代は下り、21世紀に入ってからも、2005年にキルホーマン蒸溜所、2018年にアードナッホー蒸溜所と、蒸溜所の新設が続いています。
        また、一度閉鎖されたポートエレン蒸溜所が近々再稼働する予定もあります。
      </p>
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