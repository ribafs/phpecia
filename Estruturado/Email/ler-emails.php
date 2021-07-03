<?php
// composer require php-imap/php-imap
use PhpImap\Mailbox;

require_once 'vendor/autoload.php';

$mailbox = new Mailbox(
    '{imap.gmail.com:993/imap/ssl}INBOX',
    'seu-login@gmail.com',
    'sua-senha',
);

// Ler todos e-mails não lidos do remetente abaixo
$mailIds = $mailbox->searchMailbox('UNSEEN FROM "support@statuscake.com"');

foreach ($mailIds as $mailId) {
    $mail = $mailbox->getMail($mailId);

    createSpeaker()->speak($mail->textPlain);
}

// https://www.youtube.com/watch?v=cBtccqplPmo
