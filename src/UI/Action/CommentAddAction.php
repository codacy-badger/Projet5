<?php

namespace Src\UI\Action;

use Src\Domain\Managers\CommentManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Services\CommentBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Services\ValidatorService;

class CommentAddAction
{
    /**
     * @var CommentManager
     */
    private $commentManager;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var CommentBuilder
     */
    private $commentBuilder;
    /**
     * @var Session
     */
    private $session;
    /**
     * @var ValidatorService
     */
    private $validator;

    /**
     * CommentAddAction constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        $this->request = $request;
        $this->commentManager = new CommentManager();
        $this->commentBuilder = new CommentBuilder();
        $this->session = new Session();
        $this->validator = new ValidatorService();
    }

    /**
     * Add a comment or redirect to the item detail
     *
     * @return Response
     *
     */
    public function __invoke()
    {

        $this->commentBuilder->build(
                $this->request->get('nom'),
                $this->request->get('email'),
                $this->request->get('content'),
                $this->request->attributes->get(0)
            );

            $this->commentManager->addComment($this->commentBuilder->getComment());
            $response = new RedirectResponse('/post/detail/'.$this->request->attributes->get(0));
            return $response->send();
    }
}

