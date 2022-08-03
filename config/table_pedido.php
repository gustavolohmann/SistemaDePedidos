<?php

include_once("conn.php");

function relatorio($data, $conn)
{
    if (isset($data)) {

        $select = ("SELECT

        p.id_pedido, 
        c.nome_cliente ,
        p.endereco_servico,
        p.descricao_servico,
        p.tipo_servico,
        p.valor_a_pagar, 
        p.valor_a_receber,
        p.tipo_servico,
        p.telefone_contato,
        pr.nome_prestador,
        p.cep_pedido,
        p.cidade_pedido,
        p.endereco_servico,
        p.estado_pedido,
        p.data_inicio,
        p.data_termino,
        pr.documento_prestador

        from cliente c join pedido p 
        on c.id_cliente = p.id_cliente
        join prestador pr
        on pr.id_prestador = p.id_prestador
        order by id_pedido");

        $stmt = $conn->prepare($select);
        $stmt->execute();

        if ($stmt->rowCount() != 0) {

            $row =  $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($row != 0) {

                foreach ($row as $rows) {
                    extract($rows);
                    $table .=
                    "<tr>
                        <td>$id_pedido</td>
                        <td>$nome_cliente</td>
                        <td>$endereco_servico</td>
                        <td>$tipo_servico</td>
                        <td>$telefone_contato</td>
                        <td>$nome_prestador</td>
                        <td>
                            <div class='verifyStatus'>
                                <button type='button' id='button_status' onclick='modal($id_pedido)' name='button_status'><i class='fa-solid fa-file-excel'></i></button>
                                <button type='button' id='open_menu_finaliza_pedido' onclick='open_menu_finaliza_pedido($id_pedido)'>Horário pedido</button>
                                <button type='button' id='delete_order' name='button_delete' onclick='form_delete($id_pedido)'>Finalizar</button>
                            </div>
                        </td>
                    </tr>";
                }
                return $table;
            }
        }
    }
}

$relatorio = relatorio($_POST, $conn);
echo json_encode($relatorio);
