<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/roleta/style.css" />
<div id="modal-popup" tabindex="-1" aria-hidden="true" class="font-reading hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 modal h-full">
	<div class="relative p-4 w-full max-w-4xl h-full">
		<div class="relative bg-white bg-cover bg-center rounded-lg shadow"  style="background-image: url('<?php echo get_bloginfo('template_url'); ?>/roleta/background.png');">
			<div class="p-2 md:p-6 overflow-x-scroll md:overflow-x-visible text-sm md:text-base">
				<button type="button" class="close absolute" id="modal-close" data-dismiss="modal" aria-label="Close">
					<span class="text-4xl" aria-hidden="true">&times;</span>
				</button>
				<div class="row">
					<div class="col-md-12 d-flex justify-content-center">
						<img src="<?php echo get_bloginfo('template_url'); ?>/roleta/campanha.png" class="!w-80 mx-auto" alt="">
					</div>
				</div>
				<div class="flex flex-wrap">
					<div class="w-full md:w-1/2 flex justify-center">
						<div width="345" height="345" class="the_wheel">
							<canvas id="canvas" width="320" height="320">
								<p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
							</canvas>
						</div>
					</div>
					<div class="w-full md:w-1/2 flex justify-center items-center">
						<div id="power-controls">
							<form id="form-action" action="" method="post" enctype="multipart/form-data">
								<div class="my-3">
									<input type="text" name="nome" id="nome" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2" placeholder="Nome completo" required>
								</div>
								<div class="my-3">
									<input type="text" name="cpf" id="cpf" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2" placeholder="CPF" required>
								</div>
								<div class="my-3">
									<input type="email" name="email" id="email" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2" placeholder="E-mail" required>
								</div>
								<div class="my-3">
									<input type="text" name="telefone" id="telefone" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2" placeholder="Telefone" required>
								</div>
								<div class="my-3">
									<select name="loja" id="loja" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2 area-contato">
										<option disabled selected>Loja mais próxima</option>
										<?php
										$listLojas = array(
											'post_type' => 'lojas',
											'posts_per_page' => -1
										);
										$wpLojas = new WP_Query($listLojas);

										if ($wpLojas->have_posts()) {
											while ($wpLojas->have_posts()) {
												$wpLojas->the_post();
												$categoryLojas = get_the_terms(get_the_ID(), 'lojas');
										?>
												<option value="<?php echo get_the_ID(); ?>"><?php echo $categoryLojas[0]->name . ' - ' . get_the_title(); ?></option>
										<?php
											}
										}
										?>
									</select>
									<div class="my-3">
										<input type="checkbox" name="aceito" id="aceito" value="sim"> <label for="aceito">Aceito os termos e condições</label>
									</div>
								</div>
								<div class="my-3">
									<button type="submit" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase" id="spin_button">Participar</button>
								</div>
								<div class="my-3 font-bold">
									<a href="https://www.redeconomia.com.br/regulamento-roleta-premiada/" class="text-red-700">VEJA O REGULAMENTO E REGRAS</a>
								</div>
								<div id="response-roleta"></div>
								<input type="hidden" name="action" value="roleta" />
                                <input type="hidden" name="token" value="WycGnimOagcKeFk5XHdZKs7ZCACR84mR" />
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/roleta/js/winwheel.js"></script>
<script>
var canvas = document.getElementById("premio-roleta");

var sendFutebol = false;
var titleText = "";
var contentText = "";
var formFutebol = document.getElementById("form-action");
var responseContact = document.getElementById("response-roleta");

window.addEventListener('load', function () {
    const targetEl = document.getElementById("modal-popup");
    const options = { placement: "center-center", backdropClasses: "bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40", };
    const modal = new Modal(targetEl, options);
    modal.show();

    document.getElementById("modal-close").addEventListener("click", function () {
        modal.hide();
    });

});

