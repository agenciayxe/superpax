<?php

function mailRoletaNotification($dadosPessoa, $idPessoa, $infoPremios) {
    
    $name = get_bloginfo('name');
    $emailTest = 'fabiofreitassilvacontato@gmail.com';
    $response = false;
    
    $horario = strftime("%d/%m/%Y %H:%M:%S", strtotime($dadosPessoa['date_created']));
    $listLojas = array(
        'post_type' => 'lojas',
        'p' => $dadosPessoa['loja']
    );
    $wpLojas = new WP_Query($listLojas);

    if ($wpLojas->have_posts()) {
        while ($wpLojas->have_posts()) {
            $wpLojas->the_post();
            $categoryLojas = get_the_terms(get_the_ID(), 'lojas');
            $infoLoja = $categoryLojas[0]->name . ' - ' . get_the_title();
        }
    }

    if ($infoPremios->is_premio == 1) {
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
                        <h2 style=" text-transform: uppercase;">VERÃO DA ECONOMIA</h2>
                        <p>Parabéns!!! Você girou a Roleta Premiada da Redeconomia na campanha Verão da Economia e ganhou um prêmio! </p>
                        <p>Veja os dados abaixo e saiba onde e como retirar o prêmio conforme o regulamento que você encontra completo no link abaixo.</p>
                        <p><a href="https://www.redeconomia.com.br/regulamento-roleta-premiada/ " target="_blank">Ver Regulamento</a></p>
                        <h2 style="text-transform: uppercase;">ENTREGA DOS PRÊMIOS</h2>
                        <p>O PRÊMIO É PESSOAL E INTRANSFERÍVEL E SERÁ ENTREGUE NA LOJA SELECIONADA NO MOMENTO DE CADASTRO NO SITE PARA PARTICIPAÇÃO DA ROLETA PREMIADA NO PRAZO DE ATÉ 10 (DEZ) DIAS ÚTEIS CONTADOS A PARTIR DO FINAL DA CAMPANHA DE VERÃO DA REDECONOMIA, COM TÉRMINO DIA 12/02/2023. </p>
                    </div>
                    <div>
                        <h3>Informações</h3>
                        <table width="100%">
                            <tbody>
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #da030b; color: #efefef; width: 120px !important; text-align: right">Nome</td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $dadosPessoa['nome'] . '</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #da030b; color: #efefef; width: 120px !important; text-align: right">E-mail</td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $dadosPessoa['email'] . '</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #da030b; color: #efefef; width: 120px !important; text-align: right">CPF</td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $dadosPessoa['cpf'] . '</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #da030b; color: #efefef; width: 120px !important; text-align: right">Telefone</td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $dadosPessoa['telefone'] . '</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #da030b; color: #efefef; width: 120px !important; text-align: right">Data e Hora</td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $horario . '</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #da030b; color: #efefef; width: 120px !important; text-align: right">Prêmio Recebido</td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $infoPremios->nome . '</td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: #da030b; color: #efefef; width: 120px !important; text-align: right">Loja</td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $infoLoja . '</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </body>
        </html>
        ';
        $destinatario = array( $dadosPessoa['email'], 'roletapremiadaveraodaeconomia@gmail.com' );
        $assunto = 'Prêmio - Redeconomia (Roleta)';
        $headers = array(
            'Content-Type: text/html; charset=UTF-8'
        );
        define('WP_USE_THEMES', false);
        require(ABSPATH . 'wp-load.php');

        $sendMail = wp_mail($destinatario, $assunto, $contentBook, $headers);
        if ($sendMail) { $response = true; }
    }
    return $response;
}
