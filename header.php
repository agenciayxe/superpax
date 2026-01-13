<!DOCTYPE html>
<html lang="pt_br">
<head>
    <!-- CONFIGURAÇÕES -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- INFORMAÇÕES DO PROJETO -->
    <title><?php echo wp_title('-'); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_bloginfo('template_url'); ?>/img/logo-ico.ico">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_bloginfo('template_url'); ?>/img/logo-ico.png">
    <link rel="stylesheet" href="https://use.typekit.net/wyf5pvb.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/css/style.css?v=1.2.6">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="<?php echo get_bloginfo('template_url'); ?>/node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet"><?php 
	if (is_single() || is_page()) {
		$postCurrent = get_post(get_the_id());
		?>
		<meta property="og:locale" content="pt_BR">
		<meta property="og:url" content="<?php echo get_the_permalink(); ?>">
		<meta property="og:title" content="<?php echo wp_title('-'); ?>">
		<meta property="og:site_name" content="<?php bloginfo('title'); ?>">
		<meta property="og:description" content="<?php echo $postCurrent->post_excerpt; ?>">
		<?php 
		if (get_the_post_thumbnail()) {
			$idThumbnail = get_post_thumbnail_id(get_the_id());
			$imageData = wp_get_attachment_image_src($idThumbnail, 'medium_large');
			?>
			<meta property="og:image" content="<?php echo get_the_post_thumbnail_url(get_the_id(), 'thumbnail'); ?>">
			<meta property="og:image:type" content="image/jpeg">
			<meta property="og:image:width" content="<?php echo $imageData[1]; ?>">
			<meta property="og:image:height" content="<?php echo $imageData[2]; ?>">
			<?php 
		}
		?>
		<meta property="og:type" content="website">
		<meta property="og:type" content="article">
		<meta property="article:published_time" content="<?php echo get_the_date(); ?>">
		<?php  
	}
	?>
    <!-- EXTERNOS -->
	<meta name="google-site-verification" content="B5PVfICz_RztOqwyQiHKCpsvsoUA1FbvTp8gmHgcPQM" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LMXWJD5528"></script>
    <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-LMXWJD5528'); </script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-824599583"></script>
	<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-824599583'); </script>
	<script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-824599583/cNbWCMOUzcQBEJ_ImYkD', 'event_callback': callback }); return false; } </script>
    <script> 
        !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window,document,'script', 'https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '2693151697400320');  fbq('track', 'PageView');
	</script>
	
	<script>
		!function (w, d, t) {
		  w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++
)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script");n.type="text/javascript",n.async=!0,n.src=i+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};
		
		  ttq.load('CF2QOLRC77U9H3EREU90');
		  ttq.page();
		}(window, document, 'ttq');
	</script>
	
	<noscript><img height="1" width="1" src="https://www.facebook.com/tr?id=2693151697400320&ev=PageView&noscript=1"/></noscript>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.3&appId=637169509760254&autoLogAppEvents=1"></script>
	<meta property="fb:app_id" content="637169509760254" />
	<meta property="fb:admins" content="100003466640029"/>
	<?php wp_head(); ?>
	<?php flush(); ?>
</head>
<body>
    
	<?php get_template_part('templates/header/part', 'pre-header'); ?>
	<?php get_template_part('templates/header/part', 'header'); ?>