<!DOCTYPE html>
<html>
<head>
	<title><?php echo wp_title('-'); ?></title>
	<link rel="shortcut icon" href="<?php echo bloginfo('template_url'); ?>/img/fav-logo.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1"/>
	<meta name="google-site-verification" content="B5PVfICz_RztOqwyQiHKCpsvsoUA1FbvTp8gmHgcPQM" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.1.2/flickity.min.css">
	<link href="<?php bloginfo('template_url'); ?>/inc/bxslider/jquery.bxslider.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/swiper.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css?v=1.1.22">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.1.2/flickity.min.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110492274-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-110492274-1');
	</script>

	<?php 
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

	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.3&appId=637169509760254&autoLogAppEvents=1"></script>
	<meta property="fb:app_id" content="637169509760254" />
	<meta property="fb:admins" content="100003466640029"/>
	<?php wp_head(); ?>
	<?php flush(); ?>
</head>
<body>
	<?php get_template_part('templates/part', 'pre-header'); ?>
	<?php get_template_part('templates/part', 'header'); ?>
	<?php  if (!is_front_page()) { get_template_part('templates/header', 'title'); } ?>