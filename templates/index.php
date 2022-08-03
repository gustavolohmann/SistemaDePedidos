<?php
include_once("header.php");
?>
<div class="container_table_pedido">
    <div class="table_pedido">
        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Cliente</th>
                    <th>Endereço</th>
                    <th>Serviço</th>
                    <th>Telefone</th>
                    <th>Prestador</th>
                    <th>Detalhes</th>
                </tr>
            </thead>
            <tbody class="tbody_table_pedido"></tbody>
        </table>
    </div>
</div>
<div class="container_modal">
    <div class="hidden">
        <button id="fecha_modal"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="modal"></div>
</div>
</div>
<div class='container_modal_finaliza'>
    <div class="container_msn_datetime"></div>
    <div class="hidden_modal_finaliza_pedido_">
        <button type="button" id="hidden_modal_finaliza_pedido"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <form class='container_change_time'>
        <!-- /container_finaliza_pedido -->
        <input type='hidden' value='' name='id_pedido' id='input_finaliza'>
        <div>
            <label for="hora_inicio">Hora de inicio</label>
            <input type='time' name='hora_inicio'>
        </div>
        <div>
            <label for="hora_inicio">Hora de termino</label>
            <input type='time' name='hora_termino'>
        </div>
        <div class="container_button_finaliza_pedido">
            <button class='button_finaliza_pedido' type='submit'>Confirmar</button>
        </div>
    </form>
</div>

<?php
include_once("footer.php");
?>