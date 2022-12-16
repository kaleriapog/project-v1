<?php
/* Template Name: Template Home */

get_header();

$subtitle_above_title_hero = get_field('subtitle_above_title_hero', $post->ID);
$title_hero = get_field('title_hero', $post->ID);
$subtitle_hero = get_field('subtitle_hero', $post->ID);
$buttons_hero = get_field('buttons_hero', $post->ID);
$button = $buttons_hero['button'];
$button_arrow = $buttons_hero['button_arrow_hero'];
$button_color = $buttons_hero['button_color_hero'];
$link_before_meeting_code = $buttons_hero['link_before_meeting_code'];
$image_hero = get_field('image_hero', $post->ID);
$title_logos = get_field('title_logos', $post->ID);
$logos = get_field('logos', $post->ID);

$title_awards = get_field('title_awards', $post->ID);
$subtitle_awards = get_field('subtitle_awards', $post->ID);
$list_awards = get_field('list_awards', $post->ID);

$items_interactive = get_field('items_interactive', $post->ID);

$title_items = get_field('title_items', $post->ID);
$subtitle_items = get_field('subtitle_items', $post->ID);
$list_items_main = get_field('list_items_main', $post->ID);

$title_ratings = get_field('title_ratings', $post->ID);
$subtitle_ratings = get_field('subtitle_ratings', $post->ID);
$list_cards_ratings = get_field('list_cards_ratings', $post->ID);

$title_accordion = get_field('title_accordion', $post->ID);
$list_accordion = get_field('list_accordion', $post->ID);

