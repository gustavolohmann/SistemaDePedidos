<?php
include_once("conn.php");


function verify_if_it_exist($data, $conn)
{
    if (isset($data)) {

        if (!empty($data)) {
            // verifca se existe na base de dados
            $documento = $data["documento"];
            $sql =  ("SELECT documento_prestador FROM prestador WHERE documento_prestador = :documento_prestador");
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":documento_prestador", $documento);
            $stmt->execute();

            if ($stmt->rowCount() != 0) {
                $error = ["error" => "<div class='msn_prestador_denied'><p>Prestador já castrado na base de dados!</p></div>"];
                return $error;
            }
            if ($stmt->rowCount() == 0) {
                $verify_ = true;
                $insert_prestador = insert_prestador($verify_, $data, $conn);
                return $insert_prestador;
            }
        }
    }
}
$verify_if_it_exist = verify_if_it_exist($_POST, $conn);
echo json_encode($verify_if_it_exist);
function insert_prestador($verify_, $data, $conn)
{
    if (isset($data)) {

        if ($verify_) {
            $nome_prestador = $data["nome_prestador"];
            $documento = $data["documento"];
            $Telefone_prestador = $data["Telefone_prestador"];
            $Email_prestador = $data["Email_prestador"];
            $cep_prestador = $data["cep_prestador"];
            $cidade_prestador = $data["cidade_prestador"];
            $rua_prestador = $data["rua_prestador"];
            $estado_prestador = $data["estado_prestador"];

            $sql = ("INSERT INTO prestador ( 
                         nome_prestador,
                         documento_prestador,
                         cep_prestador,
                         rua_prestador,
                         cidade_prestador,
                         estado_prestador,
                         telefone_prestador,
                         email_prestador
                
                         ) VALUES (
                
                         :nome_prestador,
                         :documento_prestador,
                         :cep_prestador,
                         :rua_prestador,
                         :cidade_prestador,
                         :estado_prestador,
                         :telefone_prestador,
                         :email_prestador
                
                         ) ");

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":nome_prestador", $nome_prestador);
            $stmt->bindParam(":documento_prestador", $documento);
            $stmt->bindParam(":telefone_prestador", $Telefone_prestador);
            $stmt->bindParam(":email_prestador", $Email_prestador);
            $stmt->bindParam(":cep_prestador", $cep_prestador);
            $stmt->bindParam(":cidade_prestador", $cidade_prestador);
            $stmt->bindParam(":rua_prestador", $rua_prestador);
            $stmt->bindParam(":estado_prestador", $estado_prestador);
            $stmt->execute();
            if ($stmt->rowCount() != 0) {
                $success = ["Success" => "<div class='msn_prestador'><p>Cadastro feito com sucesso!</p></div>"];
                return $success;
            }
        }
    }
}
