<?php

namespace Solvre\Http\Controllers\Crud;


use Collective\Annotations\Routing\Annotations\Annotations\Get;
use Collective\Annotations\Routing\Annotations\Annotations\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Solvre\Http\Controllers\Auth\AuthController;
use Solvre\Http\Requests;
use Solvre\Model\Doctrine\Repository\NotificationRepository;
use Solvre\Views\Crud\DashboardView;

/**
 * @property NotificationRepository notificationRepository
 * @property DashboardView dashboardView
 */
class DashboardController
    extends AuthController
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
        $dashboard = $this->dashboardView;

        return $dashboard->render($request);
    }
}
