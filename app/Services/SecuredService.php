<?php


namespace App\Services;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SecuredService
{
    public function catchSecured($secured, SessionInterface $session)
    {
        if ($secured && $session->get('admin') === null) {
            $session->getFlashBag()->add('warning', 'Merci de vous inscrire !');
            $response = new RedirectResponse('/connecting');
            return $response->send();
        }
    }
}
