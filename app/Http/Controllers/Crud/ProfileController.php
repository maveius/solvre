<?php

namespace Solvre\Http\Controllers\Crud;


use Auth;
use Collective\Annotations\Routing\Annotations\Annotations\Get;
use Collective\Annotations\Routing\Annotations\Annotations\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Solvre\Http\Controllers\Auth\AuthController;
use Solvre\Http\Requests;
use Solvre\Model\Doctrine\Entity\User;
use Solvre\Views\Crud\ProfileView;

/**
 * @property ProfileView profileView
 */
class ProfileController
    extends AuthController
{

    /**
     * @Get("/profile")
     * @Middleware("auth")
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        return $this->show($request, Auth::user()->getLogin());
    }

    /**
     * @Get("/user/{login}")
     * @Middleware("auth")
     *
     * @param Request $request
     * @param string $login
     * @return Response
     */
    public function show(Request $request, $login)
    {
        /** @var User $user */
        $user = $this->userRepository->findOneBy(['login'=> $login]);

        $profile = $this->profileView;
        $profile->setUser($user);

        return $profile->render($request);
    }
}
