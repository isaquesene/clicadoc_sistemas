<?php
require_once 'vendor/autoload.php';
include 'include/mysqlconecta.php';

if ($_POST) {
    $client = new \GuzzleHttp\Client();
    $hoje = date('Y-m-d', strtotime('+5 days'));

    $acao = $_POST['acao'];

    $anmpac_med_presc = $_POST['anmpac_med_presc'];
    $anmpac_tratamento = $_POST['anmpac_tratamento'];
    $anmpac_alergia = $_POST['anmpac_alergia'];
    $anmpac_nom = $_POST['anmpac_nom'];
    $anmpac_numcel = $_POST['anmpac_numcel'];
    $anmpac_cpf = $_POST['anmpac_cpf'];
    $anmpac_mail = $_POST['anmpac_mail'];

    if ($acao === 'cadastrar') {

        $url = 'https://api.iugu.com/v1/invoices?api_token=B5F7754B7EE530890A544D1BD7B4CFA3C3A73DC3BA71FFC77B19D98969B21666';
        $body = [
            'ensure_workday_due_date' => false,
            'items' => [
                [
                    'description' => 'Atendimento',
                    'quantity' => 1,
                    'price_cents' => 9500
                ]
            ],
            'email' => $anmpac_mail,
            'due_date' => $hoje
        ];
        $headers = [
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'Authorization' => 'Basic {{api_token in base64}}',
            'Cookie' => '__cfruid=4de6e8d698f34284d42117520658036e571b03dc-1634570591',
        ];

        $response = $client->request('POST', $url, [
            'json' => $body,
            'headers' => $headers,
        ]);


        $responseData = json_decode($response->getBody(), true);

	 if (isset($responseData['secure_url'])) {
        
            $secureUrl = $responseData['secure_url'];
            $anmpac_pagamento_fatura = $responseData['id'];

            $SQL = "INSERT INTO tanam_dados_pacientes (anmpac_med_presc, anmpac_tratamento, anmpac_alergia, anmpac_nom, anmpac_cpf, anmpac_numcel, anmpac_pagamento_status, anmpac_pagamento_fatura,anmpac_mail) VALUES ('$anmpac_med_presc', '$anmpac_tratamento', '$anmpac_alergia', '$anmpac_nom', '$anmpac_cpf', '$anmpac_numcel', 'pendente','$anmpac_pagamento_fatura', '$anmpac_mail')";
            mysqli_query($conexao, $SQL) or die("Ocorreu um problema! Código: 001");
        
        } else {
            echo "Ocorreu um erro ao gerar sua fatura. Por favor, tente novamente.";
            //IMPLEMENTAR POPUP PARA MENSAGEM AO USUÁRIO
        }        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css_h/estyle.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!--AJAX-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>ClicaDoc</title>
</head>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QK1X3JFN56"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-QK1X3JFN56'); </script>
<body id="b">
    <!--HEADER-->
    <header>
        <a href="#" class="logo"><img src="assets/image/logo_icon.png"></a>

        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navlist">
            <li><a href="http://clicadoc.com.br">HOME</a></li>
            <li><a href="https://clicadoc.com.br/admin/formulario.php">FORMULARIO</a></li>
        </ul>
    </header>
    <!--FIM HEADER-->
    <section class="receitas" id="receitas" style="background: #F4FFFF;">
        <div class="receitas-img">
            <img src="assets/image/Group_44.png" alt="">
        </div>
        <div class="item">
            <h3>Pague seu <span>atendimento</span> médico agora.</h3>
            <p> - Clique no botão e acesse a página de pagamento.</p>
            <a href="<?= $secureUrl ?? '#' ?>" id="open-form" target="_blank" data-modal="open" class="btn-receita">PAGUE SEU ATENDIMENTO AQUI</a>
        </div>
    </section>

    <!--footer-->
    <section class="ends">
        <div class="credit">CLICADOC TECNOLOGIA  LTDA - CNPJ: 43.722.721/0001-18</div><br>

        <div class="credit-footer"> Desenvolvido por <span>ITA Ventures</span> © 2023 </div>
    </section>


    <!--MASCARA CPF-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <script type="text/javascript" src="assets/js/inputmask.js" charset="utf-8"></script>

    <script src="https://unpkg.com/scrollreveal"></script>

    <script src="assets/js_h/script.js"></script>

    <script src="assets/js_h/scroll.js"></script>
</body>
</html>

