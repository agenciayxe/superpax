<section id="cookie-alert" class="z-30 fixed bottom-0 w-full bg-red-700 text-white py-4 shadow-md">
    <div class="container mx-auto px-4">
        <div class="md:flex flex-wrap items-center">
            <div class="md:w-3/4 uppercase text-center md:text-left text-xs sm:text-sm md:text-base">
                <p>Utilizamos cookies em nosso site para personalizar e melhorar sua experiência conosco, oferecendo conteúdos personalizados para você. Ao clicar em aceitar você concorda com nossa <a class=" text-yellow-300" href="<?php echo get_page_link(InfoVar::show('privacidade')); ?>"><strong>Política de Privacidade</strong></a>.</p>
            </div>
            <div class="md:w-1/4">
                <button id="validateContinue" class="border-solid border md:border-2 border-gray-100 text-gray-100 bg-transparent hover:bg-gray-100 hover:text-red-700 font-medium rounded-full my-4 md:my-0 py-1 md:py-2 px-6 md:px-10 block text-sm md:text-base mx-auto uppercase transition-colors">Continuar</button>
            </div>
        </div>
    </div>
</section>