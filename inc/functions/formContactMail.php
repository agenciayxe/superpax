<?php 
function mailContact($id) {
    global $wpdb;
    $bloginfo = get_bloginfo('template_url');
    $name = get_bloginfo('name');
    $cor = '#da030b';
    $contactList = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM form_contact WHERE id='%s'",
            $id
        )
    );
    $quantityContact = count($contactList);
    if ($quantityContact == 1) {
        $contactCurrent = $contactList[0];
        
        
        $reasonInfo = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM form_contact_reason WHERE id='%s'",
                $contactCurrent->reason_id
            )
        );
        $reasonContact = ($reasonInfo[0]->name) ? $reasonInfo[0]->name : '';
        
        $storeQuery = array( 'post_type' => 'lojas', 'p' => $contactCurrent->store_id );
        $dadosStore = new WP_Query($storeQuery);
        $nameStore = '';
        while ($dadosStore->have_posts()) {
            $dadosStore->the_post();
            $categoryLojas = get_the_terms(get_the_ID(), 'lojas');
            $nameStore = $categoryLojas[0]->name . ' - ' . get_the_title() . ' - ' . get_the_content();
        }

        $contentBook = '';
        $contentBook .= '
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <title>' . $name . '</title>
        </head>
        <body>
        <div style="font-size: 18px; font-family: \'Arial\', \'trebuchet MS\'; margin: 15px auto; width: 600px; " width="600">
            <div align="center">
                <img src="' . get_bloginfo('template_url') . '/img/logo.png" width="150" height="40" style="width: 150px; height: 40;" alt="' . $name . '">
                <h2 style=" text-transform: uppercase;">Contato Recebido</h2>
            </div>
            <div>
                <div>
                    <h3>Contato</h3>
                    <table style="box-sizing: border-box; width: 100%;">
                        <tr>
                            <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Nome</strong></td>
                            <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $contactCurrent->name . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>E-mail</strong></td>
                            <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $contactCurrent->email . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Telefone</strong></td>
                            <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $contactCurrent->phone . '</td>
                        </tr>
                        
                        <tr>
                            <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Nome da Loja</strong></td>
                            <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $nameStore . '</td>
                        </tr>
                        
                        <tr>
                            <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Motivo do Contato</strong></td>
                            <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $reasonContact . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Mensagem</strong></td>
                            <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' .  $contactCurrent->message . '</td>
                        </tr>
                    </table>
                    <p>O envio foi feito no dia ' .  strftime("%d/%m/%Y às %H:%M", strtotime($contactCurrent->date_created)) . '</p>
                </div>
            </div>
        </div>
        </body>
        </html>
        ';
        $destinatario = array(
            'marketing@redeconomia.com.br'
        );
        $assunto = 'Contato - ' . $name;
        $headers = array(
            'Content-Type: text/html; charset=UTF-8'
        );
        define('WP_USE_THEMES', false);
        require(ABSPATH . 'wp-load.php');

        wp_mail($destinatario, $assunto, $contentBook, $headers);
    }
}
?>