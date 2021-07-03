<?php

//Funcao para enviar Email em formato HTML
function mail_html($destinatario, $origem, $titulo, $menssagem) {  
	$envioEmail = false;
	
	if(SMTP_AUTENTICADO) {
		$mail           = new PHPMailer();
		$mail->IsSMTP();                                 //ENVIAR VIA SMTP
		$mail->Host     = SMTP_HOST;                     //SERVIDOR DE SMTP, USE smtp.SeuDominio.com OU smtp.hostsys.com.br
		$mail->SMTPAuth = SMTP_AUTENTICADO;              //ATIVA O /SMTP AUTENTICADO
		$mail->Username = SMTP_USER;                     //EMAIL PARA SMTP AUTENTICADO (pode ser qualquer conta de email do seu domínio)
		$mail->Password = SMTP_PASS;                     //SENHA DO EMAIL PARA SMTP AUTENTICADO
		$mail->From     = PARAM_SOFT_EMPRESA_MAIL;       //E-MAIL DO REMETENTE
		$mail->FromName = $origem;                       //NOME DO REMETENTE
		$mail->AddAddress($destinatario, $destinatario); //E-MAIL DO DESINATÁRIO, NOME DO DESINATÁRIO
		//$mail->AddReplyTo("email@dominio.com.br", "Nome Pessoal Reply"); //UTILIZE PARA DEFINIR OUTRO EMAIL DE RESPOSTA (opcional)
		$mail->WordWrap = 50;                            // ATIVAR QUEBRA DE LINHA
		$mail->IsHTML(true);                             //ATIVA MENSAGEM NO FORMATO HTML
		$mail->Subject  = $titulo;                       //ASSUNTO DA MENSAGEM
		$mail->Body     = $menssagem;                    //MENSAGEM NO FORMATO HTML
		$mail->AltBody  = $menssagem;                    //MENSAGEM NO FORMATO TXT
		
		$envioEmail = $mail->Send();
		
		if(!$envioEmail){
			echo "A mensagem não pode ser enviada";
			echo "Erro: " . $mail->ErrorInfo;
		}
	}else {
		$headers ="Content-Type: text/html; charset=iso-8859-1\n"; 
		$headers.="From: $origem\n"; 
		$envioEmail = (mail("$destinatario", "$titulo", "$menssagem", "$headers"));  
	}
	
	return $envioEmail;
}  


