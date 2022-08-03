<?php
include_once("conn.php");

function verify_if_exist_client($data, $conn)
{

    if (isset($data)) {
        if (!empty($data)) {
            $cnpj = $data["CNPJ"];
            $sql = ("SELECT cnpj_cliente FROM cliente WHERE cnpj_cliente = :cnpj_cliente");
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":cnpj_cliente", $cnpj);
            $stmt->execute();

            if ($stmt->rowCount() != 0) {
                $error = ["error" => "<div class='msn_denied_client'><p>Cliente já cadastrado na base de dados!</p><div>"];
                return $error;
            }
            if ($stmt->rowCount == 0) {
                $verif_ = true;
                $insert = insert($verif_, $data, $conn);
                return $insert;
            }
        }
    }
}
$verify_if_exist_client = verify_if_exist_client($_POST, $conn);
echo json_encode($verify_if_exist_client);
function insert($verif_, $data, $conn)
{

    if ($verif_) {


        $nome_cliente  = $data["nome_cliente"];
        $cnpj = $data["CNPJ"];
        $cep = $data["CEP"];
        $cidade = $data["Cidade"];
        $rua = $data["Rua"];
        $estado = $data["Estado"];
        $Email =  $data["Email"];
        $Telefone = $data["Telefone"];
        $sql = ("INSERT INTO cliente (

                nome_cliente,
                cnpj_cliente,
                cep_cliente,
                rua_cliente,
                cidade_cliente,
                estado_cliente,
                telefone_cliente,
                email_cliente

                ) VALUES (

                :nome_cliente,
                :cnpj_cliente,
                :cep_cliente,
                :rua_cliente,
                :cidade_cliente,
                :estado_cliente,
                :telefone_cliente,
                :email_cliente
                ) ");

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(":nome_cliente", $nome_cliente);
        $stmt->bindParam(":cnpj_cliente", $cnpj);
        $stmt->bindParam(":telefone_cliente", $Telefone);
        $stmt->bindParam(":cep_cliente", $cep);
        $stmt->bindParam(":cidade_cliente", $cidade);
        $stmt->bindParam(":estado_cliente", $estado);
        $stmt->bindParam(":rua_cliente", $rua);
        $stmt->bindParam(":email_cliente", $Email);

        if ($stmt->execute()) {
            $success = [
                "Success" =>
                "<div class='msn'>
            <p>Cadastro feito com sucesso!</p>
        </div>"
            ];
            return $success;
        }
    }
}
