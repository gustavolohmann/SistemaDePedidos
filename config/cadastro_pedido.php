<?php
include_once("conn.php");

function insert($data, $conn)
{
    if (isset($data)) {

        if (!empty($data)) {

            $dataInicio  = $data["dataInicio"];
            $dataFinal  = $data["dataFinal"];
            $local_servico  = $data["local_servico"];
            $ValoraReceber  = str_replace(',', '.', $data["ValoraReceber"]);
            $ValoraPagar  = str_replace(',', '.', $data["ValoraPagar"]);
            $cep_pedido = $data["cep_pedido"];
            $cidade_pedido = $data["cidade_pedido"];
            $estado_pedido = $data["estado_pedido"];
            $endereço_servico  = $data["endereço_pedido"];
            $tipo_servico  = $data["tipo_servico"];
            $telefone  = str_replace(" ", "", $data["telefone"]);
            $email  = $data["email"];
            $descricao  = $data["descricao"];
            $id_cliente  = $data["id_cliente"];
            $id_prestador  = $data["id_prestador"];

            $sql = ("INSERT INTO pedido (

                            data_inicio,
                            data_termino,
                            valor_a_receber,
                            valor_a_pagar,
                            local_servico,
                            cep_pedido,
                            endereco_servico,
                            cidade_pedido,
                            estado_pedido,
                            descricao_servico,
                            tipo_servico,
                            telefone_contato,
                            email_contato,
                            id_cliente,
                            id_prestador

                            ) VALUES (

                            :data_inicio,
                            :data_termino,
                            :valor_a_receber,
                            :valor_a_pagar,
                            :local_servico,
                            :cep_pedido,
                            :endereco_servico,
                            :cidade_pedido,
                            :estado_pedido,
                            :descricao_servico,
                            :tipo_servico,
                            :telefone_contato,
                            :email_contato,
                            :id_cliente,
                            :id_prestador

                            ) ");

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(":data_inicio", $dataInicio);
            $stmt->bindParam(":data_termino", $dataFinal);
            $stmt->bindParam(":valor_a_receber", $ValoraReceber);
            $stmt->bindParam(":valor_a_pagar", $ValoraPagar);
            $stmt->bindParam(":local_servico", $local_servico);
            $stmt->bindParam(":cep_pedido",  $cep_pedido);
            $stmt->bindParam(":endereco_servico", $endereço_servico);
            $stmt->bindParam(":cidade_pedido", $cidade_pedido);
            $stmt->bindParam(":estado_pedido", $estado_pedido);
            $stmt->bindParam(":descricao_servico", $descricao);
            $stmt->bindParam(":tipo_servico", $tipo_servico);
            $stmt->bindParam(":telefone_contato",  $telefone);
            $stmt->bindParam(":email_contato", $email);
            $stmt->bindParam(":id_cliente", $id_cliente);
            $stmt->bindParam(":id_prestador", $id_prestador);

            if ($stmt->execute()) {
                $success = [
                    "Success" =>
                    "<div class='msn_pedido'>
                <p>Cadastro feito com sucesso</p>
                </div>"
                ];
                return $success;
            }
        }
    }
}
$insert = insert($_POST, $conn);
echo json_encode($insert);
