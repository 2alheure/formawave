<?php
namespace App;

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Ecrivez les tests unitaires 
 * et d'intégration
 * pour TOUS les comportements de cette classe
 * 
 * (P.S. : En théorie, une erreur se cache dans cette classe.
 * Vos tests devraient la mettre en exergue ;-))
 */
class Lottery {
    private array $winningNumbers = [];
    private string $notificationEmail = 'toto_lottery@yopmail.fr';

    private $phpMailer;

    /**
     * On tire 5 numéros au hasard
     */
    public function __construct() {
        $this->winningNumbers = [
            rand(1, 50),
            rand(1, 50),
            rand(1, 50),
            rand(1, 50),
            rand(1, 50)
        ];
    }

    /**
     * Renvoie les numéros gagnants
     */
    public function getWinningNumbers() {
        return $this->winningNumbers;
    }

    /**
     * On met notre instance de PHPMailer
     */
    public function setPhpMailer(PHPMailer $phpMailer) {
        $this->phpMailer = $phpMailer;

        return $this;
    }

    /**
     * On check un ticket
     * pour savoir s'il a gagné
     * 
     * Doit renvoyer un booléen
     */
    public function isWinningTicket(array $numbers) {
        $goodNumbers = 0;

        foreach ($this->winningNumbers as $clef => $wn) {
            if ($wn === $numbers[$clef]) {
                $goodNumbers++;
            }
        }

        if ($goodNumbers < 5) {
            return false;
        } else {
            $this->sendNotificationEmail();
            return true;
        }
    }

    /**
     * On envoie un email de notification pour
     * dire que quelqu'un a gagné au loto
     */
    public function sendNotificationEmail() {
        $this->phpMailer->setFrom($this->notificationEmail);
        $this->phpMailer->addAddress($this->notificationEmail);

        $this->phpMailer->isHTML(true);                                  //Set phpMailer format to HTML
        $this->phpMailer->Subject = 'Notification de victoire au loto';
        $this->phpMailer->Body    = 'Un gagnant a été découvert ! Sortez le chéquier !';

        $this->phpMailer->send();
    }
}
