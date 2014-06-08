<?php

namespace Usuarios\Mailer;

use Usuarios\Entity\Usuario;
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp;
use Zend\Mail\Transport\SmtpOptions;

class UsuariosMailer
{

    /**
     * Envia um e-mail para o usuário comunicando sobre seu cadastro ou alteração de senha.
     * @param Usuario $usuario
     */
    public function comunicaCadastro(Usuario $usuario)
    {
        $mail = new Message();
        $mail->setFrom('sistema@noloop.com.br', 'No Loop - Sistema para gerenciamento de imobiliarias');
        if (APP_ENV == ENV_PRO) {
            $mail->addTo($usuario->getEmail(), $usuario->getNome());
        } else {
            $to = $usuario->getEmail();
            if (strpos($to, '@noloop.com.br') !== false || strpos($to, 'noloop.com.br') !== false) {
                $mail->addTo($to, $usuario->getNome());
            } else {
                $mail->addTo('sistemas@noloop.com.br', $usuario->getNome());
            }
        }
        $mail->setSubject('Dados de acesso');
        $body = "Olá,<br><br>";
        $body .= "Seus dados de acesso ao sistema foram criados ou modificados:<br><br>";
        $body .= "Login: <b>{$usuario->getLogin()}</b><br>";
        $body .= "Senha: <b>{$usuario->getSenhaCrua()}</b><br><br>";
        $body .= "Você pode acessar o sistema através do link abaixo:<br><br>";
        $body .= '<a href="https://noloop.com.br">https://noloop.com.br</a>';
        $mail->setBody($body);
        $mail->setEncoding('UTF-8');
        $headers = $mail->getHeaders();
        $headers->removeHeader('Content-Type');
        $headers->addHeaderLine('Content-Type', 'text/html; charset=UTF-8');
        $transport = new Smtp();
        $options = new SmtpOptions(array(
            'name' => 'secure.emailsrvr.com',
            'host' => 'secure.emailsrvr.com',
            'port' => 465,
            'connection_class' => 'plain',
            'connection_config' => array(
                'username' => 'sistema@noloop.com.br',
                'password' => 'S1st#m*953',
                'ssl' => 'ssl',
            ),
        ));
        $transport->setOptions($options);
        $transport->send($mail);
    }

}
