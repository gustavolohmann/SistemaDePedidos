<?php
include_once("conn.php");

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

function report($sheet, $spreadsheet, $data, $conn)
{

    if (isset($data)) {

        if (!empty($data)) {

            $nome_arquivo = $data["nome_arquivo"];
            $data_termino = $data["pf_data_termino"];
            $data_inicio =  $data["pf_data_inicio"];

            if (!$data_termino && !$data_inicio) {
                $empty = ["error" => "<div class='msn_report_denied'><p>Atenção! Datas inválidas, informe um período válido!</p></div>"];
                return $empty;
            }
            $reports = (" SELECT C.id_cliente,
                                 PR.id_prestador,
                                 PF.id_cliente,
                                 PF.id_prestador,
                                 PF.id_pedido,
                                 PR.nome_prestador,
                                 PR.documento_prestador,
                                 C.nome_cliente,
                                 PF.data_inicio,
                                 PF.data_termino,
                                 PF.hora_inicio,
                                 PF.hora_termino,
                                 PF.valor_a_receber,
                                 PF.valor_a_pagar,
                                 PF.local_servico,
                                 PF.cidade_pedido,
                                 PF.estado_pedido,
                                 PF.endereco_servico
                    FROM cliente C JOIN pedidosFinalizados PF
                    ON PF.id_cliente = C.id_cliente
                    JOIN prestador PR
                    ON PF.id_prestador = PR.id_prestador 
                    WHERE data_inicio >= :data_inicio  AND data_termino <= :data_termino");

            $stmt = $conn->prepare($reports);
            $stmt->bindParam(":data_inicio", $data_inicio);
            $stmt->bindParam(":data_termino", $data_termino);
            $stmt->execute();
            if ($stmt->rowCount() != 0) {

                $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $sheet->setCellValue('A1', 'Pedido Finalizado');
                $sheet->setCellValue('B1', 'Id pedido');
                $sheet->setCellValue('C1', 'Id cliente');
                $sheet->setCellValue('D1', 'Nome prestador');
                $sheet->setCellValue('E1', 'Documento de prestador');
                $sheet->setCellValue('F1', 'Nome do cliente');
                $sheet->setCellValue('G1', 'Data inicio');
                $sheet->setCellValue('H1', 'Data termino');
                $sheet->setCellValue('I1', 'Horário de inicio');
                $sheet->setCellValue('J1', 'Horário de termino');
                $sheet->setCellValue('K1', 'Valor a receber');
                $sheet->setCellValue('L1', 'Valor a pagar');
                $sheet->setCellValue('M1', 'Local de serviço');
                $sheet->setCellValue('N1', 'Cidade');
                $sheet->setCellValue('O1', 'Estado');
                $sheet->setCellValue('P1', 'Rua');

                $sheet->fromArray(
                    $row,
                    NULL,
                    "A2"
                );
                $writer = new Xlsx($spreadsheet);
                $writer->save($nome_arquivo . '.xlsx');

                return $row;
            }
        }
    }
}

$report = report($sheet, $spreadsheet, $_POST, $conn);
echo json_encode($report);
