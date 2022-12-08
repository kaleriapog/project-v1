<?php
/* Template Name: Template Home */

get_header();

$subtitle_above_title_hero = get_field('subtitle_above_title_hero', $post->ID);
$title_hero = get_field('title_hero', $post->ID);
$subtitle_hero = get_field('subtitle_hero', $post->ID);
$buttons_hero = get_field('buttons_hero', $post->ID);
$image_hero = get_field('image_hero', $post->ID);
$title_logos = get_field('title_logos', $post->ID);
$logos = get_field('logos', $post->ID);

$title_awards = get_field('title_awards', $post->ID);
$subtitle_awards = get_field('subtitle_awards', $post->ID);
$list_awards = get_field('list_awards', $post->ID);

$items_interactive = get_field('items_interactive', $post->ID);

?>

<main id="primary" class="site-main">
    <section class="hero">
        <div class="main-size">
            <div class="hero__inner">
                <div class="headline">

                <?php if ( !empty($subtitle_above_title_hero)) : ?>

                    <span class="headline__above-title">

                        <?php echo $subtitle_above_title_hero; ?>

                    </span>

                    <?php endif ?>
                    <?php if ( !empty($title_hero)) : ?>

                    <h1 class="main-title hero__title">

                        <?php echo $title_hero; ?>

                    </h1>

                    <?php endif ?>
                    <?php if ( !empty($subtitle_hero)) : ?>

                    <div class="subtitle">

                        <?php echo $subtitle_hero; ?>

                    </div>

                     <?php endif ?>
                </div>

                <?php if ( !empty($buttons_hero)) : ?>

                <ul class="buttons_group">

                <?php
                    foreach ($buttons_hero as $item) :
                        $button = $item['button'];
                        $button_arrow = $item['button_arrow_hero'];
                        $button_color = $item['button_color_hero'];
                ?>

                <li>

                    <?php if(!empty($button_color) && !empty($button) && empty($button_arrow)) : ?>

                            <?php insertButton($button, 'main-button main-button-color'); ?>

                    <?php endif ?>
                    <?php if(empty($button_color) && !empty($button) && !empty($button_arrow)) : ?>

                            <?php insertButton($button, 'main-button main-button-arrow'); ?>

                    <?php endif ?>
                    <?php if(!empty($button_color) && !empty($button) && !empty($button_arrow)) : ?>

                            <?php insertButton($button, 'main-button main-button-color main-button-arrow'); ?>

                    <?php endif ?>

                </li>

                <?php endforeach; ?>

                </ul>

                <?php endif ?>

            </div>
        </div>

        <?php if(!empty($image_hero)) : ?>

            <div class="hero__image">

                <?php insertImage($image_hero, 'image'); ?>

            </div>

        <?php endif ?>

        <div class="main-size hero__logos">

            <?php if ( !empty($logos)) : ?>

            <h3 class="hero__logos-title"><?php echo $title_logos; ?></h3>

             <?php endif ?>

             <ul class="hero__logos-list">

                <?php
                    foreach ($logos as $item) :
                        $image = $item['logo'];
                ?>

                <li class="hero__logos-item">
                    <div class="hero__logos-item-image">

                        <?php insertImage($image, 'image'); ?>

                    </div>
                </li>

                <?php endforeach ?>

             </ul>
        </div>
    </section>
    <section class="section-awards">
        <div class="main-size">
            <div class="section-awards__inner">

                 <?php if ( !empty($subtitle_awards) || !empty($title_awards)) : ?>

                    <div class="headline">

                        <?php if ( !empty($title_awards)) : ?>

                            <h2 class="main-title"><?php echo $title_awards; ?></h2>

                        <?php endif ?>

                        <?php if ( !empty($subtitle_awards)) : ?>

                            <div class="subtitle">

                                <?php echo $subtitle_awards; ?>

                            </div>

                        <?php endif ?>

                    </div>

                 <?php endif ?>
                 <?php if ( !empty($list_awards)) : ?>

                     <ul class="section-awards__list">

                        <?php
                            foreach ($list_awards as $award) :
                                $image = $award['image_awards'];
                        ?>

                        <li class="section-awards__item">
                            <div class="section-awards__item-image">

                                <?php insertImage($image, 'image'); ?>

                            </div>
                        </li>

                        <?php endforeach ?>

                     </ul>

                 <?php endif ?>

            </div>
        </div>
    </section>

    <?php if ( !empty($items_interactive)) : ?>

    <section class="section-interactive">
        <div class="section-interactive__inner">
            <ul class="section-interactive__list">

                <?php foreach ($items_interactive as $key=>$items) :
                    $title = $items['title_interactive'];
                    $subtitle = $items['subtitle_interactive'];
                    $image = $items['image_interactive'];
                    $image_interactive_change = $items['image_interactive_change'];
                    $color = $items['color_interactive'];
                    $color_bg = $items['color_background_block_interactive'];
                    $dots = $items['dots'];
                    ?>

                <li class="section-interactive__item interactive-item-<?php echo $key ?>" style="z-index: <?php echo 50 - $key ?>; background-color: <?php echo $color_bg ?>;">
                    <div class="main-size">
                        <div class="section-interactive__item-inner">
                            <div class="headline">

                                <?php if ( !empty($title)) : ?>

                                    <h2 class="main-title compressed-title"><?php echo $title; ?></h2>

                                <?php endif ?>

                                <?php if ( !empty($subtitle)) : ?>

                                    <div class="subtitle">

                                        <?php echo $subtitle; ?>

                                    </div>

                                <?php endif ?>

                            </div>
                            <div class="section-interactive__item-image">
                                <div class="section-interactive__item-bg" style="background-color: <?php echo $color ?>;"></div>

                                <?php
                                    insertImage($image, 'image');

                                    if (!empty($dots)) :
                                        insertImage($image_interactive_change, 'image image-interactive-change');
                                    endif
                                ?>

                                <?php if (!empty($dots)) : ?>

                                <ul class="section-interactive__dots-list">

                                    <?php foreach ($dots as $key=>$item) :
                                        $title = $item['dot_title'];
                                        $dot_position_x = $item['dot_position_x'];
                                        $dot_position_y = $item['dot_position_y'];
                                        $dot_title_position = $item['dot_title_position'];
                                        ?>

                                        <li class="dot-content dot-content-<?php echo $key ?> dot-content-<?php echo $dot_title_position ?>" style="bottom: <?php echo $dot_position_y ?>%; left: <?php echo $dot_position_x ?>%; ">
                                            <div class="dot-content__icon">
                                                <div class="dot-content__icon-center">
                                                    <svg width="10" height="10" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="6.49976" cy="6.5" r="1.79348" fill="#2E85FE" stroke="#2E85FE" stroke-width="0.413043"/>
                                                        <circle cx="6.5" cy="6.5" r="5" stroke="#2E85FE" stroke-width="2"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="dot-content__text"><?php echo $title ?></div>
                                        </li>

                                    <?php endforeach ?>

                                </ul>

                                <?php endif ?>

                            </div>
                        </div>
                    </div>
                </li>

                <?php endforeach ?>

            </ul>
        </div>
    </section>

    <?php endif ?>

    <section class="trigger-margin" style="background-color: #0a4b78; height: 200vh"></section>

</main>


<?php get_footer(); ?>