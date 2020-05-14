<?php

namespace App\Service;

class ContactsInfoManager
{
    public function saveContactForm($name, $message)
    {
        file_put_contents(__DIR__.'/../../ficheroDeContactos.txt',
            '======================================='.PHP_EOL
            .'NOMBRE: '.$name.PHP_EOL
            .'MENSAJE: '.$message.PHP_EOL,
            FILE_APPEND
        );
    }
}
