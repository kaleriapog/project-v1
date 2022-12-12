<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package project
 */

$button_header = get_field('link', 'options');
$button_color = get_field('color_button', 'options');

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body id="body" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'project' ); ?></a>

	<header id="masthead" class="site-header header">
	    <div class="main-size">
            <div class="header__inner">
                <div class="logo">
                    <?php
                    the_custom_logo();
                    ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-nav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'menu_id'        => 'primary-menu',
                            'menu_class'      => 'header__menu'
                        )
                    );
                    ?>

                     <div class="button-block button-block-mobile">

                        <?php if(!empty($button_color) && !empty($button_header)) : ?>

                            <div class="button__wrapper">

                                <?php insertButton($button_header, 'header__button main-button main-button-color'); ?>

                            </div>

                        <?php endif ?>

                        <?php if(empty($button_color) && !empty($button_header)) : ?>

                            <div>

                                <?php insertButton($button_header, 'header__button main-button'); ?>

                            </div>

                        <?php endif ?>

                     </div>
                </nav><!-- #site-navigation -->
                <div class="button-block button-block-desktop">

                    <?php if(!empty($button_color) && !empty($button_header)) : ?>

                        <div class="button__wrapper">

                            <?php insertButton($button_header, 'header__button main-button main-button-color'); ?>

                        </div>

                    <?php endif ?>

                    <?php if(empty($button_color) && !empty($button_header)) : ?>

                        <div class="monitor-section__image">

                            <?php insertButton($button_header, 'header__button main-button'); ?>

                        </div>

                    <?php endif ?>

                </div>

                <div class="menu-icon-wrapper"><div class="menu-icon"><span></span></div></div>
            </div>
		</div>
	</header><!-- #masthead -->
