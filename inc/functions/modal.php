<?php 
function modal ($idTitle, $title = '', $content = '') {
	?>
	<!-- Modal -->
	<div class="modal fade" id="modal-<?php echo $idTitle; ?>" tabindex="1000" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle"><?php if (isset($title) && $title != '') { echo $title; } else { echo 'Erro, tente novamente mais tarde'; } ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php if (isset($content) && $content != '') { echo $content; } else { echo 'Erro, tente novamente mais tarde'; } ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="button-contato" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>