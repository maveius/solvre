<?php

namespace Solvre\Http\Controllers\Auth;

use Auth;
use Collective\Annotations\Routing\Annotations\Annotations\Get;
use Collective\Annotations\Routing\Annotations\Annotations\Middleware;
use Collective\Annotations\Routing\Annotations\Annotations\Post;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Input;
use Solvre\Http\Controllers\Base\Controller;
use Solvre\Model\Doctrine\Entity\User;
use Solvre\Model\Doctrine\Repository\NotificationRepository;
use Solvre\Model\Doctrine\Repository\UserRepository;
use Solvre\Utils\AccessHelper as Access;
use Solvre\Utils\StringUtils as Strings;
use Solvre\Utils\UserUtils as Property;
use Solvre\Views\Components\Counter;
use Solvre\Views\Components\MenuElement;
use Validator;

/**
 * @property UserRepository userRepository
 * @property NotificationRepository notificationRepository
 */
class AuthController extends Controller
{
    protected $_views;

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {

    }

    public function __get($name)
    {
        if( Strings::contains($name, "Repository") || Strings::contains($name, "Service") ) {
            return parent::__get($name);
        } elseif ( Strings::contains($name, "View") ) {

            if ( !isset($this->_views[$name]) ) {

                $this->registerView($name);
            }

            return $this->_views[$name];
        }
    }

    /**
     * @Post("/auth/login")
     * @Middleware("guest")
     *
     * @return string
     */
    public function authenticate()
    {
        $email = Input::get(Property::EMAIL);
        $password = Input::get(Property::PASSWORD);
        $active = 'ACTIVE';
        $error = "";

        /** @noinspection PhpUndefinedMethodInspection */

        if (Access::attemptBy($email, $password, $active)) {

            return redirect()->intended('dashboard');

        } else {
            /** @var User $user */
            $user = $this->userRepository->findOneBy([Property::EMAIL => $email]);
            $error = ($user->getStatus() === $active ? trans('auth.failed') : trans('auth.not.active') );
        }


        return redirect('/')->with('error', $error );
    }

    /**
     * @Get("/auth/logout")
     * @Middleware("auth")
     *
     * @param Request $request
     * @return string
     */
    public function logout(Request $request)
    {

        Auth::logout();
        return redirect('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            Property::FULL_NAME => 'required|max:255',
            Property::EMAIL => 'required|email|max:255|unique:users',
            Property::PASSWORD => 'required|confirmed|min:6',
        ]);
    }

    /**
     * @Middleware("auth")
     * @return array
     */
    protected function getData() {

        $user = Auth::user();
        $notifications = $this->notificationRepository->findFor($user->getId());

        return array(
            new MenuElement(
                'notifications',
                'fa-bell',
                new Counter('danger', sizeof($notifications)),
                $notifications
            ),
            new MenuElement(
                'user user',
                $user
            )
        );
    }

    private function registerView($name)
    {
        $viewName = "Solvre\\Views\\Crud\\" . ucfirst($name);
        $this->_views[$name] = new $viewName($this->getData());
    }
}
