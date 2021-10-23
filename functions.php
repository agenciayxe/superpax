<?php 
require_once 'inc/load.php';

/* Links */
$argVar = array(
	'radio' => 'https://www.redeconomia.com.br/player',
	'email' => '',
	'facebook' => 'https://pt-br.facebook.com/RedeconomiaSuperPax',
	'instagram' => 'https://instagram.com/redeconomiasuperpax',
	'youtube' => 'https://www.youtube.com/channel/UCTP8bJGVAGS7ZAWnXC_lxRw',
	'appstore' => 'https://itunes.apple.com/br/app/clube-redeconomia/id1458527719?mt=8',
	'googleplay' => 'https://play.google.com/store/apps/details?id=com.valedesconto.redeconomia2',

	'ofertas' => 13,
	'encarte' => 32993,
	'lamina' => 32995,
	'sobre' => 11,
	'sac' => 17,
	'lojas' => 15,
	'fidelidade' => 50,
	'trabalhe' => 19,
	'promocoes' => 21,
	'intranet' => ''
);
InfoVar::save($argVar);
?>