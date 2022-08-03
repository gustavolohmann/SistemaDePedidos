<?php
include_once("header.php");
?>
<div class="relatorio">
    <div class="msn_error_report"></div>
    <div class="titulo_form_relatorio">
        <h1>Relatório de pedidos</h1>
    </div>
    <form class="_pesquisa_relatorio">
        <input type="text" name="nome_arquivo" class="nome_arquivo" placeholder="Digite um nome para sua planilha">
        <input type="date" name="pf_data_inicio" class="pf_data_inicio">
        <input type="date" name="pf_data_termino" class="pf_data_termino">
        <button type="submit" id="pf_button_relatorio"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>

<?php
include_once("footer.php");
?>