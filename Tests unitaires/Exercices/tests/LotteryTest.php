<?php

use App\Lottery;
use PHPMailer\PHPMailer\PHPMailer;
use PHPUnit\Framework\TestCase;

class LotteryTest extends TestCase {
    public function testTireLesNumeros() {
        /**
         * Tirer les numéros
         * ça veut dire :
         * 1/ On a un tableau 
         * 2/ Dans ce tableau : 5 numéros entre 1 et 50
         */

        $lottery = new Lottery;

        $this->assertIsArray($lottery->getWinningNumbers());
        $this->assertCount(5, $lottery->getWinningNumbers());

        foreach ($lottery->getWinningNumbers() as $number) {
            $this->assertIsInt($number);
            $this->assertGreaterThanOrEqual(1, $number);
            $this->assertLessThanOrEqual(50, $number);
        }
    }

    public function testAnnonceSiOnAGagne() {
        /** 
         * L'annonce si on a gagné
         * fonctionne si :
         * 1/ Quand on lui passe les bons numéros, un email est envoyé
         * 2/ Quand on lui passe les mauvais numéros, ça renvoie false
         */

        $lottery = new Lottery;
        $nombres = [0, 0, 0, 0, 0];

        $this->assertFalse($lottery->isWinningTicket($nombres));

        // On fait un mock
        $mock = $this->createMock(PHPMailer::class);

        $mock->method('setFrom')->willReturn(true);
        $mock->method('addAddress')->willReturn(true);
        $mock->method('isHTML')->willReturn(true);
        $mock->method('send')->willReturn(true);

        $lottery->setPhpMailer($mock);

        // On vérifie que "send" est appelée
        // = On vérifie que notre classe cherche bien à envoyer l'email
        $mock
            ->expects($this->once())
            ->method('send');

        $this->assertTrue(
            $lottery->isWinningTicket($lottery->getWinningNumbers())
        );
    }
}
