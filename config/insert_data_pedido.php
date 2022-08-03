<?php

include_once("conn.php");

function insert_data_($data, $conn)
{
    if (isset($data)) {

        if (!empty($data)) {

            $horaTermino  = $data["hora_termino"];
            $horaInicial  = $data["hora_inicio"];
            $id_pedido = $data["id_pedido"];
            $sql = ("UPDATE pedido SET hora_inicio = :hora_inicio ,hora_termino = :hora_termino 
             WHERE id_pedido = :id_pedido");
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":hora_inicio", $horaInicial);
            $stmt->bindParam(":hora_termino", $horaTermino);
            $stmt->bindParam(":id_pedido", $id_pedido);
            if ($stmt->execute()) {
                $success = [
                    "Success" =>
                    "<div class='msn_data'>
                <p>Horário atualizada com sucesso!</p>
                </div>"
                ];
                return $success;
            }
        }
    }
}
$insert_data_ = insert_data_($_POST, $conn);
echo json_encode($insert_data_);
