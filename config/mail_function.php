<?php
/**
 * Fonction pour envoyer un email
 *
 * @param string $to L'adresse email du destinataire
 * @param string $subject Le sujet de l'email
 * @param string $message Le contenu de l'email
 * @return bool Retourne true si l'email a été envoyé avec succès, sinon false
 */
function sendNotificationEmail($to, $subject, $message,) {
    // Envoyer l'email
    return mail($to, $subject, $message, $headers);
}
