<?php
session_start();
include_once("conn.php");

function acess_login($acess, $conn)
{
    if (!empty($acess)) {

        $email = $acess["email_acess"];
        $pass = $acess["pass"];

        $select_user = ("SELECT * FROM  login  WHERE email_acess = :email_acess AND pass = :pass");
        $stmt = $conn->prepare($select_user);
        $stmt->bindParam(":email_acess", $email);
        $stmt->bindParam(":pass", $pass);
        $stmt->execute();

        if ($stmt->rowCount()) {
            $row =  $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($row != 0) {
                $_SESSION["acesss"] = true;
                $success = ["success" => true];
                return $success;
            }
        }
        if ($stmt->rowCount() == 0) {
            $error = ["error" => "<div class='access_denied'><p>Dados informados incorretos ou inexistentes! Por favor, verifique os campos obrigatórios e tente novamente!</p><div>"];
            return $error;
        }
    }
}
$acess_login = acess_login($_POST, $conn);
echo json_encode($acess_login);
