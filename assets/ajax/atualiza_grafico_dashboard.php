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
    
    $sql = "SELECT DATE(anmcon_datacad) AS date, COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_id_medico = $user_id AND anmcon_datacad BETWEEN '$startOfWeek' AND '$endOfWeek' GROUP BY DATE(anmcon_datacad)";

    if($_SESSION["clicadoc_user_perfil"] == 1){

        $sql = "SELECT DATE(anmcon_datacad) AS date, COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_datacad BETWEEN '$startOfWeek' AND '$endOfWeek' GROUP BY DATE(anmcon_datacad)";
    }

    
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

    $response = array('total_atendimentos' => $sortedData);
    echo json_encode($response);


    
} elseif ($period === 'month') {

    // Calculate the start and end dates of the current month
    $startOfMonth = date('Y-m-01', strtotime($currentDate));
    $endOfMonth = date('Y-m-t', strtotime($currentDate));

    // Generate all dates for the month
    $monthDates = array();
    $currentDate = $startOfMonth;
    while ($currentDate <= $endOfMonth) {
        $monthDates[] = $currentDate;
        $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
    }

    // Divide the dates into weeks
    $weeks = array_chunk($monthDates, 7);

    // Initialize an empty array for week totals
    $weekTotals = array();

    // Iterate over each week
    foreach ($weeks as $week) {
        $startOfWeek = $week[0];
        $endOfWeek = end($week);
        
        $sql = "SELECT DATE(anmcon_datacad) AS date, COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_id_medico = $user_id AND anmcon_datacad BETWEEN '$startOfWeek' AND '$endOfWeek' GROUP BY DATE(anmcon_datacad)";

        if($_SESSION["clicadoc_user_perfil"] == 1){
            
            $sql = "SELECT DATE(anmcon_datacad) AS date, COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_datacad BETWEEN '$startOfWeek' AND '$endOfWeek' GROUP BY DATE(anmcon_datacad)";
        }
        
        $result = mysqli_query($conexao, $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[$row['date']] = $row['total_atendimentos'];
        }

        // Fill in any missing days with 0
        foreach ($week as $date) {
            if (!isset($data[$date])) {
                $data[$date] = 0;
            }
        }

        // Sort the $data array by the date
        ksort($data);

        // Calculate the total for the week
        $weekTotal = array_sum(array_values($data));

        // Store the week total
        $weekTotals[] = $weekTotal;
    }

    // Prepare the response as JSON
    $response = array('total_atendimentos' => $weekTotals);
    echo json_encode($response);


} elseif ($period === 'year') {
    // Calculate the start and end dates of the current year
    $startOfYear = date('Y-01-01', strtotime($currentDate));
    $endOfYear = date('Y-12-31', strtotime($currentDate));

    // Generate all dates for the year
    $yearDates = array();
    $currentDate = $startOfYear;
    while ($currentDate <= $endOfYear) {
        $yearDates[] = $currentDate;
        $currentDate = date('Y-m-d', strtotime('+1 day', strtotime($currentDate)));
    }

    // Divide the dates into months
    $months = array_chunk($yearDates, date('t', strtotime($startOfYear)));

    // Initialize an empty array for month totals
    $monthTotals = array();

    // Iterate over each month
    foreach ($months as $month) {
        $startOfMonth = $month[0];
        $endOfMonth = end($month);

        $sql = "SELECT DATE(anmcon_datacad) AS date, COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_id_medico = $user_id AND anmcon_datacad BETWEEN '$startOfMonth' AND '$endOfMonth' GROUP BY DATE(anmcon_datacad)";

        if($_SESSION["clicadoc_user_perfil"] == 1){
            
            $sql = "SELECT DATE(anmcon_datacad) AS date, COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_datacad BETWEEN '$startOfMonth' AND '$endOfMonth' GROUP BY DATE(anmcon_datacad)";
        }
        
        $result = mysqli_query($conexao, $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[$row['date']] = $row['total_atendimentos'];
        }

        // Fill in any missing days with 0
        foreach ($month as $date) {
            if (!isset($data[$date])) {
                $data[$date] = 0;
            }
        }

        // Sort the $data array by the date
        ksort($data);

        // Calculate the total for the month
        $monthTotal = array_sum(array_values($data));

        // Store the month total
        $monthTotals[] = $monthTotal;
    }

    // Prepare the response as JSON
    $response = array('total_atendimentos' => $monthTotals);
    echo json_encode($response);
    
} else if ($period === 'today') {
    // Calculate the start and end dates of the current day
    $startOfDay = date('Y-m-d 00:00:00', strtotime($currentDate));
    $endOfDay = date('Y-m-d 23:59:59', strtotime($currentDate));

    $sql = "SELECT COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_id_medico = $user_id AND anmcon_datacad BETWEEN '$startOfDay' AND '$endOfDay'";

    if($_SESSION["clicadoc_user_perfil"] == 1){

        $sql = "SELECT COUNT(*) AS total_atendimentos FROM tanam_dados_consulta WHERE anmcon_datacad BETWEEN '$startOfDay' AND '$endOfDay'";
    }
    
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    $totalAtendimentos = $row['total_atendimentos'];

    // Prepare the response as JSON
    $response = array('total_atendimentos' => $totalAtendimentos);
    echo json_encode($response);
}

?>
