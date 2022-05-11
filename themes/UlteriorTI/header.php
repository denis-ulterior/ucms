<!doctype html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<title><?php echo page_title('A página não foi encontrada'); ?> - <?php echo site_name(); ?></title>
		<meta name="description" content="<?php echo site_description(); ?>">
		<link rel="stylesheet" href="<?php echo theme_url('/css/reset.css'); ?>">
		<link rel="stylesheet" href="<?php echo theme_url('/css/style.css'); ?>">
		<!--<link rel="stylesheet" href="<?php echo theme_url('/css/small.css'); ?>" media="(max-width: 400px)">-->
		<link rel="stylesheet" href="/ucms/themes/UlteriorTI/css/bootstrap.min.css">
		<script src="/ucms/themes/UlteriorTI/js/bootstrap.min.js"></script>
		<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">
		<link rel="shortcut icon" href="<?php echo theme_url('img/favicon.png'); ?>">
		<style>.cookieConsentContainer{z-index:999;width:350px;min-height:20px;box-sizing:border-box;padding:30px 30px 30px 30px;background:#232323;overflow:hidden;position:fixed;bottom:30px;right:30px;display:none}.cookieConsentContainer .cookieTitle a{font-family:OpenSans,arial,sans-serif;color:#fff;font-size:22px;line-height:20px;display:block}.cookieConsentContainer .cookieDesc p{margin:0;padding:0;font-family:OpenSans,arial,sans-serif;color:#fff;font-size:13px;line-height:20px;display:block;margin-top:10px}.cookieConsentContainer .cookieDesc a{font-family:OpenSans,arial,sans-serif;color:#fff;text-decoration:underline}.cookieConsentContainer .cookieButton a{display:inline-block;font-family:OpenSans,arial,sans-serif;color:#fff;font-size:14px;font-weight:700;margin-top:14px;background:#000;box-sizing:border-box;padding:15px 24px;text-align:center;transition:background .3s}.cookieConsentContainer .cookieButton a:hover{cursor:pointer;background:#3e9b67}@media (max-width:980px){.cookieConsentContainer{bottom:0!important;left:0!important;width:100%!important}}</style>
		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script>var base = '<?php echo theme_url(); ?>'</script>
		<script src="<?php echo asset_url('/js/zepto.js'); ?>"></script>
		<script src="<?php echo theme_url('/js/main.js'); ?>"></script>
	    <meta name="viewport" content="width=device-width">
	    <meta name="generator" content="Ulterior CMS">
	    <meta property="og:title" content="<?php echo page_title(); ?>">
	    <meta property="og:type" content="website">
	    <meta property="og:url" content="<?php echo e(current_url()); ?>">
	    <meta property="og:image" content="<?php echo theme_url('img/og_image.gif'); ?>">
	    <meta property="og:site_name" content="<?php echo site_name(); ?>">
	    <meta property="og:description" content="<?php echo page_description(); ?>">
		<meta name="keywords" content="<?php echo site_meta('tags'); ?>">
		<meta NAME="geo.position" CONTENT="<?php echo site_meta('geo'); ?>">
		<meta name="robots" content="<?php echo site_meta('robos'); ?>">
<?php if (customised()): ?>
<!-- Custom CSS -->
<style><?php echo article_css(); ?></style>
<!--  Custom Javascript -->
<script><?php echo article_js(); ?></script>
<?php endif; ?>
</head>
	<body class="<?php echo body_class(); ?>">
		<div class="main-wrap">
			<div class="slidey" id="tray">
				<div class="wrap">
					<form id="search" action="<?php echo search_url(); ?>" method="post">
						<label for="term">Procurar:</label>
						<input type="search" id="term" name="term" placeholder="Para procurar digite e tecle enter;" value="<?php echo search_term(); ?>">
						<input type="hidden" id="whatSearch" name="whatSearch" value="all" />
					</form>
					<aside>
						<b>Categorias</b>
						<ul>
<?php while (categories()):
        if (category_count() > 0) {?>
							<li>
								<a href="<?php echo category_url();
                                    ?>" title="<?php echo category_description();
                                    ?>">
									<?php echo category_title();
                                    ?> <span><?php echo category_count();
                                    ?></span>
								</a>
							</li>
	<?php 
} endwhile; ?>
						</ul>
					</aside>
				</div>
				<script src="<?php echo asset('cms/views/assets/js/slugBusca.js');?>"></script>
			</div>
		<header id="top">
				<a id="logo" href="<?php echo base_url(); ?>"><?php echo site_name(); ?></a>
				<nav id="main" role="navigation">
					<ul>
<?php if (has_menu_items()):
while (menu_items()):?>
						<li <?php echo(menu_active() ? 'class="active"' : ''); ?>>
							<a href="<?php echo menu_url(); ?>" title="<?php echo menu_title();?>"><?php echo menu_name();?></a>
						</li>
<?php endwhile;
endif; ?>
						<li class="tray">
							<a href="#tray" class="linky"><img src="<?php echo theme_url('img/categories.png'); ?>" alt="Categories" title="Procurar"></a>
						</li>
					</ul>
				</nav>
		</header>
