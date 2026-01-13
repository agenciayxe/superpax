<?php 
/*
Template name: Lista de Compras
*/
get_header(); ?>
    <main>
        <section class="py-8">
            <div class="container mx-auto px-4 max-w-2xl">
                <form id="form-itens-compras" action="" method="post">
                    <h3 class="my-4 font-medium text-center text-xl uppercase font-reading text-red-700">Faça a sua lista de compras!</h3>
                    <div class="mb-4 flex gap-x-4">
                        <input type="text" name="item" class="w-full py-3 px-4 rounded-l-lg md:rounded-lg text-lg font-medium border text-gray-500" placeholder="Adicionar item">
                        <button class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-r-full md:rounded-full py-2 px-10 block uppercase text-sm flex items-center"><i class="fa-solid fa-plus mx-1"></i> <span>Adicionar</span></button>
                    </div>
                    <!-- <button class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-r-full md:rounded-full py-2 px-10 block text-sm uppercase flex items-center mx-auto"><i class="fa-regular fa-lightbulb mx-1"></i> <span>Ver Sugestões</span></button> -->
                </form>
                
                <hr class="border-gray-200 my-2">
                <div class="lista" id="lista"></div>
                <div class="area-save" id="area-save"></div>
            </div>
        </section>
    </main>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/script-lista-compras.js"></script>
<?php get_footer(); ?>