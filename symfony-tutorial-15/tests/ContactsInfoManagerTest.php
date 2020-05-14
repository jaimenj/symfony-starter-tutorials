<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\ContactsInfoManager;

class ContactsInfoManagerTest extends TestCase
{
    public function testSave()
    {
        if (\file_exists(__DIR__.'/../ficheroDeContactos.txt')) {
            unlink(__DIR__.'/../ficheroDeContactos.txt');
        }

        $contactsInfoManager = new ContactsInfoManager();
        $contactsInfoManager->saveContactForm(
            'Nombre de pruebas',
            'Mensaje de pruebas'
        );

        $this->assertEquals(\file_exists(__DIR__.'/../ficheroDeContactos.txt'), true);
    }
}
