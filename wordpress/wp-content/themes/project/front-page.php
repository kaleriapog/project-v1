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
</main>


<?php get_footer(); ?>