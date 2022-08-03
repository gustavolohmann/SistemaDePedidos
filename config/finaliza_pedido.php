<?php
include_once("conn.php");
function delete($data, $conn)
{
    if (isset($data)) {
        if (!empty($data)) {
            $id = $data["id"];
            $delete = ("DELETE FROM pedido WHERE id_pedido = :id_pedido");
            $stmt = $conn->prepare($delete);
            $stmt->bindParam(":id_pedido", $id);
            $stmt->execute();
        }
    }
}
$delete = delete($_POST, $conn);
