<?php 
add_action('wp_ajax_nopriv_cookie', 'cookie');
add_action('wp_ajax_cookie', 'cookie');

function cookie() {
    global $wpdb;
    $content = $_POST;
    
    $response['status'] = false;
    $response['content'] = 'Houve algum erro, os dados não foram salvos!';
    if ($content['make'] == 'save') {
        $response['status'] = true;
        $response['content'] = 'Dados salvo com sucesso!';
        setcookie('cookie_accepted', 1, time()+777600, '/');
    }
    echo json_encode($response);
    exit;
}
?>