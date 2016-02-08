<?php

namespace Solvre\Http\Controllers\Crud;


use Auth;
use Collective\Annotations\Routing\Annotations\Annotations\Middleware;
use Solvre\Http\Controllers\Base\Controller;
use Solvre\Http\Requests;
use Solvre\Model\Doctrine\Repository\NotificationRepository;
use Solvre\Views\Components\Counter;
use Solvre\Views\Components\MenuElement;
use Collective\Annotations\Routing\Annotations\Annotations\Get;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Solvre\Views\Crud\DashboardView;

/**
 * @property NotificationRepository notificationRepository
 */
class DashboardController
    extends Controller
{

    /**
     * @Get("/dashboard")
     * @Middleware("auth")
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
//        $user = Auth::user();
        $notifications = $this->notificationRepository->findFor(0);

        $data = array(
            new MenuElement(
                'notifications',
                'fa-bell',
                new Counter('danger', sizeof($notifications)),
                $notifications
            ),
            new MenuElement(
                'user user',
                'img/favicon.png',
                null,
                Auth::user()
            )
        );
//
        $dashboard = new DashboardView($data);

        return $dashboard->render($request);
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
        echo $request . $id;
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