var promotionAlert = function (contentResponse, action) {
    if ( !contentResponse ) { contentResponse = 'Um ou mais campos possuem um erro. Verifique e tente novamente.'; }
    if ( !action ) { action = 'danger'; }
    var styleAction = 'wpcf7-validation-errors';
    switch (action) {
        case 'danger': styleAction = 'w-full bg-red-700 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed'; break;
        case 'warning': styleAction = 'w-full bg-yellow-600 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed'; break;
        case 'success': styleAction = 'w-full bg-green-700 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed'; break;
    }
    responseContact.innerHTML='<div class="wpcf7-response-output ' + styleAction + '" role="alert">' + contentResponse + '</div>';
}

let theWheel = new Winwheel({
    'outerRadius': 136,
    'innerRadius': 54,
    'textFontSize': 10,
    'textOrientation': 'horizontal',
    'textAlignment': 'center',
    'numSegments': 21,
    'segments': [
        <?php
        $listPremios = $wpdb->get_results("SELECT *  FROM roleta_premios");
        $h = 0;
        foreach ($listPremios as $singlePremios) {
        ?> { 
            'fillStyle': '<?php if ($h) { echo '#f8c449'; } else { echo '#da030b'; } ?>', 'text': '<?php echo $singlePremios->nome; ?>'
        },
        <?php
            $h = ($h) ? 0 : 1;
        }
        ?>
    ],
    'animation': {
        'type': 'spinToStop',
        'duration': 10,
        'spins': 3,
        'callbackFinished': alertPrize,
        'callbackSound': playSound,
        'soundTrigger': 'pin'
    },
    'pins': // Turn pins on.
    {
        'number': 24,
        'fillStyle': 'silver',
        'outerRadius': 1,
    }
});

let audio = new Audio('https://www.redeconomia.com.br/wp-content/themes/redeconomia/roleta/tick.mp3');

function playSound() {
    audio.pause();
    audio.currentTime = 0;
    audio.play();
}

let wheelPower = 0;
let wheelSpinning = false;

function ajaxStateChange(spinResponse = 1) {
    if (wheelSpinning == false) {
        theWheel.stopAnimation(false);
        theWheel.rotationAngle = 0;
        theWheel.draw();

        theWheel.animation.spins = 4;
        let stopAt = theWheel.getRandomForSegment(spinResponse);
        theWheel.animation.stopAngle = stopAt;
        theWheel.startAnimation();
        wheelSpinning = true;
    }
}
var sendRoleta = false;
var titleText = '';
var contentText = '';
var formRoleta = document.getElementById("form-action");
formRoleta.addEventListener("submit", function (e) {
    e.preventDefault();
    if (!sendRoleta) {
        sendRoleta = true;
        promotionAlert('Aguarde um momento!');
        var content = new FormData(formRoleta);
        const params = new URLSearchParams(content);
        fetch(roleta_object.location, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded', 'Cache-Control': 'no-cache',
            },
            body: params
        }).then(function (responseCookie) {
            responseCookie.json().then((responseDataCookie) => {
                if (responseDataCookie.status == true) {
                    document.getElementById("power-controls").innerHTML='<div class="bg-red-700 px-2 md:px-6 py-4 md:py-2 rounded-lg md:rounded-xl lg:rounded-2xl md:w-full h-full"><h3 class="my-6 font-medium text-2xl font-reading text-center text-white font-black uppercase">Aguarde a roleta terminar de girar!</h3></div>';
                    titleText = responseDataCookie.title;
                    contentText = responseDataCookie.message;
                    ajaxStateChange(responseDataCookie.spin);
                } else {
                    promotionAlert(responseDataCookie.response);
                    sendRoleta = false;
                }
            });
        });
    }
});

function alertPrize(indicatedSegment) {
    document.getElementById("power-controls").innerHTML='<div class="bg-red-700 px-2 md:px-6 py-4 md:py-2 rounded-lg md:rounded-xl lg:rounded-2xl md:w-full h-full"><h3 class="my-6 font-medium text-2xl font-reading text-center text-white font-black uppercase">' + titleText + '</h3></div>';
}

</script>    