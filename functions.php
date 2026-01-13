<?php
require_once 'inc/load.php';

/* Links */
$argVar = array(
	'radio' => 'https://player.hstbr.net/radioproducoes',
	'email' => 'https://webmail.exchange.locaweb.com.br/owa/auth/logon.aspx?replaceCurrent=1&url=https%3a%2f%2fwebmail.exchange.locaweb.com.br%2fowa%2f',
	'facebook' => 'https://pt-br.facebook.com/redeconomia',
	'instagram' => 'https://www.instagram.com/souredeconomia/',
	'youtube' => 'https://www.youtube.com/user/souredeconomia',
	'appstore' => 'https://apps.apple.com/br/app/clube-redeconomia/id1629807453',
	'googleplay' => 'https://play.google.com/store/apps/details?id=inovatech.mercafacil.clube.redeconomia',
	'clube' => 'https://www.redeconomia.com.br/clube-redeconomia/',
	'cartao' => 'https://meucartao.senff.com.br/redeconomia/bem-vindo',

	'quebracabeca' => 'http://redeconomia.com.br/download/quebra-cabeca-redeconomia.pdf',
	
	'mapasite' => 74750,

	'dicas' => get_post_type_archive_link('dicas'),

	'inicio' => 2,
	'ofertas' => 11,
	'encarte' => 11,
	'encarteapp' => 11,
	'lamina' => 75,
	'sobre' => 7,
	'sac' => 17,
	'contato' => 17,
	'lojas' => 13,
	'trabalhe' => 15,
	'promocoes' => 19,
	'privacidade' => 3,

	'churrascometro' => 74591,

	'caminhao_economia' => 'https://www.caminhaodaeconomia.com.br/',
);
InfoVar::save($argVar);