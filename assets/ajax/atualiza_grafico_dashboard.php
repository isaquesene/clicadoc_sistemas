<?php	
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$user_id = $_GET['user_id'];
$period = $_GET['period'];

// Get the current date
$currentDate = date('Y-m-d');

if ($period === 'week') {
    // Calculate the start and end dates of the current week
    $startOfWeek = date('Y-m-d', strtotime('last Sunday', strtotime($currentDate)));
    $endOfWeek = date('Y-m-d', strtotime('next Saturday', strtotime($currentDate)));

    // Generate all dates for the week
    $weekDates = array();
    $currentDate = $startOfWeek;
    while ($currentDate <= $endOfWeek) {
        $weekDates[] = $currentDate;
        $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
    }

    //$sql_total_atendimentos = "SELECT COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_id_medico = $user_id AND anmcon_datacad BETWEEN '$startOfWeek' AND '$endOfWeek'";
    $sql = "SELECT DATE(anmcon_datacad) AS date, COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_id_medico = $user_id AND anmcon_datacad BETWEEN '$startOfWeek' AND '$endOfWeek' GROUP BY DATE(anmcon_datacad)";
} elseif ($period === 'month') {
    // Calculate the start and end dates of the current month
    $startOfMonth = date('Y-m-01', strtotime($currentDate));
    $endOfMonth = date('Y-m-t', strtotime($currentDate));

    $sql_total_atendimentos = "SELECT COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_id_medico = $user_id AND anmcon_datacad BETWEEN '$startOfMonth' AND '$endOfMonth'";
} elseif ($period === 'year') {
    // Calculate the start and end dates of the current year
    $startOfYear = date('Y-01-01', strtotime($currentDate));
    $endOfYear = date('Y-12-31', strtotime($currentDate));

    $sql_total_atendimentos = "SELECT COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_id_medico = $user_id AND anmcon_datacad BETWEEN '$startOfYear' AND '$endOfYear'";
}

/* $result_total_atendimentos = mysqli_query($conexao, $sql_total_atendimentos);
$rows_total_atendimentos = mysqli_fetch_array($result_total_atendimentos); */

$result = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  $data[$row['date']] = $row['total_atendimentos'];
}

// Fill in any missing days with 0
foreach ($weekDates as $date) {
    if (!isset($data[$date])) {
        $data[$date] = 0;
    }
}

// Sort the $data array by the day of the week
$sortedData = array();
foreach ($weekDates as $date) {
  $dayOfWeek = date('w', strtotime($date)); // 0 (Sunday) to 6 (Saturday)
  $sortedData[$dayOfWeek] = $data[$date];
}

// Prepare the response as JSON
$response = array('total_atendimentos' => $sortedData);
echo json_encode($response);

/* $total_atendimentos = $rows_total_atendimentos['total_atendimentos']; */

// Prepare the response as JSON
/* $response = array('total_atendimentos' => $total_atendimentos);
echo json_encode($response); */
?>
