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
            <li><a href="index.html">HOME</a></li>
            <li><a href="#receita">FORMULARIO</a></li>
            <li><a href="#servicos">SERVIÇOS</a></li>
        </ul>
    </header>
    <!--FIM HEADER-->
    <section class="card" id="receita">
        <div class="card_form">
            <div class="image">
                <img src="assets/image/image_form.png" alt="">
            </div>
            <form method="post" id="formulario_atendimento">
            <input type="hidden" name="acao" id="acao" value="cadastrar">
                <span class="title">Solicite Agora sua receita médica, com garantia e segurança.</span>
                <p>Receba a receita direto no seu celular.
                    As receitas médicas têm validade em todas as farmácias do Brasil.
                    Resolva agora, sem agendamento, sem demora e sem fila.
                    Médicos 100% Online. 24h.
                </P>
                <div class="input-box">
                    <span class="details">Qual MEDICAMENTO você usa e precisa renovar a receita?*</span>
                    <input class="input" type="text" placeholder="Descreva aqui..." name="anmpac_med_presc" id="anmpac_med_presc" required>
                </div>
                <div class="input-box">
                    <span class="details">Para qual problema de saúde, seu médico prescreveu este medicamento?*</span>
                    <input class="input" type="text" placeholder="Descreva aqui..." name="anmpac_tratamento" id="anmpac_tratamento" required>
                </div>
                <div class="input-box">
                    <span class="details">Tem alergia a algum medicamento?*</span>
                    <input class="input" type="text" placeholder="Descreva aqui..." name="anmpac_alergia" id="anmpac_alergia" required>
                </div>
                <div class="input-box">
                    <span class="details">Qual seu nome completo? (Informe corretamente, para ser colocado na sua receita)</span>
                    <input class="input" type="text" placeholder="Descreva aqui..." name="anmpac_nom" id="anmpac_nom" required>
                </div>
                <div class="input-box">
                    <span class="details">Qual seu CPF? (Informe corretamente, para ser colocado na sua receita)</span>
                    <input class="input" type="text" name="anmpac_cpf" id="cpf-input"  onfocusout="verificarCPF()"  data-inputmask="'mask': '999.999.999-99', 'removeMaskOnSubmit': false" required>
                    <p id="mensagem"></p>
                </div>
                <div class="input-box">
                    <span class="details">Qual seu celular com DDD? (Informe corretamente, pois receberá a sua receita pelo WhatsApp)</span>
                    <input class="input" type="phone" placeholder="(_) _____-____" name="anmpac_numcel" id="anmpac_numcel" required>
                </div>
                <div class="input-box">
                    <span class="details">Teste Pagamento:</span>
                    <input class="input" type="text" placeholder="" name="anmpac_pagamento_status" id="anmpac_pagamento_status">
                </div>
                <span class="title">Solicite Agora sua receita médica, com garantia e segurança.</span><br>
                <div class="termo">
                    <p>
                        Afirmo que sou maior de idade e que todas as informações fornecidas são verdadeiras, sob as penas da lei.
                        Autorizo o uso das minhas informações, que ficarão em sigilo e guardadas em prontuário, para fins de atendimento médico..
                        Fui informado que a Telessaúde tem limitações, por ser uma modalidade de atendimento à distância, sem exame físico e que no caso de sintomas, devo procurar atendimento presencial.
                        Estou ciente de que a Teletriagem, como nesse caso, é um atendimento momentâneo, que não faz novo diagnóstico, mas avalia os sinais e sintomas de um caso que já tenha diagnóstico prévio. No caso de baixo risco, o médico emite uma conduta, até o paciente retornar em seu médico presencial.
                        Fui orientado que, assim que possível, devo retornar no meu médico.
                        Afirmo que não tenho sinal ou sintoma de descontrole da minha doença prévia. No caso de sintoma, fui orientado a procurar atendimento presencial.
                        Nego qualquer tipo de alergia relacionado aos medicamentos que já uso, que foram prescritos pelo meu médico.
                        Fui informado que este é um serviço de intermediação tecnológica e que o médico tem plena autonomia para fazer o atendimento de Telessaúde, por meio da Plataforma Clica Doc, desde que haja consentimento do paciente.
                        Todas as condutas são realizadas e as receitas são enviadas pelo médico, com total autonomia e sem interferência da Plataforma Clica Doc.
                        A Plataforma não realiza videoconsulta e não interfere na relação médico-paciente.
                        Aviso legal: A Clica Doc é uma empresa  de Tecnologia de Sistemas e não presta serviços médicos. A Plataforma Clica Doc é um Sistema dê Telessaúde que conecta profissionais de saúde com seus pacientes.
                        O preço do serviço de tecnologia da Plataforma depende do uso do sistema e do profissional a ser contatado.
                        Clica Doc Tecnologia 
                        CNPJ: 43.722.721/0001-18
                        São José dos Campos-SP
                    </p>
                </div>
                <div class="input-radio">
                    <span class="details">
                    <input class="input" type="radio" name="endereco" id="endereco" onchange="checkTermos()">
                        
                    Li e concordo com os termos acima.

                    </span>
                </div>
                <div class="button">
                    <input type="submit" value="Enviar" style="cursor: pointer;" id="botaoEnviar" disabled>
                </div>
            </form>
        </div>
        
    </section>

    <style>
        .modal {
        display: none;
        position: fixed; 
        z-index: 9999; 
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto; 
        background-color: rgba(0, 0, 0, 0.4); 
        }

        .modal-content {
        background-color: #fefefe;
        margin: 20% auto; 
        padding: 20px;
        border: 1px solid #888;
        width: 300px;
        justify-content: center;
        place-items: center;
        text-align: center;
        }

        h3{
            font-size: 20px;
            margin-bottom: 5px;
        }

    </style>

    <!--MODAL SUCCESS-->
    <div id="modalSuccess" class="modal">
        <div class="modal-content">
            <h3>Sucesso!</h3>
            <p>Seu formulário foi enviado com sucesso.</p>
        </div>
    </div>

    <!--FOOTER-->
    <footer class="footer" id="servicos">
        <div class="box-container">
            <div class="footer-img">
                <img src="assets/image/logo-footer.png" alt="">
                <div class="social">
                    <a href="https://www.facebook.com/profile.php?id=100091349263030"><i class='bx bxl-facebook'></i></a>
                    <a href=""><i class='bx bxl-youtube'></i></a>
                    <a href=""><i class='bx bxl-linkedin'></i></a>
                    <a href=""><i class='bx bxl-instagram'></i></a>
                </div>
            </div>
            
            <div class="box">
                <h3>Sobre</h3>
                <a href="#home"> <i class="fas fa-angle-ri"></i>Home</a>
                <a href="#"> <i class="fas fa-angle-ri"></i>Parceiros</a>
                <a href="#"> <i class="fas fa-angle-ri"></i>Termos de Uso</a>
                <a href="#"> <i class="fas fa-angle-ri"></i>Política de Privacidade</a>
                <a href="#cookies"> <i class="fas fa-angle-ri"></i>Políticas de Cookies</a>
            </div>

            <div class="box">
                <h3>Links úteis</h3>
                <a href="http://www.planalto.gov.br/ccivil_03/_ato2019-2022/2022/lei/L14510.htm#:~:text=LEI%20Nº%2014.510%2C%20DE%2027,15%20de%20abril%20de%202020"> <i class="fas fa-angle-ri"></i>Lei Telessaúde</a>
                <a href="https://www.in.gov.br/en/web/dou/-/resolucao-n-727-de-30-de-junho-de-2022-416502055"> <i class="fas fa-angle-ri"></i>Resolução de Telefarmácia</a>
                <a href="https://www.in.gov.br/en/web/dou/-/resolucao-cfm-n-2.314-de-20-de-abril-de-2022-397602852"> <i class="fas fa-angle-ri"></i>Resolução de Telemedicina</a>
                <a href="https://site.cfp.org.br/wp-content/uploads/2018/05/RESOLUÇÃO-Nº-11-DE-11-DE-MAIO-DE-2018.pdf"> <i class="fas fa-angle-ri"></i>Resolução de Telepsicologia</a>
                <a href="http://www.cofen.gov.br/resolucao-cofen-no-696-2022_99117.html"> <i class="fas fa-angle-ri"></i>Resolução de Telenfermagem</a>
            </div>

            <div class="pague-img">
                <a href="https://www.iugu.com/"><img src="assets/image/IUGU.png"></a>
                <a href="https://www.iugu.com/"><img src="assets/image/pague_seguro.png"></a>
            </div>

            <div class="box">
                <h3>Trabalhe Conosco</h3>
                <a href="#"><i class="fab fa-facebook-f"></i>Cadastro médico</a>
                <a href="#"><i class="fab fa-twitter"></i>Quero ser parceiro</a>
                <h3>Precisa de Ajuda?</h3>
                <h2 type="email">contato@clicadoc.com.br</h2>
            </div>

        </div>
    </footer>

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

