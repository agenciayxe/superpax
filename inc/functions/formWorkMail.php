<?php 
function workContact($id) {
    global $wpdb;
    $bloginfo = get_bloginfo('template_url');
    $name = get_bloginfo('name');
    $cor = '#da030b';
    $contactList = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM form_workers WHERE id='%s'",
            $id
        )
    );
    $quantityContact = count($contactList);
    if ($quantityContact == 1) {
        $contactCurrent = $contactList[0];

        $coursesList = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM form_workers_courses WHERE worker_id='%s'",
                 $contactCurrent->id
            )
        );
        $experienceList = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM form_workers_experience WHERE worker_id='%s'",
                 $contactCurrent->id
            )
        );
        $scholarityList = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM form_workers_scholarity WHERE id='%s'",
                 $contactCurrent->scholarity_id
            )
        );
        
        $jobList = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM form_workers_job WHERE id='%s'",
                 $contactCurrent->job_id
            )
        );

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
                <h2 style=" text-transform: uppercase;">Currículo Recebido</h2>
                <p>O envio foi feito no dia ' .  strftime("%d/%m/%Y às %H:%M", strtotime($contactCurrent->date_created)) . '</p>
            </div>
            <div>
                <div>';
                    if ($contactCurrent->curriculum) { $contentBook .= '<a href="' . $contactCurrent->curriculum . '" target="_blank"><button type="button" style="background-color: ' . $cor . '; color: white; border-radius: 30px; padding: 12px 20px; border: none; margin: 15px 0px; font-size: 22px; font-weight: bold;">Ver Currículo</button></a>'; }
                    else { $contentBook .= '<button type="button" style="background-color: #989898; color: white; border-radius: 30px; padding: 12px 20px; border: none; margin: 15px 0px; font-size: 22px; font-weight: bold;">Currículo Não Anexado</button>'; }
                    $contentBook .= '
                    <h3>Dados Pessoais</h3>
                    <table style="box-sizing: border-box; width: 100%;">';
                    $detailArray = array(
                        array('label' => 'Nome', 'field' => 'name'),
                        array('label' => 'Email', 'field' => 'email'),
                        array('label' => 'CPF', 'field' => 'cpf'),
                        array('label' => 'RG', 'field' => 'rg'),
                        array('label' => 'Data de Nascimento', 'field' => 'birth'),
                        array('label' => 'Sexo', 'field' => 'gender'),
                        array('label' => 'Telefone', 'field' => 'phone'),
                        array('label' => 'Celular', 'field' => 'mobile'),
                        array('label' => 'Nacionalidade', 'field' => 'nationality'),
                        array('label' => 'Naturalidade', 'field' => 'naturalness'),
                    );

                    foreach ($detailArray as $singleDetail) {
                        $fieldCurrent = $singleDetail['field'];
                        if ($fieldCurrent == 'birth') { $resultSingle = strftime("%d/%m/%Y", strtotime($contactCurrent->$fieldCurrent)); } 
                        else { $resultSingle = $contactCurrent->$fieldCurrent; }
                        $contentBook .= '<tr>
                            <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>' . $singleDetail['label'] . '</strong></td>
                            <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $resultSingle . '</td>
                        </tr>';
                    }
                    $contentBook .= '
                    </table>
                    <h3>Endereço</h3>
                    <table style="box-sizing: border-box; width: 100%;">';
                    $detailArray = array(
                        array('label' => 'Endereço', 'field' => 'address'),
                        array('label' => 'Complemento', 'field' => 'complement'),
                        array('label' => 'Número', 'field' => 'number'),
                        array('label' => 'Bairro', 'field' => 'district'),
                        array('label' => 'Cidade', 'field' => 'city'),
                        array('label' => 'Estado', 'field' => 'state'),
                        array('label' => 'CEP', 'field' => 'zipcode'),
                    );

                    foreach ($detailArray as $singleDetail) {
                        $fieldCurrent = $singleDetail['field'];
                        $resultSingle = $contactCurrent->$fieldCurrent;
                        $contentBook .= '<tr>
                            <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right;"><strong>' . $singleDetail['label'] . '</strong></td>
                            <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $resultSingle . '</td>
                        </tr>';
                    }
                    $contentBook .= '
                    </table>';

                    if (count($coursesList)) {
                        $contentBook .= '<h3>Cursos</h3>
                        <table style="box-sizing: border-box; width: 100%;">';
                        $countCourse = 1;
                        foreach ($coursesList as $singleCourses) {
                            $contentBook .= '
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Curso ' . $countCourse . '</strong></td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $singleCourses->course . '
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Escola ' . $countCourse . '</strong></td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $singleCourses->school . '
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Duração ' . $countCourse . '</strong></td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $singleCourses->duration . '
                                </td>
                            </tr>
                            ';
                            $countCourse++;
                        }
                        $contentBook .= '
                        </table>';
                    }
                    if (count($experienceList)) {
                        $contentBook .= '<h3>Experiências</h3>
                        <table style="box-sizing: border-box; width: 100%;">';
                        $countExperience = 1;
                        foreach ($experienceList as $singleExperience) {
                            $contentBook .= '
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Empresa ' . $countExperience . '</strong></td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $singleExperience->company . '
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Cargo ' . $countExperience . '</strong></td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $singleExperience->role . '
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Duração ' . $countExperience . '</strong></td>
                                <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $singleExperience->duration . '
                                </td>
                            </tr>
                            ';
                            $countExperience++;
                        }
                        $contentBook .= '
                        </table>';
                    }


                    $contentBook .= '
                    <h3>Informações</h3>
                    <table style="box-sizing: border-box; width: 100%;">
                        <tr>
                            <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Escolaridade</strong></td>
                            <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $scholarityList[0]->name . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Vaga Pretendida</strong></td>
                            <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $jobList[0]->name . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px 15px; font-size: 18px; word-wrap: break-word; background-color: ' . $cor . '; color: #efefef; width: 120px !important; text-align: right"><strong>Dados Complementares</strong></td>
                            <td style="padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word;">' . $contactCurrent->informations . '</td>
                        </tr>
                    </table>';
                    
                    if ($contactCurrent->curriculum) { $contentBook .= '<a href="' . $contactCurrent->curriculum . '" target="_blank"><button type="button" style="background-color: ' . $cor . '; color: white; border-radius: 30px; padding: 12px 20px; border: none; margin: 15px 0px; font-size: 22px; font-weight: bold;">Ver Currículo</button></a>'; }
                    else { $contentBook .= '<button type="button" style="background-color: #989898; color: white; border-radius: 30px; padding: 12px 20px; border: none; margin: 15px 0px; font-size: 22px; font-weight: bold;">Currículo Não Anexado</button>'; }
                    $contentBook .= '<p>O envio foi feito no dia ' .  strftime("%d/%m/%Y às %H:%M", strtotime($contactCurrent->date_created)) . '</p>
                </div>
            </div>
        </div>
        </body>
        </html>
        ';
        $destinatario = array(
            'curriculo@superpax.com.br',
        );
        $assunto = 'Currículo - ' . $name;
        $headers = array(
            'Content-Type: text/html; charset=UTF-8'
        );
        define('WP_USE_THEMES', false);
        require(ABSPATH . 'wp-load.php');


        wp_mail($destinatario, $assunto, $contentBook, $headers);
    }
}
?>