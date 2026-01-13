<?php 
function modal ($idTitle, $title = '', $content = '') {
	?>
	
    <div id="modal-<?php echo $idTitle; ?>" tabindex="-1" aria-hidden="true"
        class="font-reading hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 modal h-full">
        <div class="relative p-4 w-full max-w-4xl h-full">
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-5 rounded-t border-b">
                    <h3 class="text-xl font-semibold lg:text-2xl font-body uppercase text-red-700">
						<?php if (isset($title) && $title != '') { echo $title; } else { echo 'Erro, tente novamente mais tarde'; } ?>
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="modal-<?php echo $idTitle; ?>">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 space-y-6 overflow-x-scroll md:overflow-x-visible text-sm md:text-base">
					<?php if (isset($content) && $content != '') { echo $content; } else { echo 'Erro, tente novamente mais tarde'; } ?>
                </div>
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200">
                    <!-- <button data-modal-toggle="modal-<?php echo $idTitle; ?>" type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase">aceito</button> -->
                    <button data-modal-toggle="modal-<?php echo $idTitle; ?>" type="button"
                        class="text-red-700 bg-white hover:bg-gray-200 border-red-700 border font-medium rounded-full my-4 py-2 px-10 block text-base uppercase">Fechar</button>

                </div>
            </div>
        </div>
    </div>
	<?php
}
?>