<!--CADASTRO VIA AJAX-->
<script>
//HABILITA O BUTTON ENVIAR
function checkTermos() {
    var radio = document.getElementById("endereco");
    var botaoEnviar = document.getElementById("botaoEnviar");

    if (radio.checked) {
        botaoEnviar.disabled = false; // Habilita o botão
    } else {
        botaoEnviar.disabled = true; // Desabilita o botão
    }
    }

//MASCARA CPF
$(document).ready(function(){
    Inputmask().mask(document.getElementById("cpf-input"));
});

//MASCARA TELEFONE
var telefoneInput = document.getElementById('anmpac_numcel');
Inputmask({ mask: '(99) 9999-9999', clearMaskOnLostFocus: false }).mask(telefoneInput);


//FUNÇÃO VALIDA CPF
function validarCPF(cpf){
    cpf = cpf.replace(/[^\d]+/g, ''); // Remove caracteres não numéricos

    if (cpf.length !== 11 || /^(.)\1+$/.test(cpf)) {
        return false; // CPF com tamanho inválido ou todos os dígitos iguais
    }
    
        var soma = 0;
        var resto;
    
    for (var i = 1; i <= 9; i++) {
        soma += parseInt(cpf.substring(i-1, i)) * (11 - i);
    }
    
        resto = (soma * 10) % 11;
    
    if (resto === 10 || resto === 11) {
        resto = 0;
    }
    
    if (resto !== parseInt(cpf.substring(9, 10))) {
        return false; // Primeiro dígito verificador inválido
    }
    
        soma = 0;
    
    for (var j = 1; j <= 10; j++) {
        soma += parseInt(cpf.substring(j-1, j)) * (12 - j);
    }
    
        resto = (soma * 10) % 11;
    
    if (resto === 10 || resto === 11) {
        resto = 0;
    }
    
    if (resto !== parseInt(cpf.substring(10, 11))) {
        return false; // Segundo dígito verificador inválido
    }
    
    return true; // CPF válido
}

function verificarCPF() {
    var inputCPF = document.getElementById('cpf-input');
    var cpf = inputCPF.value;
    
    var valido = validarCPF(cpf);
    
    if (valido) {
        inputCPF.classList.remove('invalido');
        inputCPF.classList.add('valido');
        document.getElementById('mensagem').textContent = 'CPF válido.';

        return true;
    } else {
        inputCPF.classList.remove('valido');
        inputCPF.classList.add('invalido');
        document.getElementById('mensagem').textContent = 'CPF inválido.';

        return false;
    }
}

$("#formulario_atendimento").submit(function(e){
    e.preventDefault();

    if(!verificarCPF()){
        
        document.getElementById('cpf-input').focus()
        return
    }
    

    $("#acao").val('cadastrar'); 

    $.ajax({
        type: "POST",
        url: "assets/ajax/atualiza_formulario.php",
        data: $(this).serialize(),
        success: function(response){
            var success = true; 
            if (success) {
                $("#modalSuccess").css("display", "block");
            }
            $("#formulario_atendimento")[0].reset();





            setTimeout(function() {
                $("#modalSuccess").hide();
            }, 3000);
        }
    });
});


</script>