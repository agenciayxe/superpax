<?php 
/*
Template name: Trabalhe Conosco
*/
get_header(); 
?>
<main class="page page-stores">
	<div class="container">
		<div class="row">
			<div class="col-md-12 form-contact">
				<form id="form-work" action="" method="post" enctype="multipart/form-data">
					<h2 class="pt-2 pb-2">Informações Pessoais</h2>
					<div class="row">
						<div class="col-md-6">
							<input type="text" name="nome" class="input-contato" placeholder="Nome Completo">
						</div>
						<div class="col-md-6">
							<input type="text" name="email" class="input-contato" placeholder="E-mail">
						</div>
						<div class="col-md-6">
							<input type="tel" name="telefone" class="input-contato" placeholder="Telefone" id="field-telefone">
						</div>
						<div class="col-md-6">
							<input type="text" name="celular" class="input-contato" placeholder="Celular" id="field-celular">
						</div>
						<div class="col-md-3">
							<input type="text" name="cpf" class="input-contato" placeholder="CPF" id="field-cpf">
						</div>
						<div class="col-md-3">
							<input type="text" name="rg" class="input-contato" placeholder="RG" id="field-rg">
						</div>
						<div class="col-md-3">
							<input type="text" name="nascimento" class="input-contato" placeholder="Data de Nascimento" id="field-nascimento">
						</div>
						<div class="col-md-3">
							<label for="masculino" style="padding: 10px;">
								<input type="radio" name="sexo" id="masculino" class="input-contato" value="masculino"> Masculino
							</label>
							<label for="feminino" style="padding: 10px;">
								<input type="radio" name="sexo" id="feminino" class="input-contato" value="feminino"> Feminino
							</label>
						</div>
						<div class="col-md-3">
							<input type="text" name="nacionalidade" class="input-contato" placeholder="Nacionalidade">
						</div>
						<div class="col-md-3">
							<input type="text" name="naturalidade" class="input-contato" placeholder="Naturalidade">
						</div>
					</div>
					<h2 class="pt-2 pb-2">Endereço</h2>
					<div class="row">
						<div class="col-md-5">
							<input type="text" name="endereco" class="input-contato" placeholder="Endereço">
						</div>
						<div class="col-md-5">
							<input type="text" name="complemento" class="input-contato" placeholder="Complemento">
						</div>
						<div class="col-md-2">
							<input type="text" name="numero" class="input-contato" placeholder="Número">
						</div>
						<div class="col-md-4">
							<input type="text" name="bairro" class="input-contato" placeholder="Bairro">
						</div>
						<div class="col-md-4">
							<input type="text" name="cidade" class="input-contato" placeholder="cidade">
						</div>
						<div class="col-md-4">
							<input type="text" name="estado" class="input-contato" placeholder="Estado">
						</div>
						<div class="col-md-3">
							<input type="text" name="cep" class="input-contato" placeholder="CEP">
						</div>
					</div>
					<h2 class="pt-2 pb-2">Escolaridade</h2>
					<div class="row">
						<div class="col-md-6">
							<select name="escolaridade">
								<option selected="selected" disabled>Selecionar</option>
								<?php 
								$listScholarity = $wpdb->get_results('SELECT * FROM form_workers_scholarity');
								foreach ($listScholarity as $scholarityCurrent) {
									?><option value="<?php echo $scholarityCurrent->id; ?>"><?php echo $scholarityCurrent->name ; ?></option><?php
								}
								?>
							</select>
						</div>
					</div>
					<h2 class="pt-2 pb-2">Cursos</h2>
					<p><strong>Curso 1</strong></p>
					<div class="row">
						<div class="col-md-6">
							<input type="text" name="curso[]" class="input-contato" placeholder="Nome do Curso">
						</div>
						<div class="col-md-3">
							<input type="text" name="instituicao[]" class="input-contato" placeholder="Instituição de Ensino">
						</div>
						<div class="col-md-3">
							<input type="text" name="duracao[]" class="input-contato" placeholder="Duração">
						</div>
					</div>
					<p><strong>Curso 2</strong></p>
					<div class="row">
						<div class="col-md-6">
							<input type="text" name="curso[]" class="input-contato" placeholder="Nome do Curso">
						</div>
						<div class="col-md-3">
							<input type="text" name="instituicao[]" class="input-contato" placeholder="Instituição de Ensino">
						</div>
						<div class="col-md-3">
							<input type="text" name="duracao[]" class="input-contato" placeholder="Duração">
						</div>
					</div>
					<p><strong>Curso 3</strong></p>
					<div class="row">
						<div class="col-md-6">
							<input type="text" name="curso[]" class="input-contato" placeholder="Nome do Curso">
						</div>
						<div class="col-md-3">
							<input type="text" name="instituicao[]" class="input-contato" placeholder="Instituição de Ensino">
						</div>
						<div class="col-md-3">
							<input type="text" name="duracao[]" class="input-contato" placeholder="Duração">
						</div>
					</div>
					<h2 class="pt-2 pb-2">Experiências</h2>
					<div class="row">
						<div class="col-md-4">
							<p><strong>Empresa 1</strong></p>
							<input type="text" name="empresa[]" class="input-contato" placeholder="Nome da Empresa">
							<input type="text" name="cargo[]" class="input-contato" placeholder="Cargo ou Função">
							<input type="text" name="tempo[]" class="input-contato" placeholder="Tempo">
						</div>
						<div class="col-md-4">
							<p><strong>Empresa 2</strong></p>
							<input type="text" name="empresa[]" class="input-contato" placeholder="Nome da Empresa">
							<input type="text" name="cargo[]" class="input-contato" placeholder="Cargo ou Função">
							<input type="text" name="tempo[]" class="input-contato" placeholder="Tempo">
						</div>
						<div class="col-md-4">
							<p><strong>Empresa 3</strong></p>
							<input type="text" name="empresa[]" class="input-contato" placeholder="Nome da Empresa">
							<input type="text" name="cargo[]" class="input-contato" placeholder="Cargo ou Função">
							<input type="text" name="tempo[]" class="input-contato" placeholder="Tempo">
						</div>
					</div>
					<h2 class="pt-2 pb-2">Vaga de Interesse</h2>
					<div class="row">
						<div class="col-md-6">
							<select name="vaga" id="subject" class="input-contato">
								<option selected="selected" disabled>Selecione a Vaga</option>
								<?php
								$listJobs = $wpdb->get_results('SELECT * FROM form_workers_job');
								foreach ($listJobs as $jobsCurrent) {
									?><option value="<?php echo $jobsCurrent->id; ?>"><?php echo $jobsCurrent->name; ?></option><?php
								}
								?>
							</select>

						</div>
					</div>
					<h2 class="pt-2 pb-2">Dados Complementares</h2>
					<div class="row">
						<div class="col-md-12">
							<textarea name="mensagem" class="input-contato" cols="30" rows="5" placeholder="Fale Sobre Você"></textarea>
						</div>
					</div>
					<h2 class="pt-2 pb-2">Anexar Currículo</h2>
					<div class="row">
						<div class="col-md-6">
							<input type="file" name="curriculo" class="input-contato" id="curriculo-contact">
						</div>
						<div class="col-md-6">
							<button type="button" class="button-contato" id="delete-file-contact">Excluir</button>
						</div>
					</div>
					<p><small>PDF</small></p>
					<div class="row">
						<div class="col-md-12">
							<input type="hidden" name="action" value="work">
							<input type="submit" class="button-contato">
						</div>
					</div>
					<div class="row pt-3">
						<div class="col-md-12">
							<div id="response-work"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
<?php 
get_footer(); 
?>