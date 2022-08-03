<?php
include_once("conn.php");

function search_client($data, $conn)
{
    if (isset($data)) {
        $req = "%" . $data["data"] . "%";
        $search = ("SELECT * FROM cliente WHERE cnpj_cliente LIKE :cnpj_cliente");
        $stmt = $conn->prepare($search);
        $stmt->bindParam(":cnpj_cliente", $req);
        $stmt->execute();
        if ($stmt->rowCount() != 0) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $rows) {
                extract($rows);
                $dados .=
                    "<thead>
                        <tr>
                            <td>ID</td>
                            <td>Nome cliente</td>
                            <td>CNPJ</td>
                            <td>Telefone</td>
                            <td>Selecionar cliente</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>$id_cliente</td>
                            <td>$nome_cliente</td>
                            <td>$cnpj_cliente</td>
                            <td>$telefone_cliente</td>
                            <td>
                                <div>
                                    <input name='id_cliente' type='checkbox' value='$id_cliente'>
                                </div>
                            </td>
                        </tr>
                    </tbody>";
            }
            return $dados;
        }
    }
}


$search_client = search_client($_POST, $conn);
echo json_encode($search_client);
