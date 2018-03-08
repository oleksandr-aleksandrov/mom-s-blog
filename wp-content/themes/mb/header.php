<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MB
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


	<header class="site-header uk-container">

		<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>

			<div class="uk-navbar-left">
				<a class="uk-navbar-toggle" uk-toggle="target: #offcanvas-nav" uk-navbar-toggle-icon href="#"></a>
			</div>
			<div class="uk-navbar-right" uk-grid>
				<?php if (function_exists('mb_breadcrumbs')) mb_breadcrumbs(); ?>
			</div>
			<div id="offcanvas-nav" uk-offcanvas="overlay: true">
				<div class="uk-offcanvas-bar">

					<ul class="uk-nav uk-nav-default">
						<li class="uk-active"><a href="#">Active</a></li>
						<li class="uk-parent">
							<a href="#">Parent</a>
							<ul class="uk-nav-sub">
								<li><a href="#">Sub item</a></li>
								<li><a href="#">Sub item</a></li>
							</ul>
						</li>
						<li class="uk-nav-header">Header</li>
						<li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Item</a></li>
						<li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item</a></li>
						<li class="uk-nav-divider"></li>
						<li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
					</ul>

				</div>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<main>
