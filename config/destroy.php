<?php
session_start();

function destroy_session($data)
{
    if (isset($_SESSION["acesss"]) && !empty($data["session"])) {
        session_destroy();
        unset($_SESSION["acesss"]);
        $destroy = ["finaliza_sessao" => true];
        return $destroy;
    }
}
$destroy_session = destroy_session($_POST);
echo json_encode($destroy_session);
