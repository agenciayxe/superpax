<form action="<?php echo get_post_type_archive_link('dicas'); ?>" method="GET">
    <div class="flex md:block">
        <h3 class="hidden md:block text-xl my-2 font-medium text-red-700 uppercase">Pesquisar</h3>
        <input name="s" type="text" class="w-full py-3 px-4 rounded-l-lg md:rounded-lg text-lg font-medium border text-gray-500 col-span-2" placeholder="DIGITE SUA BUSCA">
        <button class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-r-full md:rounded-full md:my-4 py-2 px-10 block text-base uppercase">Pesquisar</button>
    </div>
</form>