$title_simple = get_field('title_simple', $post->ID);
$link_simple = get_field('link_simple', $post->ID);


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
                    <li>
                        <div class="hero__generate-link-meeting main-button">
                            <input class="hero__generate-link-meeting-input" data-link="<?php echo $link_before_meeting_code ?>" placeholder="Enter meeting code" type="text">
                            <button class="hero__generate-link-meeting-button" href="#">
                                <img class="image" src="<?php echo get_template_directory_uri() ?>/images/arrow.svg">
                            </button>
                        </div>
                    </li>
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

                <?php foreach ($items_interactive as $key=>$item) :
                    $title = $item['title_interactive'];
                    $subtitle = $item['subtitle_interactive'];
                    $image = $item['image_interactive'];
                    $image_interactive_change = $item['image_interactive_change'];
                    $color = $item['color_interactive'];
                    $color_bg = $item['color_background_block_interactive'];
                    $dots = $item['dots'];
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

                                <ul class="section-interactive__dots-list dots-list-desktop">

                                    <?php foreach ($dots as $key=>$item) :
                                        $title = $item['dot_title'];
                                        $dot_position_x = $item['dot_position_x'];
                                        $dot_position_y = $item['dot_position_y'];
                                        $dot_title_position = $item['dot_title_position'];
                                        ?>

                                        <li data-current="<?php echo $key ?>" class="dot-content dot-content-<?php echo $key ?> dot-content-<?php echo $dot_title_position ?>" style="bottom: <?php echo $dot_position_y ?>%; left: <?php echo $dot_position_x ?>%; ">
                                            <div class="dot-content__icon">
                                                <div class="dot-content__icon-center">
                                                    <svg width="20" height="20" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
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

                            <?php if (!empty($dots)) : ?>

                                <ul class="section-interactive__dots-list dots-list-mobile">

                                    <?php foreach ($dots as $key=>$item) :
                                        $title = $item['dot_title'];
                                        ?>

                                        <li data-current="<?php echo $key ?>" class="dot-content dot-content-<?php echo $key ?>">
                                            <div class="dot-content__text"><?php echo $title ?></div>
                                        </li>

                                    <?php endforeach ?>

                                </ul>

                            <?php endif ?>

                        </div>
                    </div>
                </li>

                <?php endforeach ?>

            </ul>
        </div>
    </section>

    <?php endif ?>

    <section class="section-items">
        <div class="main-size">
            <div class="section-items__inner">

                <?php if ( !empty($title_items) || !empty($subtitle_items)) : ?>

                    <div class="headline">

                        <?php if ( !empty($title_items)) : ?>

                            <h2 class="main-title"><?php echo $title_items; ?></h2>

                        <?php endif ?>

                        <?php if ( !empty($subtitle_items)) : ?>

                            <div class="subtitle">

                                <?php echo $subtitle_items; ?>

                            </div>

                        <?php endif ?>

                    </div>

                <?php endif ?>
                <?php if ( !empty($list_items_main)) : ?>

                    <ul class="section-items__items-list">

                        <?php foreach ($list_items_main as $key=>$item) :
                            $title = $item['title_item_main'];
                            $text = $item['text_item_main'];
                            $icon = $item['icon_item_main'];

                            ?>

                            <li class="section-items__item">
                                <div class="section-items__item-icon icon-block">
                                    <?php
                                    insertImage($icon, 'image icon');
                                    ?>
                                </div>
                                <h3 class="section-items__item-title title-small"><?php echo $title; ?></h3>
                                <div class="section-items__item-text"><?php echo $text; ?></div>
                            </li>

                        <?php endforeach ?>

                    </ul>

                 <?php endif ?>

            </div>
        </div>
    </section>
    <section class="section-ratings">
        <div class="main-size">
            <div class="section-ratings__inner">

                <?php if ( !empty($title_ratings) || !empty($subtitle_ratings)) : ?>

                    <div class="headline">

                        <?php if ( !empty($title_ratings)) : ?>

                            <h2 class="main-title"><?php echo $title_ratings; ?></h2>

                        <?php endif ?>

                        <?php if ( !empty($subtitle_ratings)) : ?>

                            <div class="subtitle">

                                <?php echo $subtitle_ratings; ?>

                            </div>

                        <?php endif ?>

                    </div>

                <?php endif ?>
                <?php if ( !empty($list_cards_ratings)) : ?>

                    <div class="slider-ratings-block">
                        <div class="slider-button-prev">
                            <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.7143 20.5714L5.14286 12L13.7143 3.42857L12 0L6.67572e-06 12L12 24L13.7143 20.5714Z" fill="#C3C9E2"/>
                            </svg>

                        </div>
                        <div class="swiper slider-ratings">
                            <ul class="section-ratings__cards swiper-wrapper">

                            <?php foreach ($list_cards_ratings as $key=>$card) :
                                $card_rating = $card['card_rating'];
                                $card_link_rating = $card['card_link_rating'];
                                $logo = $card['card_logo_rating'];
                                ?>

                                <li class="section-ratings__card swiper-slide">
                                    <div class="section-ratings__card__inner">
                                        <div class="section-ratings__card-logo">

                                            <?php
                                                insertImage($logo, 'image');
                                            ?>

                                        </div>
                                        <div class="section-ratings__card-rating" data-rating="<?php echo $card_rating; ?>">
                                            <span><?php echo $card_rating; ?></span>
                                            <div class="ratings-icon">
                                                <svg class="ratings-icon__fill" width="116" height="20" viewBox="0 0 116 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99782 1.4585C10.2358 1.45789 10.4535 1.59248 10.5593 1.80564L12.994 6.71129L18.4235 7.50299C18.6586 7.53727 18.8539 7.70188 18.9276 7.92777C19.0012 8.15365 18.9404 8.40175 18.7706 8.56798L14.8217 12.4354L15.7596 17.8094C15.8007 18.0447 15.704 18.2828 15.5106 18.423C15.3172 18.5631 15.0608 18.5807 14.85 18.4684L9.99946 15.8831L5.15003 18.4684C4.93911 18.5808 4.68252 18.5631 4.48904 18.4228C4.29555 18.2824 4.19906 18.044 4.24045 17.8086L5.18524 12.4354L1.22976 8.56836C1.05974 8.40215 0.998761 8.15386 1.07244 7.92779C1.14611 7.70173 1.34168 7.53704 1.57698 7.50292L7.0362 6.7113L9.43816 1.80852C9.54286 1.59481 9.75984 1.45911 9.99782 1.4585ZM10.0031 3.49668L8.0136 7.55747C7.92279 7.74283 7.74631 7.87141 7.54203 7.90103L3.00779 8.55852L6.2948 11.772C6.44232 11.9163 6.50917 12.124 6.47344 12.3272L5.69365 16.762L9.7054 14.6233C9.88916 14.5253 10.1096 14.5253 10.2934 14.6233L14.3081 16.7631L13.5337 12.3264C13.4983 12.1236 13.5651 11.9164 13.7121 11.7724L16.9945 8.55784L12.4895 7.90096C12.2866 7.87136 12.1111 7.74407 12.0199 7.56035L10.0031 3.49668Z" fill="#FEB043"/>
                                                    <path d="M12.5 7.5L10 2.5L7.5 7L2.5 8L2 8.5L6 12.5L5 17.5L10 15L15 17.5L14 12L17.5 8.5V8L12.5 7.5Z" fill="#FEB043"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M33.9978 1.4585C34.2358 1.45789 34.4535 1.59248 34.5593 1.80564L36.994 6.71129L42.4235 7.50299C42.6586 7.53727 42.8539 7.70188 42.9276 7.92777C43.0012 8.15365 42.9404 8.40175 42.7706 8.56798L38.8217 12.4354L39.7596 17.8094C39.8007 18.0447 39.704 18.2828 39.5106 18.423C39.3172 18.5631 39.0608 18.5807 38.85 18.4684L33.9995 15.8831L29.15 18.4684C28.9391 18.5808 28.6825 18.5631 28.489 18.4228C28.2956 18.2824 28.1991 18.044 28.2405 17.8086L29.1852 12.4354L25.2298 8.56836C25.0597 8.40215 24.9988 8.15386 25.0724 7.92779C25.1461 7.70173 25.3417 7.53704 25.577 7.50292L31.0362 6.7113L33.4382 1.80852C33.5429 1.59481 33.7598 1.45911 33.9978 1.4585ZM34.0031 3.49668L32.0136 7.55747C31.9228 7.74283 31.7463 7.87141 31.542 7.90103L27.0078 8.55852L30.2948 11.772C30.4423 11.9163 30.5092 12.124 30.4734 12.3272L29.6937 16.762L33.7054 14.6233C33.8892 14.5253 34.1096 14.5253 34.2934 14.6233L38.3081 16.7631L37.5337 12.3264C37.4983 12.1236 37.5651 11.9164 37.7121 11.7724L40.9945 8.55784L36.4895 7.90096C36.2866 7.87136 36.1111 7.74407 36.0199 7.56035L34.0031 3.49668Z" fill="#FEB043"/>
                                                    <path d="M36.5 7.5L34 2.5L31.5 7L26.5 8L26 8.5L30 12.5L29 17.5L34 15L39 17.5L38 12L41.5 8.5V8L36.5 7.5Z" fill="#FEB043"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M57.9978 1.4585C58.2358 1.45789 58.4535 1.59248 58.5593 1.80564L60.994 6.71129L66.4235 7.50299C66.6586 7.53727 66.8539 7.70188 66.9276 7.92777C67.0012 8.15365 66.9404 8.40175 66.7706 8.56798L62.8217 12.4354L63.7596 17.8094C63.8007 18.0447 63.704 18.2828 63.5106 18.423C63.3172 18.5631 63.0608 18.5807 62.85 18.4684L57.9995 15.8831L53.15 18.4684C52.9391 18.5808 52.6825 18.5631 52.489 18.4228C52.2956 18.2824 52.1991 18.044 52.2405 17.8086L53.1852 12.4354L49.2298 8.56836C49.0597 8.40215 48.9988 8.15386 49.0724 7.92779C49.1461 7.70173 49.3417 7.53704 49.577 7.50292L55.0362 6.7113L57.4382 1.80852C57.5429 1.59481 57.7598 1.45911 57.9978 1.4585ZM58.0031 3.49668L56.0136 7.55747C55.9228 7.74283 55.7463 7.87141 55.542 7.90103L51.0078 8.55852L54.2948 11.772C54.4423 11.9163 54.5092 12.124 54.4734 12.3272L53.6937 16.762L57.7054 14.6233C57.8892 14.5253 58.1096 14.5253 58.2934 14.6233L62.3081 16.7631L61.5337 12.3264C61.4983 12.1236 61.5651 11.9164 61.7121 11.7724L64.9945 8.55784L60.4895 7.90096C60.2866 7.87136 60.1111 7.74407 60.0199 7.56035L58.0031 3.49668Z" fill="#FEB043"/>
                                                    <path d="M60.5 7.5L58 2.5L55.5 7L50.5 8L50 8.5L54 12.5L53 17.5L58 15L63 17.5L62 12L65.5 8.5V8L60.5 7.5Z" fill="#FEB043"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M81.9978 1.4585C82.2358 1.45789 82.4534 1.59248 82.5592 1.80564L84.9939 6.71129L90.4235 7.50299C90.6586 7.53727 90.8539 7.70188 90.9275 7.92777C91.0012 8.15365 90.9404 8.40175 90.7706 8.56798L86.8216 12.4354L87.7596 17.8094C87.8007 18.0447 87.704 18.2828 87.5106 18.423C87.3171 18.5631 87.0607 18.5807 86.8499 18.4684L81.9994 15.8831L77.15 18.4684C76.9391 18.5808 76.6825 18.5631 76.489 18.4228C76.2955 18.2824 76.199 18.044 76.2404 17.8086L77.1852 12.4354L73.2297 8.56836C73.0597 8.40215 72.9987 8.15386 73.0724 7.92779C73.1461 7.70173 73.3416 7.53704 73.577 7.50292L79.0362 6.7113L81.4381 1.80852C81.5428 1.59481 81.7598 1.45911 81.9978 1.4585ZM82.003 3.49668L80.0136 7.55747C79.9228 7.74283 79.7463 7.87141 79.542 7.90103L75.0078 8.55852L78.2948 11.772C78.4423 11.9163 78.5091 12.124 78.4734 12.3272L77.6936 16.762L81.7054 14.6233C81.8891 14.5253 82.1096 14.5253 82.2934 14.6233L86.3081 16.7631L85.5337 12.3264C85.4983 12.1236 85.565 11.9164 85.7121 11.7724L88.9945 8.55784L84.4895 7.90096C84.2865 7.87136 84.111 7.74407 84.0198 7.56035L82.003 3.49668Z" fill="#FEB043"/>
                                                    <path d="M84.5 7.5L82 2.5L79.5 7L74.5 8L74 8.5L78 12.5L77 17.5L82 15L87 17.5L86 12L89.5 8.5V8L84.5 7.5Z" fill="#FEB043"/>
                                                    <g clip-path="url(#clip0_0_2398)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M105.998 1.4585C106.236 1.45789 106.453 1.59248 106.559 1.80564L108.994 6.71129L114.423 7.50299C114.659 7.53727 114.854 7.70188 114.928 7.92777C115.001 8.15365 114.94 8.40175 114.771 8.56798L110.822 12.4354L111.76 17.8094C111.801 18.0447 111.704 18.2828 111.511 18.423C111.317 18.5631 111.061 18.5807 110.85 18.4684L105.999 15.8831L101.15 18.4684C100.939 18.5808 100.682 18.5631 100.489 18.4228C100.296 18.2824 100.199 18.044 100.24 17.8086L101.185 12.4354L97.2297 8.56836C97.0597 8.40215 96.9987 8.15386 97.0724 7.92779C97.1461 7.70173 97.3416 7.53704 97.577 7.50292L103.036 6.7113L105.438 1.80852C105.543 1.59481 105.76 1.45911 105.998 1.4585ZM106.003 3.49668L104.014 7.55747C103.923 7.74283 103.746 7.87141 103.542 7.90103L99.0078 8.55852L102.295 11.772C102.442 11.9163 102.509 12.124 102.473 12.3272L101.694 16.762L105.705 14.6233C105.889 14.5253 106.11 14.5253 106.293 14.6233L110.308 16.7631L109.534 12.3264C109.498 12.1236 109.565 11.9164 109.712 11.7724L112.994 8.55784L108.49 7.90096C108.287 7.87136 108.111 7.74407 108.02 7.56035L106.003 3.49668Z" fill="#FEB043"/>
                                                        <path d="M106 15V3L103.5 7L98 8L102 12L101 17.5L106 15Z" fill="#FEB043"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M105.998 1.4585C106.236 1.45789 106.453 1.59248 106.559 1.80564L108.994 6.71129L114.423 7.50299C114.659 7.53727 114.854 7.70188 114.928 7.92777C115.001 8.15365 114.94 8.40175 114.771 8.56798L110.822 12.4354L111.76 17.8094C111.801 18.0447 111.704 18.2828 111.511 18.423C111.317 18.5631 111.061 18.5807 110.85 18.4684L105.999 15.8831L101.15 18.4684C100.939 18.5808 100.682 18.5631 100.489 18.4228C100.296 18.2824 100.199 18.044 100.24 17.8086L101.185 12.4354L97.2297 8.56836C97.0597 8.40215 96.9987 8.15386 97.0724 7.92779C97.1461 7.70173 97.3416 7.53704 97.577 7.50292L103.036 6.7113L105.438 1.80852C105.543 1.59481 105.76 1.45911 105.998 1.4585ZM106.003 3.49668L104.014 7.55747C103.923 7.74283 103.746 7.87141 103.542 7.90103L99.0078 8.55852L102.295 11.772C102.442 11.9163 102.509 12.124 102.473 12.3272L101.694 16.762L105.705 14.6233C105.889 14.5253 106.11 14.5253 106.293 14.6233L110.308 16.7631L109.534 12.3264C109.498 12.1236 109.565 11.9164 109.712 11.7724L112.994 8.55784L108.49 7.90096C108.287 7.87136 108.111 7.74407 108.02 7.56035L106.003 3.49668Z" fill="#FEB043"/>
                                                        <path d="M108.5 7.5L106 2.5L103.5 7L98.5 8L98 8.5L102 12.5L101 17.5L106 15L111 17.5L110 12L113.5 8.5V8L108.5 7.5Z" fill="#FEB043"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_0_2398">
                                                            <rect width="20" height="20" fill="white" transform="translate(96)"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <svg class="ratings-icon__empty" width="116" height="20" viewBox="0 0 116 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99782 1.4585C10.2358 1.45789 10.4535 1.59248 10.5593 1.80564L12.994 6.71129L18.4235 7.50299C18.6586 7.53727 18.8539 7.70188 18.9276 7.92777C19.0012 8.15365 18.9404 8.40175 18.7706 8.56798L14.8217 12.4354L15.7596 17.8094C15.8007 18.0447 15.704 18.2828 15.5106 18.423C15.3172 18.5631 15.0608 18.5807 14.85 18.4684L9.99946 15.8831L5.15003 18.4684C4.93911 18.5808 4.68252 18.5631 4.48904 18.4228C4.29555 18.2824 4.19906 18.044 4.24045 17.8086L5.18524 12.4354L1.22976 8.56836C1.05974 8.40215 0.998761 8.15386 1.07244 7.92779C1.14611 7.70173 1.34168 7.53704 1.57698 7.50292L7.0362 6.7113L9.43816 1.80852C9.54286 1.59481 9.75984 1.45911 9.99782 1.4585ZM10.0031 3.49668L8.0136 7.55747C7.92279 7.74283 7.74631 7.87141 7.54203 7.90103L3.00779 8.55852L6.2948 11.772C6.44232 11.9163 6.50917 12.124 6.47344 12.3272L5.69365 16.762L9.7054 14.6233C9.88916 14.5253 10.1096 14.5253 10.2934 14.6233L14.3081 16.7631L13.5337 12.3264C13.4983 12.1236 13.5651 11.9164 13.7121 11.7724L16.9945 8.55784L12.4895 7.90096C12.2866 7.87136 12.1111 7.74407 12.0199 7.56035L10.0031 3.49668Z" fill="#FEB043"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M33.9978 1.4585C34.2358 1.45789 34.4534 1.59248 34.5592 1.80564L36.9939 6.71129L42.4235 7.50299C42.6586 7.53727 42.8539 7.70188 42.9275 7.92777C43.0012 8.15365 42.9404 8.40175 42.7706 8.56798L38.8216 12.4354L39.7596 17.8094C39.8007 18.0447 39.704 18.2828 39.5106 18.423C39.3171 18.5631 39.0607 18.5807 38.8499 18.4684L33.9994 15.8831L29.15 18.4684C28.9391 18.5808 28.6825 18.5631 28.489 18.4228C28.2955 18.2824 28.199 18.044 28.2404 17.8086L29.1852 12.4354L25.2297 8.56836C25.0597 8.40215 24.9987 8.15386 25.0724 7.92779C25.1461 7.70173 25.3416 7.53704 25.577 7.50292L31.0362 6.7113L33.4381 1.80852C33.5428 1.59481 33.7598 1.45911 33.9978 1.4585ZM34.003 3.49668L32.0136 7.55747C31.9228 7.74283 31.7463 7.87141 31.542 7.90103L27.0078 8.55852L30.2948 11.772C30.4423 11.9163 30.5091 12.124 30.4734 12.3272L29.6936 16.762L33.7054 14.6233C33.8891 14.5253 34.1096 14.5253 34.2934 14.6233L38.3081 16.7631L37.5337 12.3264C37.4983 12.1236 37.565 11.9164 37.7121 11.7724L40.9945 8.55784L36.4895 7.90096C36.2865 7.87136 36.111 7.74407 36.0198 7.56035L34.003 3.49668Z" fill="#FEB043"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M57.9978 1.4585C58.2358 1.45789 58.4534 1.59248 58.5592 1.80564L60.9939 6.71129L66.4235 7.50299C66.6586 7.53727 66.8539 7.70188 66.9275 7.92777C67.0012 8.15365 66.9404 8.40175 66.7706 8.56798L62.8216 12.4354L63.7596 17.8094C63.8007 18.0447 63.704 18.2828 63.5106 18.423C63.3171 18.5631 63.0607 18.5807 62.8499 18.4684L57.9994 15.8831L53.15 18.4684C52.9391 18.5808 52.6825 18.5631 52.489 18.4228C52.2955 18.2824 52.199 18.044 52.2404 17.8086L53.1852 12.4354L49.2297 8.56836C49.0597 8.40215 48.9987 8.15386 49.0724 7.92779C49.1461 7.70173 49.3416 7.53704 49.577 7.50292L55.0362 6.7113L57.4381 1.80852C57.5428 1.59481 57.7598 1.45911 57.9978 1.4585ZM58.003 3.49668L56.0136 7.55747C55.9228 7.74283 55.7463 7.87141 55.542 7.90103L51.0078 8.55852L54.2948 11.772C54.4423 11.9163 54.5091 12.124 54.4734 12.3272L53.6936 16.762L57.7054 14.6233C57.8891 14.5253 58.1096 14.5253 58.2934 14.6233L62.3081 16.7631L61.5337 12.3264C61.4983 12.1236 61.565 11.9164 61.7121 11.7724L64.9945 8.55784L60.4895 7.90096C60.2865 7.87136 60.111 7.74407 60.0198 7.56035L58.003 3.49668Z" fill="#FEB043"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M81.9978 1.4585C82.2358 1.45789 82.4534 1.59248 82.5592 1.80564L84.9939 6.71129L90.4235 7.50299C90.6586 7.53727 90.8539 7.70188 90.9275 7.92777C91.0012 8.15365 90.9404 8.40175 90.7706 8.56798L86.8216 12.4354L87.7596 17.8094C87.8007 18.0447 87.704 18.2828 87.5106 18.423C87.3171 18.5631 87.0607 18.5807 86.8499 18.4684L81.9994 15.8831L77.15 18.4684C76.9391 18.5808 76.6825 18.5631 76.489 18.4228C76.2955 18.2824 76.199 18.044 76.2404 17.8086L77.1852 12.4354L73.2297 8.56836C73.0597 8.40215 72.9987 8.15386 73.0724 7.92779C73.1461 7.70173 73.3416 7.53704 73.577 7.50292L79.0362 6.7113L81.4381 1.80852C81.5428 1.59481 81.7598 1.45911 81.9978 1.4585ZM82.003 3.49668L80.0136 7.55747C79.9228 7.74283 79.7463 7.87141 79.542 7.90103L75.0078 8.55852L78.2948 11.772C78.4423 11.9163 78.5091 12.124 78.4734 12.3272L77.6936 16.762L81.7054 14.6233C81.8891 14.5253 82.1096 14.5253 82.2934 14.6233L86.3081 16.7631L85.5337 12.3264C85.4983 12.1236 85.565 11.9164 85.7121 11.7724L88.9945 8.55784L84.4895 7.90096C84.2865 7.87136 84.111 7.74407 84.0198 7.56035L82.003 3.49668Z" fill="#FEB043"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M105.998 1.4585C106.236 1.45789 106.453 1.59248 106.559 1.80564L108.994 6.71129L114.423 7.50299C114.659 7.53727 114.854 7.70188 114.928 7.92777C115.001 8.15365 114.94 8.40175 114.771 8.56798L110.822 12.4354L111.76 17.8094C111.801 18.0447 111.704 18.2828 111.511 18.423C111.317 18.5631 111.061 18.5807 110.85 18.4684L105.999 15.8831L101.15 18.4684C100.939 18.5808 100.682 18.5631 100.489 18.4228C100.296 18.2824 100.199 18.044 100.24 17.8086L101.185 12.4354L97.2297 8.56836C97.0597 8.40215 96.9987 8.15386 97.0724 7.92779C97.1461 7.70173 97.3416 7.53704 97.577 7.50292L103.036 6.7113L105.438 1.80852C105.543 1.59481 105.76 1.45911 105.998 1.4585ZM106.003 3.49668L104.014 7.55747C103.923 7.74283 103.746 7.87141 103.542 7.90103L99.0078 8.55852L102.295 11.772C102.442 11.9163 102.509 12.124 102.473 12.3272L101.694 16.762L105.705 14.6233C105.889 14.5253 106.11 14.5253 106.293 14.6233L110.308 16.7631L109.534 12.3264C109.498 12.1236 109.565 11.9164 109.712 11.7724L112.994 8.55784L108.49 7.90096C108.287 7.87136 108.111 7.74407 108.02 7.56035L106.003 3.49668Z" fill="#FEB043"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="section-ratings__card-link">

                                            <?php insertButton($card_link_rating, 'section-items__item-link'); ?>

                                        </div>
                                    </div>
                                </li>

                            <?php endforeach ?>

                        </ul>
                        </div>
                        <div class="slider-button-next">
                            <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.7143 20.5714L5.14286 12L13.7143 3.42857L12 0L6.67572e-06 12L12 24L13.7143 20.5714Z" fill="#C3C9E2"/>
                            </svg>

                        </div>
                    </div>
                    <div class="swiper-pagination"></div>

                <?php endif ?>

            </div>
        </div>
    </section>
    <section class="section-accordion">
        <div class="main-size">
            <div class="section-accordion__inner">
                <div class="headline">

                    <?php if ( !empty($title_accordion)) : ?>

                        <h2 class="main-title"><?php echo $title_accordion; ?></h2>

                    <?php endif ?>

                </div>

                <?php if ( !empty($list_accordion)) : ?>

                <ul class="section-accordion__list">

                    <?php foreach ($list_accordion as $key=>$item) :
                        $title = $item['title_item_accordion'];
                        $description = $item['description_item_accordion'];
                        ?>

                        <li class="section-accordion__item">
                            <div class="accordion-item__headline">
                                <h3 class="accordion-item__title"><?php echo $title; ?></h3>
                                <svg class="accordion-item__icon" width="20" height="11" viewBox="0 0 20 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.50002 0.424805L10 6.92481L16.5 0.424805L19.1 1.7248L10 10.8248L0.900024 1.7248L3.50002 0.424805Z" fill="#455475"/>
                                </svg>
                            </div>
                            <div class="accordion-item__description">
                                <div class="accordion-item__description-inner">

                                    <?php echo $description; ?>

                                </div>
                            </div>

                        </li>

                    <?php endforeach ?>
                </ul>

                <?php endif ?>
            </div>
        </div>
    </section>
    <section class="section-simple">
        <div class="main-size-large">
            <div class="section-simple__inner">

                <?php if ( !empty($title_simple)) : ?>

                    <h2 class="main-title-small"><?php echo $title_simple; ?></h2>

                <?php endif ?>

                <div class="button-group">

                    <?php insertButton($link_simple, 'main-button main-button-white'); ?>

                </div>
            </div>
            <div class="section-simple__decor">
                <div class="section-simple__decor-grid-left">
                    <img alt="decor" src="<?php echo get_template_directory_uri() ?>/images/grid-img-0.webp">
                </div>
                <div class="section-simple__decor-grid-right">
                    <img alt="decor" src="<?php echo get_template_directory_uri() ?>/images/grid-img-1.webp">
                </div>
                <div class="section-simple__decor-left">
                    <img alt="decor" src="<?php echo get_template_directory_uri() ?>/images/decor-image-0.webp">
                </div>
                <div class="section-simple__decor-right">
                    <img alt="decor" src="<?php echo get_template_directory_uri() ?>/images/decor-image-1.webp">
                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>