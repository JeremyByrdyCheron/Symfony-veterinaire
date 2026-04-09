<?php

namespace App\Service;

use App\Entity\Appointment;
use App\Entity\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class MailService
{
    public function __construct(
        private MailerInterface $mailer,
        private Environment $twig,
    ) {
    }

    public function sendRequestStatusMail(Appointment $appointment, ?\DateTime $newDate = null): void
    {
        $status = $appointment->getStatus();

        $subject = match ($status->value) {
            'accepted' => '✅ Votre rendez-vous a été accepté',
            'rescheduled' => '📅 Votre rendez-vous a été décalé',
            'refused' => '❌ Votre rendez-vous a été refusé',
            default => 'Mise à jour de votre rendez-vous',
        };

        $html = $this->twig->render("emails/request_{$status->value}.html.twig", [
            'request' => $appointment,
            'newDate' => $newDate,
        ]);

        $email = (new Email())
            ->from('veterinaire@cabinet.fr')
            ->to($appointment->getEmail())
            ->subject($subject)
            ->html($html);

        $this->mailer->send($email);
    }
}
