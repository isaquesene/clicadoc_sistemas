<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['email']) && $_POST['acao'] == 'recuperar_senha'){  
    
    include "../include/mysqlconecta.php";
    
    $email = $_POST['email']; 

    $SQL = "select * from tanam_usuarios where user_email = '$email'";    
    $result = @mysqli_query($conexao,$SQL) or die("Erro, código:001");                                            
    $rows = mysqli_fetch_array($result);

    $user_id = $rows['user_id'];
    $nome = $rows['user_nom'];
    $situacao = $rows['user_situacao'];
    
    if(isset($nome) && $nome != '' && $situacao == 'ativo'){

        $token = bin2hex(random_bytes(32));  
        
        $SQL = "update tanam_usuarios set user_data_recuperar_senha=now(), user_token_recuperar_senha='$token' where user_id = $user_id";    
        @mysqli_query($conexao,$SQL) or die("Erro, código:002");  
        
        if(isset($token)){
    
            //ENVIO DE EMAIL
            $html ="<html>
            <head>
            <meta charset='utf-8'>
            <title>Contato - Clicadoc.com.br</title>
            </head>
            <body>
            <style>
            
            table { page-break-inside:auto; }
            tr    { page-break-inside:avoid; page-break-after:auto }
            thead { display:table-header-group }
            tfoot { display:table-footer-group }
            
            </style>
            
            <table width='100%' align='center'>
            
            <tr align='left'>
            <td><p>
            Prezado(a) $nome,
            <br>
            Espero que este email o encontre bem. Recebemos uma solicitação de recuperação de senha para a sua conta em nosso sistema. Ficamos felizes em informar que sua solicitação foi processada com sucesso.
            </p></td>
            </tr>
            
            <tr align='left'>
            <td><p>Clique no link abaixo para criar uma nova senha de acesso ao Clicadoc.</p></td>
            </tr>
            
            <tr align='left'>
            <td><a href='http://cesar.epizy.com/clicadoc/recuperar_senha.php?token=$token'>Criar uma nova senha.</a></td>    
            </tr>
            
            <tr align='left'>
            <td>
            <br>
            <p>
            Agradecemos por utilizar nossos serviços e estamos à disposição para ajudá-lo(a) com qualquer dúvida ou problema.
            <br>
            Atenciosamente,
            <br>
            Clicadoc.com.br
            </p>
        
            </td>
            </tr>
            
            </table>
            </body>
            </html>
            ";
        
            $mailer = new PHPMailer();
            $mailer->IsSMTP();
            //$mailer->SMTPDebug = 1;
            $mailer->Port = 2525; //Indica a porta de conexão 
            $mailer->Host = 'smtp.elasticemail.com';//Endereço do Host do SMTP 
            $mailer->SMTPAuth = true; //define se haverá ou não autenticação     
            $mailer->Username = 'isaquesene26@gmail.com'; //Login de autenticação do SMTP
            $mailer->Password = '798834714CC9B664FEEB49C008008C3F5114'; //Senha de autenticação do SMTP
            $mailer->FromName = 'Recuperação de senha - Clicadoc'; //Nome que será exibido
            $mailer->From = 'isaquesene26@gmail.com'; //Obrigatório ser a mesma caixa postal configurada no remetente do SMTP
            $mailer->AddAddress($email,'Recuperação de senha - Clicadoc');
            $mailer->AddReplyTo($email,$name);
            $mailer->IsHTML(true);
            $mailer->CharSet = 'utf-8'; // Charset da mensagem (opcional)
            //Destinatários
            $mailer->Subject = 'Recuperar Senha - clicadoc.com.br';
            $mailer->Body = $html;    
            
            if(!$mailer->Send()){

                $linhas_json = array(
                    'success'=>true,
                    'msg'=>'Email enviado com sucesso.'                    
                );  
              
            } else {

                $linhas_json = array(
                    'success'=>false,
                    'msg'=>'Ocorreu um erro.'                    
                ); 

            }
            
        } 
        
            
    }

    $linhas_json = array(
        'success'=>true,
        'msg'=>'Email enviado com sucesso.'        
    );  
    
    echo json_encode($linhas_json);
    
} 
?>