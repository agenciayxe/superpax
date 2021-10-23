<?php 
add_action('admin_head', 'style_work');

function style_work() {
    ?>
    <style type="text/css">
    .teetime-booking-view { font-size: 18px}
    .table-teetime-booking { box-sizing: border-box; width: 100%; }
    table.table-teetime-booking tr td { padding: 10px 15px; background-color: #dedede; font-size: 18px; word-wrap: break-word; word-break: break-word; }
    table.table-teetime-booking tr td:first-child { background-color: #a00000; color: #efefef; width: 120px !important; text-align: right}
    .teetime-booking.row { display: flex; flex-flow: row wrap; } 
    /* .teetime-columm { flex: 1; } */
    .teetime-column.col-1 { width: 10%; }
    .teetime-column.col-2 { width: 20%; }
    .teetime-column.col-3 { width: 30%; }
    .teetime-column.col-4 { width: 40%; }
    .teetime-column.col-5 { width: 50%; }
    .teetime-column.col-6 { width: 60%; }
    .teetime-column.col-7 { width: 70%; }
    .teetime-column.col-8 { width: 80%; }
    .teetime-column.col-9 { width: 90%; }
    .teetime-column.col-10 { width: 100%; }

    .teetime-column.col-33 { width: 33.3%; }
    @media print {
      body * {
        visibility: hidden;
      }
      #wpbody-content #message, #wpbody-content #message * {
        visibility: hidden !important;
      }
      #wpbody-content, #wpbody-content * {
        visibility: visible !important;
      }
      #wpbody-content {
        position: fixed;
        left: 0;
        top: 0;
      }
    }
    </style>
    <script>
        var statusPoint = 0;
        function actionPoint(idCadastro, acao) {
            if (statusPoint == 0) {
                statusPoint = 1;
                jQuery.post(ajaxurl, {
                    action: 'count_post',
                    id: idCadastro,
                    acao: acao
                }, function (returnAction) {
                    responseAction = JSON.parse(returnAction);
                    if (responseAction.status) {
                        jQuery(".point-"+ idCadastro + " #count").each(function () { jQuery(this).html(responseAction.value); });
                        statusPoint = 0;
                    }
                    else { alert(responseAction.message); statusPoint = 0; }
                });
            }
            else { alert('Aguarde a pontuação ser atualizada na tela para adicionar mais pontuações.');}
        }
        function pointLess(idCadastro) {
            actionPoint(idCadastro, 'less');
        }
        function pointMore(idCadastro) {
            actionPoint(idCadastro, 'more');
        }
    </script>
    <?php
}
?>