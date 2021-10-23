<?php 
add_action('wp_ajax_nopriv_contact', 'contact');
add_action('wp_ajax_contact', 'contact');

function contact() {
    global $wpdb;
    $content = $_POST;
    
    $response['status'] = false;
    $response['content'] = 'Houve algum erro, verifique todos os campos e tente novamente.';
    $content['cpf'] = preg_replace("/[^0-9]/", "", $content['cpf']);
    $content['date_created'] = date("Y-m-d H:i:s");

    $verifyFields = false; 
    if ($content['name'] == '') { $response['content'] = 'O nome digitado não é válido.'; }
    else if ($content['email'] == '') { $response['content'] = 'O e-mail digitado não é válido.'; }
    else if ($content['phone'] == '') { $response['content'] = 'O telefone digitado não é válido.'; }
    else if ($content['message'] == '') { $response['content'] = 'A mensagem digitada não é válida.'; }
    else if (strlen($content['name']) <= 3) { $response['content'] = 'O nome é muito pequeno.'; }
    else if (strlen($content['email']) <= 7) { $response['content'] = 'O e-mail é muito pequeno.'; }
    else if (strlen($content['phone']) <= 9) { $response['content'] = 'O telefone é muito pequeno.'; }
    else if (strlen($content['message']) <= 30) { $response['content'] = 'A mensagem está muito pequena.'; }
    else { $verifyFields = true; }

    if ($verifyFields) {
        $insertCustomer = $wpdb->insert(
            'form_contact',
            array(
                'name' => $content['name'],
                'email' => $content['email'],
                'phone' => $content['phone'],
                'message' => $content['message'],
                'date_created' => $content['date_created'],
                'status_id' => 1
            )
        );
        if ($insertCustomer) {
            $response['status'] = true;
            $response['content'] = 'Obrigado! Seu cadastro foi efetuado com sucesso.';
        }
    }
    echo json_encode($response);
    exit;
}
?>