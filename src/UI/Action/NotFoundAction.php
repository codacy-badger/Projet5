<?php


namespace Src\UI\Action;

use App\Services\TwigService;
use Symfony\Component\HttpFoundation\Response;

class NotFoundAction
{
    /**
     * @return $this response
     */
    public function __invoke()
    {
        $response = new Response(
            TwigService::getTwig()->render('404.html.twig')
        );
        return $response->send();
    }
}
