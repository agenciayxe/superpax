<?php 
add_action('wp_ajax_nopriv_work', 'work');
add_action('wp_ajax_work', 'work');

/* Função - Trabalhe Conosco */
function work() {
    /* GLOBAL */
    global $wpdb;
    $content = $_POST;

    /* DADOS */
    $verifyFields = true;
    $response['status'] = false;
    $response['content'] = 'Houve algum erro, verifique todos os campos e tente novamente.';

    $content['cpf'] = preg_replace("/[^0-9]/", "", $content['cpf']);
    $content['date_created'] = date("Y-m-d H:i:s");
    
    /* CAMPOS */
    $fieldsRequired = array(
        array('field' => 'nome', 'name' => 'Nome', 'verify' => 3),
        array('field' => 'cpf', 'name' => 'CPF', 'verify' => 9),
        array('field' => 'nascimento', 'name' => 'Nascimento', 'verify' => 7),
        array('field' => 'sexo', 'name' => 'Sexo', 'verify' => 1),
        array('field' => 'endereco', 'name' => 'Endereço', 'verify' => 3),
        array('field' => 'bairro', 'name' => 'Bairro', 'verify' => 3),
        array('field' => 'cidade', 'name' => 'Cidade', 'verify' => 3),
        array('field' => 'estado', 'name' => 'Estado', 'verify' => 2),
        array('field' => 'mensagem', 'name' => 'Mensagem', 'verify' => 10),
    );

    /* VERIFICAR LISTA DE CAMPOS */
    foreach ($fieldsRequired as $singleFields) {
        $currentField = $singleFields['field'];
        $currentQuantity = $singleFields['quantity'];
        $currentName = $singleFields['name'];
        if ($content[$currentField] == '') {
            $verifyFields = false;
            $response['content'] = 'O campo ' . $currentName . ' está vazio, preencha-o continuar.';
            break;
        }
        else if (strlen($content[$currentField]) < $currentQuantity) {
            $verifyFields = false;
            $response['content'] = 'O campo ' . $currentName . ' é muito curto';
            break;
        }
    }

    /* VERIFICANDO DADOS DE CONTATO */
    if ($verifyFields) {
        if ($content['email'] == '' && $content['telefone'] == '' && $content['celular'] == '') {
            $verifyFields = false; $response['content'] = 'Um dos campos de contato precisa ser preenchido. E-mail, Telefone ou Celular';
        }
    }

    /* VERIFICAR CAMPOS DO CURSOS */
    if ($verifyFields) {
        $lastCurso = false;
        foreach ($content['curso'] as $keyContent => $contentCurrent) {
            if ( $content['curso'][$keyContent] == '' && $content['instituicao'][$keyContent] == '' && $content['duracao'][$keyContent] == '' ) {  }
            else if ( $content['curso'][$keyContent] != '' && $content['instituicao'][$keyContent] != '' && $content['duracao'][$keyContent] != '' ) {  }
            else { 
                $verifyFields = false; $response['content'] = 'Preencha todos os campos no curso ' . ($keyContent + 1); break;
            }
        }
    }

    /* VERIFICAR CAMPOS DE EXPERIÊNCIAS */
    if ($verifyFields) {
        foreach ($content['empresa'] as $keyContent => $contentCurrent) {
            if ( $content['empresa'][$keyContent] == '' && $content['cargo'][$keyContent] == '' && $content['tempo'][$keyContent] == '' ) {  }
            else if ( $content['empresa'][$keyContent] != '' && $content['cargo'][$keyContent] != '' && $content['tempo'][$keyContent] != '' ) {  }
            else {
                $verifyFields = false; $response['content'] = 'Preencha todos os campos na empresa ' . ($keyContent + 1); break;
            }
        }
    }

    /* VERIFICAR ARQUIVO ANEXADO */
    $typeAccepts = array('doc','docx' ,'pdf');
    $fileTitle = $_FILES['curriculo']['name'];
    $extFile = pathinfo($fileTitle, PATHINFO_EXTENSION);
    if(!in_array($extFile, $typeAccepts) && !empty($_FILES['curriculo']) && $_FILES['curriculo']['tmp_name'] != '') { $verifyFields = false; $response['content'] = 'Envie arquivo no formato correto de currículo.'; }

    /* SEGUIRAR PARA ENVIO */
    if ($verifyFields) {


        /* SALVANDO OS PRINCIPAIS DADOS */
        $insertCustomer = $wpdb->insert(
            'form_workers',
            array(
                'name' => $content['nome'],
                'email' => $content['email'],
                'cpf' => $content['cpf'],
                'rg' => $content['rg'],
                'birth' => '2018-11-22',
                'gender' => $content['sexo'],
                'phone' => $content['telefone'],
                'mobile' => $content['celular'],
                'nationality' => $content['nacionalidade'],
                'naturalness' => $content['naturalidade'],
                'address' => $content['endereco'],
                'complement' => $content['complemento'],
                'number' => $content['numero'],
                'district' => $content['bairro'],
                'city' => $content['cidade'],
                'state' => $content['estado'],
                'zipcode' => $content['cep'],
                'scholarity_id' => $content['escolaridade'],
                'informations' => $content['mensagem'],
                'job_id' => $content['vaga'],
                'curriculum' => '',
                'date_created' => $content['date_created'],
                'status' => 'ativo'
            )
        );
        
        /* SALVAR OS DEMAIS DADOS */
        if ($insertCustomer) {
            $idCustomer = $wpdb->insert_id;

            /* SALVAR ARQUIVOS */
            if (!empty($_FILES['curriculo']) && $_FILES['curriculo']['tmp_name']) {

                $slugTitle = sanitize_title($content['nome']);
                $pathUpload = (!empty($_FILES['curriculo'])) ? get_home_path() . '/upload_curriculo/' . $idCustomer .  '-' . $slugTitle . '.' . $extFile : '';
                $urlUpload = (!empty($_FILES['curriculo']) || $_FILES['curriculo']['tmp_name'] == '') ? 'http://localhost/fabiofreitas/esal/upload_curriculo/' . $idCustomer .  '-' . $slugTitle . '.' . $extFile : '';

                move_uploaded_file($_FILES['curriculo']['tmp_name'], $pathUpload);
                $wpdb->update(
                    'form_workers',
                    array( 'curriculum' => $urlUpload ),
                    array( 'id' => $idCustomer )
                );
            }

            foreach ($content['empresa'] as $keyContent => $contentCurrent) {
                if ( $content['empresa'][$keyContent] != '' && $content['cargo'][$keyContent] != '' && $content['tempo'][$keyContent] != '' ) {
                    $wpdb->insert(
                        'form_workers_experience',
                        array(
                            'worker_id' => $idCustomer,
                            'company' => $content['empresa'][$keyContent],
                            'role' => $content['cargo'][$keyContent],
                            'duration' => $content['tempo'][$keyContent]
                        )
                    );
                }
            }
            foreach ($content['curso'] as $keyContent => $contentCurrent) {
                if ( $content['curso'][$keyContent] != '' && $content['instituicao'][$keyContent] != '' && $content['duracao'][$keyContent] != '' ) {

                    $wpdb->insert(
                        'form_workers_courses',
                        array(
                            'worker_id' => $idCustomer,
                            'course' => $content['curso'][$keyContent],
                            'school' => $content['instituicao'][$keyContent],
                            'duration' => $content['duracao'][$keyContent]
                        )
                    );
                }
            }
            
            $response['status'] = true;
            $response['content'] = 'Obrigado! Seus dados foram enviados com sucesso.';
        }
    }
    echo json_encode($response);
    exit;
}
?>