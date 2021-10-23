<?php 
function my_plugin_options() {
    global $wpdb;
    $action = (isset($_GET['action'])) ? $_GET['action'] : false;
    $page = (isset($_GET['p'])) ? (int) $_GET['p'] : 1;
    $search = ( isset($_GET['s']) ) ? (string) $_GET['s'] : false;
    $actionPesquisa = ($search) ? " WHERE name LIKE '%{$search}%' OR email LIKE '%{$search}%' OR phone LIKE '%{$search}%'" : '';
    $quantityPage = 25;
    $AllBookings = $wpdb->get_results(
        "SELECT * FROM form_contact {$actionPesquisa}"
    );
    $quantityBookings = count($AllBookings);
    $offsetPage = ($page * $quantityPage) - $quantityPage;
    $totalPage = ceil($quantityBookings / $quantityPage);
    if (!$action) {
        $bookingList = $wpdb->get_results(
            "SELECT * FROM form_contact {$actionPesquisa} ORDER BY date_created DESC LIMIT {$quantityPage} OFFSET {$offsetPage}"
        );
        ?>
        <div class="wrap">
            <h2>Cadastro</h2>
            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-3">
                    <form action="">
                        <p class="search-box">
                            <label class="screen-reader-text" for="post-search-input">Pesquisar Cadastros:</label>
                            <input type="hidden" name="page" value="form-contact">
                            <input type="search" id="post-search-input" name="s" value="<?php if ($search) { echo $search; } ?>">
                            <input type="submit" id="search-submit" class="button" value="Pesquisar Cadastros">
                        </p>
                    </form>
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <form method="post">
                                <input type="hidden" id="_wpnonce" name="_wpnonce" value="065cb4d44c">
                                <input type="hidden" name="_wp_http_referer" value="?page=form-contact">
                                <?php 
                                if ($totalPage > 1) {
                                    ?>
                                    <div class="tablenav top">
                                        <div class="tablenav-pages">
                                            <span class="displaying-num"><?php echo $quantityBookings; ?> pessoas cadastradas</span>
                                            <span class="pagination-links">
                                                <?php 
                                                if ($page == 1) {
                                                    ?>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">«</span>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <a class="next-page" href="?page=form-contact&amp;p=<?php echo 1; ?>">
                                                        <span class="screen-reader-text">Página anterior</span>
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                    <a class="last-page" href="?page=form-contact&amp;p=<?php echo $page-1; ?>">
                                                        <span class="screen-reader-text">Primeira página</span>
                                                        <span aria-hidden="true">‹</span>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                                <span class="paging-input">
                                                    <label for="current-page-selector" class="screen-reader-text">
                                                        Página atual
                                                    </label>
                                                    <input class="current-page" id="current-page-selector" type="text" name="p" value="<?php echo $page; ?>" size="<?php echo $totalPage; ?>" aria-describedby="table-paging">
                                                    <span class="tablenav-paging-text"> de <span class="total-pages"><?php echo $totalPage; ?></span></span>
                                                </span>
                                                <?php 
                                                if ($page == $totalPage) {
                                                    ?>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">›</span>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">»</span>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <a class="next-page" href="?page=form-contact&amp;p=<?php echo $page + 1; ?>">
                                                        <span class="screen-reader-text">Próxima página</span>
                                                        <span aria-hidden="true">›</span>
                                                    </a>
                                                    <a class="last-page" href="?page=form-contact&amp;p=<?php echo $totalPage; ?>">
                                                        <span class="screen-reader-text">Última página</span>
                                                        <span aria-hidden="true">»</span>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <br class="clear">
                                    </div>
                                    <?php
                                }
                                if ($bookingList) {
                                    ?>
                                    <table class="wp-list-table widefat fixed striped cadastros">
                                        <thead>
                                            <tr>
                                                <td id="cb" class="manage-column column-cb check-column">
                                                    <label class="screen-reader-text" for="cb-select-all-1">Selecionar todos</label><input id="cb-select-all-1" type="checkbox">
                                                </td> 
                                                <th scope="col" id="nome" class="manage-column column-nome column-primary"> Nome </th>
                                                <th scope="col" id="email" class="manage-column column-email"> E-mail </th> 
                                                <th scope="col" id="email" class="manage-column column-email"> Telefone </th> 
                                                <th scope="col" id="mensagem" class="manage-column column-mensagem"> Assunto </th>
                                                <th scope="col" id="telefone" class="manage-column column-telefone"> Data de Cadastro </th> 
                                            </tr>
                                        </thead>
                                        <tbody id="the-list">
                                            <?php 
                                            foreach ($bookingList as $bookingCurrent) {
                                                ?>
                                                <tr id="post-20" class="iedit author-self level-0 post-20 type-page status-publish hentry">
                                                    <th scope="row" class="check-column">
                                                        <input id="cb-select-20" type="checkbox" name="post[]" value="20">
                                                    </th>
                                                    <td class="title column-title has-row-actions column-primary page-title" data-colname="Título">
                                                        <div class="locked-info"><span class="locked-avatar"></span><span class="locked-text"></span></div>
                                                        <strong>
                                                            <a class="row-title" href="?page=form-contact&action=view&id=<?php echo $bookingCurrent->id; ?>">
                                                                <?php echo $bookingCurrent->name; ?>
                                                            </a>
                                                        </strong>
                                                       <!--  <div class="row-actions">
                                                            <span class="edit">
                                                                <a href="" aria-label="Editar “Academia”">Editar</a>
                                                                | 
                                                            </span>
                                                            <span class="inline hide-if-no-js">
                                                                <a href="#" class="editinline" aria-label="Editar diretamente “Academia”">Edição rápida</a>
                                                                | 
                                                            </span>
                                                            <span class="trash">
                                                                <a href="http://localhost/fabiofreitas/golfe/wp-admin/post.php?post=20&amp;action=trash&amp;_wpnonce=46d7bd15df" class="submitdelete" aria-label="Mover “Academia” para a lixeira">Colocar na lixeira</a>
                                                                | 
                                                            </span>
                                                            <span class="view">
                                                                <a href="http://localhost/fabiofreitas/golfe/academia/" rel="bookmark" aria-label="Ver “Academia”">Ver</a>
                                                            </span>
                                                        </div> -->
                                                        <button type="button" class="toggle-row"><span class="screen-reader-text">Mostrar mais detalhes</span></button>
                                                    </td>
                                                    <td class="author column-author" data-colname="E-mail"><?php echo $bookingCurrent->email; ?></td>
                                                    <td class="author column-author" data-colname="Telefone"><?php echo $bookingCurrent->phone; ?></td>
                                                    <td class="date column-date" data-colname="Data"><?php echo strftime("%d/%m/%Y %H:%M", strtotime($bookingCurrent->date_created)); ?></td>
                                                </tr>
                                                <?php 
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td id="cb" class="manage-column column-cb check-column">
                                                    <label class="screen-reader-text" for="cb-select-all-1">Selecionar todos</label><input id="cb-select-all-1" type="checkbox">
                                                </td> 
                                                <th scope="col" id="nome" class="manage-column column-nome column-primary"> Nome </th>
                                                <th scope="col" id="email" class="manage-column column-email"> E-mail </th> 
                                                <th scope="col" id="email" class="manage-column column-email"> Telefone </th> 
                                                <th scope="col" id="mensagem" class="manage-column column-mensagem"> Assunto </th>
                                                <th scope="col" id="telefone" class="manage-column column-telefone"> Data de Cadastro </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <?php 
                                }
                                else {
                                    ?>
                                    <p>Nenhum dado encontrado no sistema.</p>
                                    <?php
                                }

                                if ($totalPage > 1) {
                                    ?>
                                    <div class="tablenav bottom">
                                        <div class="tablenav-pages">
                                            <span class="displaying-num">
                                                <?php echo $quantityBookings; ?> pessoas cadastradas
                                            </span>
                                            <span class="pagination-links">
                                                <?php 
                                                if ($page == 1) {
                                                    ?>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">«</span>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">‹</span>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <a class="next-page" href="?page=form-contact&amp;p=<?php echo 1; ?>">
                                                        <span class="screen-reader-text">Página anterior</span>
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                    <a class="last-page" href="?page=form-contact&amp;p=<?php echo $page-1; ?>">
                                                        <span class="screen-reader-text">Primeira página</span>
                                                        <span aria-hidden="true">‹</span>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                                <span class="paging-input">
                                                    <label for="current-page-selector" class="screen-reader-text">
                                                        Página atual
                                                    </label>
                                                    <input class="current-page" id="current-page-selector" type="text" name="p" value="<?php echo $page; ?>" size="<?php echo $totalPage; ?>" aria-describedby="table-paging">
                                                    <span class="tablenav-paging-text"> de <span class="total-pages"><?php echo $totalPage; ?></span></span>
                                                </span>
                                                <?php 
                                                if ($page == $totalPage) {
                                                    ?>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">›</span>
                                                    <span class="tablenav-pages-navspan" aria-hidden="true">»</span>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <a class="next-page" href="?page=form-contact&amp;p=<?php echo $page + 1; ?>">
                                                        <span class="screen-reader-text">Próxima página</span>
                                                        <span aria-hidden="true">›</span>
                                                    </a>
                                                    <a class="last-page" href="?page=form-contact&amp;p=<?php echo $totalPage; ?>">
                                                        <span class="screen-reader-text">Última página</span>
                                                        <span aria-hidden="true">»</span>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <br class="clear">
                                    </div>
                                    <?php 
                                }

                                ?>
                            </form>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>
    <?php
    }
    else if ($action == 'view') {
        $id = (isset($_GET['id'])) ? $_GET['id']: false;
        $promotionList = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM form_contact WHERE id='%s'",
                $id
            )
        );
        $quantityPromotion = count($promotionList);
        if ($quantityPromotion == 1) {
            $promotionCurrent = $promotionList[0];
            ?>
            <div class="wrap teetime-booking-view">
                <h2>Promoção de Aniversário - Cadastro</h2>
                <div class="teetime-booking row">
                    <div id="post-body" class="teetime-column col-10">
                        <h3>Cliente</h3>
                        <table class="table-teetime-booking">
                            <tr><td><strong>Nome</strong></td><td><?php echo $promotionCurrent->name; ?></td></tr>
                            <tr><td><strong>E-mail</strong></td><td><?php echo $promotionCurrent->email; ?></td></tr>
                            <tr><td><strong>Telefone</strong></td><td><?php echo $promotionCurrent->phone; ?></td></tr>
                            <tr><td><strong>Mensagem</strong></td><td><?php echo $promotionCurrent->message; ?></td></tr>
                        </table>
                        <p>A cadastro foi feita no dia <?php echo strftime("%d/%m/%Y às %H:%M", strtotime($promotionCurrent->date_created)); ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
?>