<!--
Template Name: Rádio
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Player Rádio Economia
	</title>

	<!-- Global site tag (gtag.js) - Google Analytics -->

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110492274-1">
	</script>

	<script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-110492274-1');
</script>



</head>
<body topmargin="15" alink="#e8e8e8" bgcolor="#000000" link="#e8e8e8" vlink="#e8e8e8">
	<div style="text-align: center; line-height: 20px; color: #e8e8e8; text-decoration: none; letter-spacing: 0px; font-weight: bold; font-size: 10px; font-family: verdana;">Player Rádio Economia
	</div>
	<div style="text-align: center;">

		<iframe frameborder="0" height="100" scrolling="auto" src="http://streaming12.hstbr.net/player/radioproducoes/" width="100%" style="background: #000;"></iframe> 
		<!-- Player Code Begin -->
		<!-- 
		<OBJECT ID="MediaPlayer" WIDTH="240" HEIGHT="80" CLASSID="CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95"STANDBY="Loading Windows Media Player components..." TYPE="application/x-oleobject">
		<PARAM NAME="FileName" VALUE=" http://ipaddress:port ">
		<PARAM name="autostart" VALUE="true">
		<PARAM name="ShowControls" VALUE="true">
		<param name="ShowStatusBar" value="false">
		<PARAM name="ShowDisplay" VALUE="true">
		<EMBED TYPE="application/x-mplayer2" SRC=" http://ipaddress:port " NAME="MediaPlayer"WIDTH="240" HEIGHT="80" ShowControls="1" ShowStatusBar="0" ShowDisplay="1" autostart="1"> 
		</EMBED>
		</OBJECT> -->
		<!-- Player Code Ends -->
	</div>
	<div style="text-align: center; line-height: 20px; color: #e8e8e8; text-decoration: none; letter-spacing: 0px; font-weight: bold; font-size: 10px; font-family: verdana;">
		<a href="javascript:self.close()">Fechar pop-up</a>
	</div>
	<br/>
	<?php echo get_template_part('templates/ads', 'home-1'); ?>
	<br/>
	<br/>
	<!--
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="_css/index.css">
	<link rel="stylesheet" type="text/css" href="_css/player.css"> 
	<link rel="stylesheet" type="text/css" href="_css/classes.css"> 
	<link rel="stylesheet" type="text/css" href="_css/header.css"> 
	<link rel="stylesheet" type="text/css" href="_css/footer.css">
	<hgroup class="grupo-radio">
	<div class="box-player">
	<img src="_img/capa-radio-rede.png">
	<div class="bt-player">
	<a id="botao-player" onclick="play()">
	<img src="_img/bt-player.png">
	</a>
	<a id="botao-player-pause" class="pause" onclick="pause()">
	<img src="_img/bt-pause.png">
	</a>
	</div>
	<h2>Escute a rádio REDECONOMIA!
	</h2>
	</div>
	</hgroup>
	<audio class="player" preload="auto" id="audio" src="http://streaming12.hstbr.net:8048/live?1510934479639" controls="controls">
	</audio>
	<script type="text/javascript">audio = document.getElementById('audio'); function play(){ audio.play(); } function pause(){ audio.pause(); } function stop(){ audio.pause(); audio.currentTime = 0; } function aumentar_volume(){ if( audio.volume 
	< 1) audio.volume += 0.1; } function diminuir_volume(){ if( audio.volume > 0) audio.volume -= 0.1; } function mute(){ if( audio.muted ){ audio.muted = false; }else{ audio.muted = true; } }
	</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
	</script>
	<script src="_js/jquery.bxslider.min.js">
	</script>
	<script src="_js/funcoes.js">
	</script>
	-->
</body>
</html>
