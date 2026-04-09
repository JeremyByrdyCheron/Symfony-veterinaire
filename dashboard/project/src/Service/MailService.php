<?php

namespace App\Service;

use App\Entity\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class MailService
{
    public function __construct(
        private MailerInterface $mailer,
        private Environment $twig,
    ) {}

    public function sendRequestStatusMail(Request $request, ?\DateTime $newDate = null): void
    {
        $status = $request->getStatus();

        $subject = match ($status->value) {
            'accepted'    => '✅ Votre rendez-vous a été accepté',
            'rescheduled' => '📅 Votre rendez-vous a été décalé',
            'refused'     => '❌ Votre rendez-vous a été refusé',
            default       => 'Mise à jour de votre rendez-vous',
        };

        $html = $this->twig->render("emails/request_{$status->value}.html.twig", [
            'request' => $request,
            'newDate' => $newDate,
        ]);

        $email = (new Email())
            ->from('veterinaire@cabinet.fr')
            ->to($request->getEmail())
            ->subject($subject)
            ->html($html);

        $this->mailer->send($email);
    }
}
