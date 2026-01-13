<?php
/*
Template name: Trabalhe Conosco
*/
get_header(); ?>
<main>
    <section class="py-3 md:py-8">
        <div class="container mx-auto px-4">
            <h3 class="my-4 py-4 text-center font-medium text-2xl font-reading text-red-700">Faça parte da equipe!</h3>
            <div class="grid grid-cols-7">
                <div class="step-single">
                    <div class="relative mb-2">
                        <div class="step-icon transition delay-300 w-10 h-10 mx-auto rounded-full text-lg flex items-center">
                            <span class="text-center w-full">
                                <i class="fa-regular fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="hidden md:block text-xs text-center md:text-sm uppercase text-gray-300">Pessoais</div>
                </div>
                <div class="step-single">
                    <div class="relative mb-2">
                        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                <div class="step-progress transition-all duration-300 w-0 bg-red-700 py-1 rounded"></div>
                            </div>
                        </div>
                        <div class="step-icon transition delay-300 w-10 h-10 mx-auto rounded-full text-lg flex items-center">
                            <span class="text-center w-full">
                                <i class="fa-solid fa-location-dot"></i>
                            </span>
                        </div>
                    </div>
                    <div class="hidden md:block text-xs text-center md:text-sm uppercase text-gray-300">Endereço</div>
                </div>
                <div class="step-single">
                    <div class="relative mb-2">
                        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                <div class="step-progress transition-all duration-300 w-0 bg-red-700 py-1 rounded"></div>
                            </div>
                        </div>
                        <div class="step-icon transition delay-300 w-10 h-10 mx-auto rounded-full text-lg flex items-center">
                            <span class="text-center w-full">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                        </div>
                    </div>
                    <div class="hidden md:block text-xs text-center md:text-sm uppercase text-gray-300">Escolaridade</div>
                </div>
                <div class="step-single">
                    <div class="relative mb-2">
                        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                <div class="step-progress transition-all duration-300 w-0 bg-red-700 py-1 rounded"></div>
                            </div>
                        </div>
                        <div class="step-icon transition delay-300 w-10 h-10 mx-auto rounded-full text-lg flex items-center">
                            <span class="text-center w-full">
                                <i class="fa-solid fa-book"></i>
                            </span>
                        </div>
                    </div>
                    <div class="hidden md:block text-xs text-center md:text-sm uppercase text-gray-300">Cursos</div>
                </div>
                <div class="step-single">
                    <div class="relative mb-2">
                        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                <div class="step-progress transition-all duration-300 w-0 bg-red-700 py-1 rounded"></div>
                            </div>
                        </div>
                        <div class="step-icon transition delay-300 w-10 h-10 mx-auto rounded-full text-lg flex items-center">
                            <span class="text-center w-full">
                                <i class="fa-solid fa-list"></i>
                            </span>
                        </div>
                    </div>

                    <div class="hidden md:block text-xs text-center md:text-sm uppercase text-gray-300">Experiências</div>
                </div>
                <div class="step-single">
                    <div class="relative mb-2">
                        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                <div class="step-progress transition-all duration-300 w-0 bg-red-700 py-1 rounded"></div>
                            </div>
                        </div>
                        <div class="step-icon transition delay-300 w-10 h-10 mx-auto rounded-full text-lg flex items-center">
                            <span class="text-center w-full">
                                <i class="fa-solid fa-clipboard"></i>
                            </span>
                        </div>
                    </div>
                    <div class="hidden md:block text-xs text-center md:text-sm uppercase text-gray-300">Área de Interesse</div>
                </div>
                <div class="step-single">
                    <div class="relative mb-2">
                        <div class="absolute flex align-center items-center align-middle content-center" style="width: calc(100% - 2.5rem - 1rem); top: 50%; transform: translate(-50%, -50%)">
                            <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                                <div class="step-progress transition-all duration-300 w-0 bg-red-700 py-1 rounded"></div>
                            </div>
                        </div>
                        <div class="step-icon transition delay-300 w-10 h-10 mx-auto rounded-full text-lg flex items-center">
                            <span class="text-center w-full">
                                <i class="fa-solid fa-clipboard-check"></i>
                            </span>
                        </div>
                    </div>
                    <div class="hidden md:block text-xs text-center md:text-sm uppercase text-gray-300">Currículo</div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-3 md:py-8">
        <div class="container mx-auto px-4">
            <div class="w-12/12 form-contact wrapper">
                <form action="/" method="post" id="form-work" class="form-wizard js-form-wizard" novalidate enctype="multipart/form-data">
                    <div class="step js-step">
                        <h2 class="py-3 font-medium text-xl font-reading text-red-700">Informações Pessoais</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 md:gap-4">
                            <div class="lg:col-span-2">
                                <input type="text" name="nome" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="Nome Completo">
                            </div>
                            <div class="lg:col-span-2">
                                <input type="text" name="email" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="E-mail">
                            </div>
                            <div>
                                <input type="tel" name="telefone" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="Telefone" id="field-telefone">
                            </div>
                            <div>
                                <input type="text" name="celular" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="Celular" id="field-celular">
                            </div>
                            <div>
                                <input type="text" name="cpf" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="CPF" id="field-cpf">
                            </div>
                            <div>
                                <input type="text" name="rg" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="RG" id="field-rg">
                            </div>
                            <div>
                                <input type="text" name="nascimento" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="Data de Nascimento" id="field-nascimento">
                            </div>
                            <div>
                                <input type="text" name="nacionalidade" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="Nacionalidade">
                            </div>
                            <div>
                                <input type="text" name="naturalidade" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="Naturalidade">
                            </div>
                            <div class="flex justify-center items-center">
                                <select name="sexo" id="sexo" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required>
                                    <option value="" disabled selected>SEXO</option>
                                    <option value="masculino">Feminino</option>
                                    <option value="feminino">Masculino</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="step js-step">
                        <h2 class="py-3 font-medium text-xl font-reading text-red-700">Endereço</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 md:gap-4">
                            <div>
                                <input type="text" name="cep" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="CEP">
                            </div>
                            <div class="md:col-span-2">
                                <input type="text" name="endereco" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="Endereço">
                            </div>
                            <div>
                                <input type="text" name="numero" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="Número">
                            </div>
                            <div>
                                <input type="text" name="complemento" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="Complemento">
                            </div>
                            <div>
                                <input type="text" name="bairro" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="Bairro">
                            </div>
                            <div>
                                <input type="text" name="cidade" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="cidade">
                            </div>
                            <div>
                                <input type="text" name="estado" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required  placeholder="Estado">
                            </div>
                        </div>
                    </div>
                    <div class="step js-step">
                        <h2 class="py-3 font-medium text-xl font-reading text-red-700">Escolaridade</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
                            <select name="escolaridade" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required>
                                <option selected="selected" value="" disabled="">Selecionar</option>
                                <option value="1">Ensino Fundamental (Cursando)</option>
                                <option value="2">Ensino Fundamental (Completo)</option>
                                <option value="3">Ensino Médio (Cursando)</option>
                                <option value="4">Ensino Médio (Completo)</option>
                                <option value="5">Ensino Superior (Cursando)</option>
                                <option value="6">Ensino Superior (Completo)</option>
                            </select>
                        </div>
                    </div>
                    <div class="step js-step">
                        <h2 class="py-3 font-medium text-xl font-reading text-red-700">Cursos</h2>
                        <h3 class="py-3 font-medium text-gray-600 font-reading uppercase">Curso 1</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
                            <div>
                                <input type="text" name="curso[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Nome do Curso">
                            </div>
                            <div>
                                <input type="text" name="instituicao[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Instituição de Ensino">
                            </div>
                            <div>
                                <input type="text" name="duracao[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Duração">
                            </div>
                        </div>
                        <h3 class="py-3 font-medium text-gray-600 font-reading uppercase">Curso 2</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
                            <div>
                                <input type="text" name="curso[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Nome do Curso">
                            </div>
                            <div>
                                <input type="text" name="instituicao[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Instituição de Ensino">
                            </div>
                            <div>
                                <input type="text" name="duracao[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Duração">
                            </div>
                        </div>
                        <h3 class="py-3 font-medium text-gray-600 font-reading uppercase">Curso 3</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
                            <div>
                                <input type="text" name="curso[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Nome do Curso">
                            </div>
                            <div>
                                <input type="text" name="instituicao[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Instituição de Ensino">
                            </div>
                            <div>
                                <input type="text" name="duracao[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Duração">
                            </div>
                        </div>
                    </div>
                    <div class="step js-step">
                        <h2 class="py-3 font-medium text-xl font-reading text-red-700">Experiências</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
                            <div>
                                <h3 class="py-3 font-medium text-gray-600 font-reading uppercase">Empresa 1</h3>
                                <input type="text" name="empresa[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Nome da Empresa">
                                <input type="text" name="cargo[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Cargo ou Função">
                                <input type="text" name="tempo[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Tempo">
                            </div>
                            <div>
                                <h3 class="py-3 font-medium text-gray-600 font-reading uppercase">Empresa 2</h3>
                                <input type="text" name="empresa[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Nome da Empresa">
                                <input type="text" name="cargo[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Cargo ou Função">
                                <input type="text" name="tempo[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Tempo">
                            </div>
                            <div>
                                <h3 class="py-3 font-medium text-gray-600 font-reading uppercase">Empresa 3</h3>
                                <input type="text" name="empresa[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Nome da Empresa">
                                <input type="text" name="cargo[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Cargo ou Função">
                                <input type="text" name="tempo[]" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" placeholder="Tempo">
                            </div>
                        </div>
                    </div>
                    <div class="step js-step">
                        <h2 class="py-3 font-medium text-xl font-reading text-red-700">Vaga de Interesse</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
                            <div>
                                <select name="vaga" id="subject" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required>
                                    <option selected="selected" value="" disabled="">Selecione a Vaga</option>
                                    <option value="1">Operador de Loja</option>
                                    <option value="2">Assistente Administrativo (Rio Centro – Barra da tijuca)</option>
                                    <option value="3">Assistente de Compras - CLT (Rio Centro – Barra da tijuca)
                                    </option>
                                    <option value="4">Assistente de Marketing - CLT (Rio Centro – Barra da tijuca)
                                    </option>
                                    <option value="5">Gerente, Sub-gerente, Fiscal e Conferente de Loja</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="step js-step">
                        <h2 class="py-3 font-medium text-xl font-reading text-red-700">Dados Complementares</h2>
                        <div class="grid grid-cols-1 md:gap-4">
                            <div>
                                <textarea name="mensagem" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" required
                                    cols="30" rows="5" placeholder="Fale Sobre Você"></textarea>
                            </div>
                        </div>
                        <h2 class="py-3 font-medium text-xl font-reading text-red-700">Anexar Currículo</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4">
                            <div>
                                <input type="file" name="curriculo" class="w-full my-2 py-3 px-4 rounded-lg text-lg font-medium border text-gray-500 placeholder:uppercase js-form-control" id="curriculo-contact">
                            </div>
                            <div>
                                <button type="button"
                                    class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase"
                                    id="delete-file-contact">Excluir</button>
                            </div>
                        </div>
                        <p><small>PDF</small></p>
                        <div class="grid grid-cols-4 md:gap-4">
                            <div class="w-12/12">
                                <input type="hidden" name="action" value="work">
                                <?php /* <input type="submit" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase"> */ ?>
                            </div>
                        </div>
                    </div>
                    <div class="input-group text-right">
                        <button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase inline-block btn-prev js-btn-prev">Anterior</button>
                        <button type="button" class="bg-red-700 text-gray-100 hover:bg-red-800 hover:text-gray-100 font-medium rounded-full my-4 py-2 px-10 block text-base uppercase inline-block js-btn-next" data-step-text="Próximo" data-final-step-text="Enviar">Próximo</button>
                    </div>
                    <div class="progress-bar js-progress-bar"></div>
                    <div class="flex pt-3">
                        <div class="w-full">
                            <div id="response-work"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>