<?php
/*
Template name: Instaform (Lista de Formulário)
*/
get_header();
?>
<main>
    <section>
        <div class="container mx-auto px-4 text-sm">
            <div class="w-full my-3">
                <h5>Lista do Formulário</h5>
                <?php

                $listPremiados = $wpdb->get_results("SELECT *  FROM forminsta_cadastros ORDER BY data_hora ASC");
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Loja</th>
                            <th scope="col" width="90">Telefone</th>
                            <th scope="col" width="90">CPF</th>
                            <th scope="col" width="90">Instagram</th>
                            <th scope="col" width="106">Horário</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listPremiados as $singlePremiados) {
                            $listLojas = array(
                                'post_type' => 'lojas',
                                'posts_per_page' => 1,
                                'p' =>  $singlePremiados->loja,
                            );
                            $wpLojas = new WP_Query($listLojas);
                            if ($wpLojas->have_posts()) {
                                while ($wpLojas->have_posts()) {
                                    $wpLojas->the_post();
                                    $categoryLojas = get_the_terms(get_the_ID(), 'lojas');
                                    $nomeLoja = $categoryLojas[0]->name . ' - ' . get_the_title() . ' - ' . get_the_content();
                                }
                            }
                        ?>
                            <tr class="<?php echo $variableTable; ?>">
                                <td><?php echo $singlePremiados->nome; ?></td>
                                <td><?php echo $singlePremiados->email; ?> <?php /* if ($singlePremiados->notification) { echo '<span class="badge badge-success">Notificado</span>'; } else { echo '<span class="badge badge-danger">Não Notificado</span>'; } */ ?></td>
                                <td><a href="https://www.redeconomia.com.br/lojas/?loja=<?php echo $singlePremiados->loja; ?>"><?php echo $nomeLoja; ?></a></td>
                                <td><?php echo $singlePremiados->telefone; ?></td>
                                <td><?php echo $singlePremiados->cpf; ?></td>
                                <td><?php echo $singlePremiados->instagram; ?></td>
                                <td><?php echo strftime("%d/%m/%Y %H:%M", strtotime($singlePremiados->data_hora)); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>