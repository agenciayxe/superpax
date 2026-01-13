<?php 
/*
Template name: Contato
*/
get_header(); ?>
    <main>
        <section class="py-8">
            <div class="container mx-auto px-4">
                <h3 class="my-4 font-medium text-2xl font-reading text-red-700">Entre em contato</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                    <div>
                        <form action="" method="post" id="form-contact">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <input type="text" name="name" id="name" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2" placeholder="NOME">
                                <input type="text" name="email" id="email" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500" placeholder="E-MAIL">
                                <input type="text" name="phone" id="phone" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500" placeholder="TELEFONE">
                                <select name="store_id" id="store_id" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2">
                                    <option selected="selected" disabled="">INFORME A LOJA</option>
                                    <option value="0">Não informar loja</option>
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
                                <select name="reason_id" id="reason_id" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2">
                                    <option selected="selected" disabled="">MOTIVO DO CONTATO</option>
                                    <?php
                                    $listReason = $wpdb->get_results( "SELECT *  FROM form_contact_reason" );
                                    $h = 0;
                                    $numberCountPremios = ($wpdb->num_rows) ? $wpdb->num_rows: 0;
                                    foreach ($listReason as $singleReason) {
                                        ?>
                                        <option value="<?php echo $singleReason->id; ?>"><?php echo $singleReason->name; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <textarea name="message" id="message" class="w-full py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 md:col-span-2" cols="30" rows="5" placeholder="MENSAGEM"></textarea>
                                <input type="hidden" name="action" value="contact">
                                <input type="submit" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase">
                                <br>
                            </div>
                            <div id="response-contact" class="w-full"></div>
                        </form>
                    </div>
                    <div>
                        <div class="bg-white border-red-700 border-2 rounded-xl py-2 px-6 my-3 md:mt-0">
                            <div class="flex flex-col w-2/3 mx-auto uppercase">
                                <div class="flex justify-center my-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-red-700 w-12"
                                        viewBox="0 0 31.819 27.812">
                                        <g id="stores" transform="translate(-33.319 -34.84)">
                                            <path id="Caminho_39" data-name="Caminho 39"
                                                d="M65.138,43.774V44.4a.513.513,0,0,0-.045.112,4.461,4.461,0,0,1-2.467,3.506.39.39,0,0,0-.229.412q.008,6.605,0,13.211c0,.727-.285,1.013-1.014,1.013H37.048c-.734,0-1.014-.281-1.014-1.01q0-6.605,0-13.211a.413.413,0,0,0-.25-.432,4.482,4.482,0,0,1-2.412-3.243,2.123,2.123,0,0,1,.235-1.575C35.1,40.622,36.553,38.044,38,35.462a1.091,1.091,0,0,1,1.074-.621c1.461.016,2.922.006,4.383.006q7.927,0,15.853-.007a1.166,1.166,0,0,1,1.143.669C62,38.27,63.575,41.02,65.138,43.774ZM37.61,61.062h2.747v-.433c0-2.591-.005-5.181,0-7.771a2.692,2.692,0,0,1,2.885-2.868c.652,0,1.307-.033,1.958.012a3.566,3.566,0,0,1,1.256.277,2.578,2.578,0,0,1,1.516,2.506c.006,2.643,0,5.284,0,7.927v.346H60.824V48.524a4.644,4.644,0,0,1-4.041-2,4.583,4.583,0,0,1-7.549.02,4.631,4.631,0,0,1-7.59-.01,4.633,4.633,0,0,1-4.035,1.993C37.61,52.72,37.61,56.891,37.61,61.062ZM35.6,42.9H62.839c-.031-.066-.047-.1-.065-.138-1.165-2.052-2.334-4.1-3.491-6.158-.107-.19-.248-.183-.414-.183q-9.651,0-19.3,0a.455.455,0,0,0-.459.268q-1.675,2.976-3.368,5.942C35.694,42.707,35.655,42.788,35.6,42.9ZM46.4,61.065c.006-.073.016-.134.016-.193q0-4.084,0-8.168a1.1,1.1,0,0,0-1.156-1.153c-.662-.009-1.325,0-1.988,0-.939,0-1.342.4-1.342,1.34q0,3.913,0,7.827v.35ZM40.8,44.509H34.936a2.981,2.981,0,0,0,5.864,0Zm1.713-.012a2.962,2.962,0,0,0,3.2,2.44A2.866,2.866,0,0,0,48.33,44.5Zm7.593,0a2.941,2.941,0,0,0,5.8,0Zm13.4.012H57.66a2.915,2.915,0,0,0,2.747,2.435A2.973,2.973,0,0,0,63.5,44.512Z" />
                                            <path id="Caminho_40" data-name="Caminho 40"
                                                d="M217.584,211.5c-.663,0-1.326,0-1.989,0a2.146,2.146,0,0,1-2.286-2.3q-.008-1.507,0-3.015a2.15,2.15,0,0,1,2.3-2.29q2,0,4.009,0a2.15,2.15,0,0,1,2.3,2.287q.008,1.507,0,3.015a2.147,2.147,0,0,1-2.313,2.3C218.931,211.507,218.257,211.5,217.584,211.5Zm.013-1.563c.683,0,1.367,0,2.049,0,.494,0,.709-.21.712-.693q.007-1.553,0-3.105a.605.605,0,0,0-.692-.685q-2.05-.007-4.1,0c-.479,0-.693.225-.694.712q-.005,1.536,0,3.074c0,.487.212.693.706.7C216.251,209.944,216.924,209.941,217.6,209.941Z"
                                                transform="translate(-163.857 -153.908)" />
                                        </g>
                                    </svg>
                                </div>
                                <h4 class="text-red-700 text-center text-2xl font-medium mx-2">nossas lojas</h4>
                                <hr class="border border-red-700 my-3">
                                <p class="text-green-700 text-center text-sm">Veja o endereço e o telefone da loja
                                    mais próxima de você!</p>
                                <a href="<?php echo get_page_link(InfoVar::show('lojas')); ?>"><button class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base mx-auto uppercase">ver lojas</button></a>
                            </div>
                        </div>
                        <div class="bg-white border-red-700 border-2 rounded-xl py-2 px-6 my-3 md:mt-0">
                            <div class="flex flex-col w-2/3 mx-auto uppercase">
                                <div class="flex justify-center my-4"></div>
                                <h4 class="text-red-700 text-center text-2xl font-medium mx-2">SIGA-NOS NAS REDES SOCIAIS</h4>
                                <div class="font-bold py-8 bg-pink md:text-lg justify-center flex text-red-700 gap-5">
                                    <div>
                                        <a href="<?php echo InfoVar::show('facebook'); ?>" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 fill-red-700" viewBox="0 0 23.811 23.81">
                                                <path id="facebook" d="M62.252,29.548V48.242a.405.405,0,0,0-.037.084,2.888,2.888,0,0,1-2.99,2.473q-2.546,0-5.091,0c-.6,0-.857-.258-.857-.866V41.727c0-.6.257-.857.866-.858.7,0,1.395,0,2.093,0,.082,0,.165-.007.256-.011v-1.99h-.265c-.721,0-1.442,0-2.162,0a.71.71,0,0,1-.787-.793q0-1.325,0-2.65a.81.81,0,0,1,.891-.895c.69,0,1.379,0,2.069,0h.247v-2c-.787,0-1.554,0-2.32,0a2.794,2.794,0,0,0-2.888,2.889c0,.868,0,1.736,0,2.6,0,.59-.256.844-.851.845-.7,0-1.41,0-2.115,0-.081,0-.162.009-.243.014v1.989h.269c.7,0,1.41,0,2.115,0a.725.725,0,0,1,.826.828q0,4.138,0,8.276a.724.724,0,0,1-.827.826q-4.51,0-9.02,0a3.251,3.251,0,0,1-.714-.073A2.887,2.887,0,0,1,38.444,47.8q0-7.893,0-15.785c0-.721-.008-1.442,0-2.162a2.892,2.892,0,0,1,1.976-2.71c.189-.064.386-.1.579-.153H59.7a.562.562,0,0,0,.106.04,2.766,2.766,0,0,1,2.066,1.439A7.059,7.059,0,0,1,62.252,29.548ZM54.7,42.279V49.4h.241q2.138,0,4.278,0a1.518,1.518,0,0,0,1.634-1.643q0-8.858,0-17.715a1.517,1.517,0,0,0-1.634-1.643q-8.869,0-17.739,0a2.024,2.024,0,0,0-.528.064,1.5,1.5,0,0,0-1.1,1.583q0,8.846,0,17.692A1.523,1.523,0,0,0,41.509,49.4h8.347V42.278c-.808,0-1.6,0-2.387,0a.734.734,0,0,1-.833-.828q0-1.581,0-3.162a.733.733,0,0,1,.831-.829c.713,0,1.426,0,2.139,0h.268c0-.672-.009-1.314,0-1.955a5.663,5.663,0,0,1,.084-1.016,4.159,4.159,0,0,1,4.044-3.359c1.03-.019,2.061-.006,3.092,0a.722.722,0,0,1,.818.813q0,1.592,0,3.185a.715.715,0,0,1-.8.806c-.721,0-1.442,0-2.162,0h-.262v1.529h.259c.728,0,1.457,0,2.185,0a.713.713,0,0,1,.778.764q.01,1.65,0,3.3a.708.708,0,0,1-.742.752c-.247.009-.5,0-.744,0C55.857,42.28,55.285,42.279,54.7,42.279Z" transform="translate(-38.441 -26.99)"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="<?php echo InfoVar::show('instagram'); ?>" target="_blank">
                    
                                            <svg id="instagram" xmlns="http://www.w3.org/2000/svg" class="h-8 fill-red-700" viewBox="0 0 23.763 23.766">
                                                <path id="Caminho_29" data-name="Caminho 29" d="M62.57,32.477v12.81a12.931,12.931,0,0,1-.288,1.33,5.928,5.928,0,0,1-5.69,4.143q-5.9.017-11.81,0a5.724,5.724,0,0,1-3.453-1.1,5.888,5.888,0,0,1-2.521-5.012q0-5.743,0-11.485a6.7,6.7,0,0,1,.089-1.177,5.776,5.776,0,0,1,3.707-4.566A11.95,11.95,0,0,1,44.284,27h12.81c.167.03.333.057.5.088a5.81,5.81,0,0,1,4.549,3.693A11.98,11.98,0,0,1,62.57,32.477Zm-1.994,6.405h.009c0-1.934,0-3.867,0-5.8a3.906,3.906,0,0,0-.358-1.778,3.859,3.859,0,0,0-3.663-2.314c-3.921-.014-7.842-.006-11.764,0a5.044,5.044,0,0,0-.692.054,3.9,3.9,0,0,0-3.3,3.7c-.026,4.045-.011,8.09-.013,12.135a3.515,3.515,0,0,0,.35,1.571,3.891,3.891,0,0,0,3.726,2.328q5.812.008,11.624,0a5.744,5.744,0,0,0,.785-.056,3.919,3.919,0,0,0,3.29-3.667C60.6,43,60.576,40.939,60.576,38.882Z" transform="translate(-38.807 -27)"></path>
                                                <path id="Caminho_30" data-name="Caminho 30" d="M136.666,118.942a5.94,5.94,0,1,1-5.9-5.969A5.954,5.954,0,0,1,136.666,118.942Zm-5.936-3.984a3.955,3.955,0,1,0,3.951,3.954A3.949,3.949,0,0,0,130.73,114.958Z" transform="translate(-118.844 -107.032)"></path>
                                                <path id="Caminho_31" data-name="Caminho 31" d="M283.979,87.279a1.481,1.481,0,0,1-.022-2.962,1.481,1.481,0,1,1,.022,2.962Z" transform="translate(-265.65 -80.356)"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="<?php echo InfoVar::show('youtube'); ?>" target="_blank">
                                            <svg id="youtube" xmlns="http://www.w3.org/2000/svg" class="h-8 fill-red-700" viewBox="0 0 32.831 23">
                                                <path id="Caminho_32" data-name="Caminho 32" d="M65.667,91.6c-.061.278-.117.558-.183.835a6.387,6.387,0,0,1-6.105,4.937c-3.578.039-7.157.013-10.735.015-3.076,0-6.153.008-9.229,0a6.419,6.419,0,0,1-6.336-4.769,6.673,6.673,0,0,1-.225-1.674q-.03-5.047-.007-10.094a6.406,6.406,0,0,1,6.313-6.429c4.016-.044,8.033-.013,12.049-.015,2.628,0,5.255-.008,7.884,0a6.437,6.437,0,0,1,6.346,4.762c.092.336.154.681.23,1.021Q65.667,85.893,65.667,91.6ZM49.24,95.461q4.871,0,9.741,0a5.461,5.461,0,0,0,.894-.048,4.524,4.524,0,0,0,3.868-4.593q0-4.9,0-9.806a4.523,4.523,0,0,0-4.652-4.687c-1.25-.006-2.5,0-3.749,0q-7.948,0-15.894,0a4.519,4.519,0,0,0-4.682,4.689q0,4.9,0,9.806a4.993,4.993,0,0,0,.1,1.048,4.5,4.5,0,0,0,4.53,3.59C42.681,95.467,45.961,95.461,49.24,95.461Z" transform="translate(-32.837 -74.392)"></path>
                                                <path id="Caminho_33" data-name="Caminho 33" d="M165.973,137.283c0-1.687,0-3.375,0-5.062a1.055,1.055,0,0,1,.5-1.033,1.034,1.034,0,0,1,1.139.119q4.074,2.571,8.156,5.127a1.061,1.061,0,0,1,.6.881,1.032,1.032,0,0,1-.594.949q-2.68,1.63-5.352,3.272c-.946.579-1.9,1.155-2.838,1.74a1.02,1.02,0,0,1-1.113.1,1.031,1.031,0,0,1-.5-1C165.975,140.678,165.973,138.981,165.973,137.283Zm7.62.059-5.681-3.571v7.048Z" transform="translate(-153.708 -125.844)"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>