<?php

namespace Solvre\Http\Controllers\Crud;

use Auth;
use Collective\Annotations\Routing\Annotations\Annotations\Middleware;
use Collective\Annotations\Routing\Annotations\Annotations\Post;
use EntityManager;
use Error;
use Exception;
use Hash;
use Illuminate\Support\Facades\Input;
use Solvre\Http\Controllers\Auth\AuthController;
use Solvre\Http\Controllers\Base\Controller;
use Solvre\Http\Requests;
use Solvre\Model\Entities\User;
use Solvre\Model\Repositories\UserRepository;
use Solvre\Views\Crud\LoginView;
use Collective\Annotations\Routing\Annotations\Annotations\Get;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class LoginController
    extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @Get("/")
     * @Middleware("guest")
     * @Middleware("web")
     *
     * @param \Illuminate\Http\Request $request
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
     * @Middleware("web")
     */
    public function login() {
        return redirect('/');
    }


    /**
     * @Post("/auth/login")
     * @Middleware("web")
     *
     * @param Request $request
     * @return string
     */
    public function authenticate(Request $request) {

        $email = Input::get('email');
        $password = Input::get('password');
//        $remember = Input::get('_token');

        $repository = EntityManager::getRepository(User::class);

        /** @var User $user */
        $user = $repository->findOneBy(['email' => $email]);

        if ( Hash::check($password, $user->getAuthPassword()) )
        {
            try{
                Auth::login($user);
            } catch (Exception $e) {
                return $e->getMessage();
            }
            return "logged";
//            return redirect('/dashboard');
        } else {
            return "bad credentials";
        }

//        return redirect('/')->with('email', $email )->with('pwd', $password);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
        echo $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        //
        echo $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        echo $id . $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
        echo $id;
    }
}
