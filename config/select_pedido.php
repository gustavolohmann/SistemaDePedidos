<?php
include_once("conn.php");
// print_r($_POST['id']);
function selectInTableOrder($data, $conn)
{

    if (!empty($data)) {

        $id = $data["id"];
        $select = ("SELECT * FROM pedido WHERE id_pedido = :id_pedido");
        $stmt = $conn->prepare($select);
        $stmt->bindParam(":id_pedido", $id);
        $stmt->execute();

        if ($stmt->rowCount() != 0) {

            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($row as $rows) {

                extract($rows);
                $valor_a_pagar = str_replace('.', ',', $valor_a_pagar);
                $valor_a_receber = str_replace('.', ',', $valor_a_receber);
                $selectOrder .=

                    "<div class='container_inside_of_modal'>
                 <div class='id_inside_of_modal'>
                     <p>Numero do pedido: $id_pedido</p>
                 </div>
                 <div class='details_inside_of_modal'>
                 <table>
                     <thead>
                         <tr>
                             <th>Data de inicio</th>
                             <th>Data de termino</th>
                             <th>Valor a pagar</th>
                             <th>Valor a receber</th>
                             <th>Endereço do serviço</th>
                             <th>Cidade</th>
                             <th>Local de serviço</th>
                             <th>Horário inicio</th>
                             <th>Horário termino</th>
                              </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$data_inicio</td>
                                <td>$data_termino</td>
                                  <td>$valor_a_pagar</td>
                                  <td>$valor_a_receber</td>
                                  <td>$endereco_servico</td>
                                  <td>$cidade_pedido</td>
                                  <td>$local_servico</td>   
                                  <td>$hora_inicio</td>
                                  <td>$hora_termino</td>
                              </tr>
                          </tbody>
                      </table>
                      </div>
                      <div class='descricao_modal_details'>
                          <p>Descrição do serviço:$descricao_servico</p>
                      </div>
                  </div>";
            }
            return $selectOrder;
        }
    }
}
$select_pedido = selectInTableOrder($_POST, $conn);
echo json_encode($select_pedido);
