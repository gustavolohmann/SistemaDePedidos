<?php
include_once("conn.php");

function search_prestador($data, $conn)
{
    $req = "%" . $data["dataPrestador"] . "%";


    $search = ("SELECT * FROM prestador WHERE documento_prestador LIKE :documento_prestador");
    $stmt = $conn->prepare($search);
    $stmt->bindParam(":documento_prestador", $req);
    $stmt->execute();
    if ($stmt->rowCount() != 0) {
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($row as $rows) {
            extract($rows);
            $dados .=
                "<thead>
                <tr>
                    <td>ID</td>
                    <td>Nome prestador</td>
                    <td>Documento</td>
                    <td>Telefone</td>
                    <td>Selecionar cliente</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>$id_prestador</td>
                    <td>$nome_prestador</td>
                    <td>$documento_prestador</td>
                    <td>$telefone_prestador</td>
                    <td>
                        <div>
                            <input name='id_prestador' type='checkbox' value='$id_prestador'>
                        </div>
                    </td>
                </tr>
            </tbody>";
        }
        return $dados;
    }
}

$search_prestador = search_prestador($_POST, $conn);
echo json_encode($search_prestador);
