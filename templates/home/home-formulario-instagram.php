<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/forminsta/style.css" />
<div id="modal-popup" tabindex="-1" aria-hidden="true" class="font-reading hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 modal h-full">
    <div class="relative p-4 w-full max-w-4xl h-full">
        <div class="relative bg-red-700  bg-cover bg-center rounded-lg shadow">
            <div class="p-2 md:p-6 overflow-x-scroll md:overflow-x-visible text-sm md:text-base">
                <button type="button" class="close absolute right-12" id="modal-close" data-dismiss="modal" aria-label="Close">
                    <span class="text-4xl" aria-hidden="true">&times;</span>
                </button>
                <div class="text-center text-white">
                    <div class="py-3">
                        <h3 class="text-2xl text-yellow-300 uppercase ">Especial do Consumidor </h3>
                        <h4 class="text-xl">Concorra a 15 vales-compra </h4>
                    </div>

                    <div class="py-3">
                        <p class="text-sm">Cadastre-se aqui e interaja MUITO com as nossas postagens do Instagram. </p>
                        <a href="https://www.instagram.com/p/CpdpUU2D5ge/?utm_source=ig_web_copy_link" target="_blank"><button class="bg-white text-red-700 hover:bg-red-800 hover:text-yellow-300 font-medium rounded-full my-4 mx-auto py-2 px-10 block text-base uppercase">Veja as regras</button></a>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 flex justify-center items-center mx-auto">
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
                                    <input type="text" name="instagram" id="instagram" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2" placeholder="@seu_instagram" required>
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
                                    <button type="submit" class="bg-white text-red-700 hover:bg-red-800 hover:text-yellow-300 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase" id="spin_button">Participar</button>
                                </div>
                                <div class="my-3 font-bold">
                                    <a href="https://www.redeconomia.com.br/regulamento-especial-consumidor/" class="text-white">VEJA O REGULAMENTO E REGRAS</a>
                                </div>
                                <div id="response-forminsta"></div>
                                <input type="hidden" name="action" value="forminsta" />
                                <input type="hidden" name="token" value="WycGnimOagcKeFk5XHdZKs7ZCACR84mR" />
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var canvas = document.getElementById("premio-forminsta");

    var sendFutebol = false;
    var titleText = "";
    var contentText = "";
    var formFutebol = document.getElementById("form-action");
    var responseContact = document.getElementById("response-forminsta");

    window.addEventListener('load', function() {
        const targetEl = document.getElementById("modal-popup");
        const options = {
            placement: "center-center",
            backdropClasses: "bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40",
        };
        const modal = new Modal(targetEl, options);
        modal.show();

        document.getElementById("modal-close").addEventListener("click", function() {
            modal.hide();
        });

    });

    var promotionAlert = function(contentResponse, action) {
        if (!contentResponse) {
            contentResponse = 'Um ou mais campos possuem um erro. Verifique e tente novamente.';
        }
        if (!action) {
            action = 'danger';
        }
        var styleAction = 'wpcf7-validation-errors';
        switch (action) {
            case 'danger':
                styleAction = 'w-full bg-red-700 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed';
                break;
            case 'warning':
                styleAction = 'w-full bg-yellow-600 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed';
                break;
            case 'success':
                styleAction = 'w-full bg-green-700 text-white my-2 p-3 uppercase text-center font-reading font-bold border-2 border-white  border-dashed';
                break;
        }
        responseContact.innerHTML = '<div class="wpcf7-response-output ' + styleAction + '" role="alert">' + contentResponse + '</div>';
    }

    var sendForminsta = false;
    var titleText = '';
    var contentText = '';
    var formForminsta = document.getElementById("form-action");
    formForminsta.addEventListener("submit", function(e) {
        e.preventDefault();
        if (!sendForminsta) {
            sendForminsta = true;
            promotionAlert('Aguarde um momento!');
            var content = new FormData(formForminsta);
            const params = new URLSearchParams(content);
            fetch(forminsta_object.location, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'Cache-Control': 'no-cache',
                },
                body: params
            }).then(function(responseCookie) {
                responseCookie.json().then((responseDataCookie) => {
                    if (responseDataCookie.status == true) {
                        document.getElementById("power-controls").innerHTML = '<div class="bg-red-700 px-2 md:px-6 py-4 md:py-2 rounded-lg md:rounded-xl lg:rounded-2xl md:w-full h-full"><h3 class="my-6 font-medium text-2xl font-reading text-center text-white font-black uppercase">Cadastro realizado na promoção Especial do Consumidor</h3></div>';
                        titleText = responseDataCookie.title;
                        contentText = responseDataCookie.message;
                    } else {
                        promotionAlert(responseDataCookie.response);
                        sendForminsta = false;
                    }
                });
            });
        }
    });

    function alertPrize(indicatedSegment) {
        document.getElementById("power-controls").innerHTML = '<div class="bg-red-700 px-2 md:px-6 py-4 md:py-2 rounded-lg md:rounded-xl lg:rounded-2xl md:w-full h-full"><h3 class="my-6 font-medium text-2xl font-reading text-center text-white font-black uppercase">' + titleText + '</h3></div>';
    }
</script>