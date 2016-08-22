<?php

namespace Solvre\Http\Controllers\Crud;

use Auth;
use Collective\Annotations\Routing\Annotations\Annotations\Get;
use Collective\Annotations\Routing\Annotations\Annotations\Middleware;
use Collective\Annotations\Routing\Annotations\Annotations\Post;
use Crypt;
use Error;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Response;
use Solvre\Http\Controllers\Base\Controller;
use Solvre\Http\Requests;
use Solvre\Model\Doctrine\Entity\Message;
use Solvre\Model\Doctrine\Repository\MessageRepository;
use Solvre\Model\Doctrine\Repository\UserRepository;
use Solvre\Services\MessageService;
use Solvre\Utils\UserUtils;
use Solvre\Views\Crud\LoginView;
use Throwable;


/**
 * @property UserRepository userRepository
 * @property MessageRepository messageRepository
 * @property MessageService messageService
 */
class LoginController
    extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @Get("/")
     * @Middleware("guest")
     *
     * @param Request $request
     * @return \Illuminate\Support\Facades\Response
     */
    public function index(Request $request)
    {

        $loginView = new LoginView();
        return $loginView->render($request);
    }

    /**
     * @Get("/login")
     * @Middleware("guest")
     */
    public function show()
    {
        return redirect('/');
    }

    /**
     * @Post("/register")
     *
     * @param Request $request
     * @return array|JsonResponse
     */
    public function create(Request $request)
    {
        $users = $this->userRepository;
        $messages = $this->messageRepository;
        $messageService = $this->messageService;

        $email = $request->email;
        $password = $request->password;
        $retypedPassword = $request->retypedPassword;

        if ($users->doesNotExistsBy($email) && $users->match($password, $retypedPassword) ) {

            /** @noinspection PhpUndefinedFieldInspection */
            $user = $users->createAccount(
                $request->fullName,
                $email,
                bcrypt($password)
            );

            $messages->registerActivationMail(
                $messageService->getMailContent(),
                $user,
                $messageService->getToken($email)
            );

            return response()->json([
                'classes' => 'alert alert-success',
                'infoMsg' => trans('auth.registered.success'),
                'success' => true
            ]);

        } elseif ( $users->existsBy($email) ) {

            return response()->json([
                'classes' => 'alert alert-danger',
                'infoMsg' => trans('auth.user.exists'),
                'success' => false
            ]);

        } else {

            return response()->json([
                'classes' => 'alert alert-danger',
                'infoMsg' => trans('auth.password.doesnt.match'),
                'success' => false
            ]);

        }
    }

    /**
     * @Get("/activate/{code}")
     * @Middleware("guest")
     *
     * @param $code
     * @return array|JsonResponse
     */
    public function activate($code)
    {
        /** @var Message $message */
        $message = $this->messageRepository->getNotActiveByCode($code);
        $message->setActive(true);
        $message->getUser()->setStatus('ACTIVE');
        $this->saveOrUpdate($message);

        return redirect('/')->with('info', trans('auth.account.activated'));
    }
}
