<?php

namespace Solvre\Views\Components;


use liphte\tags\components\Renderable;
use liphte\tags\html\Attribute as a;
use liphte\tags\html\Tag;
use Solvre\Model\Doctrine\Entity\Activity;
use Solvre\Utils\ActivityType;

class ActivitiesList implements Renderable
{

    private $activities;

    public function __construct( $activities )
    {
        $this->activities = $activities;
    }

    public function render()
    {
        $t = new Tag();

        /** @noinspection PhpMethodParametersCountMismatchInspection */
        return $this->renderActivities($t, $this->activities);
    }

    /**
     * @param Tag $t
     * @param array $activities
     * @return mixed
     */
    public function renderActivities($t, $activities)
    {
        $activitiesHTML = array();

        $sortedActivities = array();
        /** @var Activity $activity */
        foreach ($activities as $activity ) {
            array_push($sortedActivities, $activity);
        }

        usort($sortedActivities, array("Solvre\\Utils\\ActivityType", "compare"));

        /** @var Activity $activity */
        foreach ($sortedActivities as $activity ) {
            $login = $activity->getUser()->getLogin();
            /** @noinspection PhpMethodParametersCountMismatchInspection */
            array_push(
                $activitiesHTML,
                $t->li(
                    $t->div(a::c1ass('menu-icon'),
                        $t->a(a::href('/user/' . $login),
                            $t->img(a::alt(strtolower($login)),
                                $this->renderImage($activity)
                            )
                        )
                    ),
                    $t->div( a::c1ass('menu-info no-transform'),
                        $t->a( a::href('/user/' . strtolower($login)),
                            $activity->getUser()->getFullName()
                        ),
                        ' ',
                        $this->renderMessage($activity),
                        $this->renderObjectName($t, $activity)
                    ),
                    $t->div( a::c1ass('menu-text'),
                        $this->renderContent($t, $activity)
                    ),
                    $t->div( a::c1ass('menu-text'),
                        $t->div( a::c1ass('menu-info no-transform'),
                            $t->span( a::c1ass('menu-date'),
                                a::title( $activity->getCreated()->format("Y-m-d H:i") ),
                                $this->renderActivityTime( $activity )
                            )
                        )
                    )
                )
            );

        }

        return $t->ul(a::c1ass('list-wrapper'),
            $activitiesHTML
        );

    }

    /**
     * @param Activity $activity
     * @return string
     */
    private function renderMessage($activity)
    {
        switch ($activity->getActivityType())
        {
            case ActivityType::COMMENT:
                return trans('activities.commented');
            case ActivityType::CHANGE_STATUS:
                return trans('activities.change.status') . ' '. trans('activities.of.task');
            case ActivityType::LOG_TIME:
                return trans('activities.log');
            case ActivityType::CHANGE_ASSIGNMENT:
                return trans('activities.changed.assignment');
            case ActivityType::UPLOAD_FILE:
                return trans('activities.upload.file');
            case ActivityType::UPDATE_CUSTOM_FIELDS:
                return trans('activities.update.custom.field');
            case ActivityType::ISSUE_CREATED:
                return trans('activities.created');
            case ActivityType::UPDATE_DESCRIPTION:
                return trans('activities.update.description');
            case ActivityType::EDITED_CONTENT:
                return trans('activities.edited.content');
            case ActivityType::STARTED_PROGRESS:
                return trans('activities.started.progress');
            default:
                return "";
        }
    }

    /**
     * @param Tag $t
     * @param Activity $activity
     * @return string
     */
    private function renderObjectName($t, $activity)
    {
        if($activity->getIssue() !== null) {

            /** @noinspection PhpMethodParametersCountMismatchInspection */
            return $t->a( a::style('font-weight: bold;'), a::href('/issue/'. $activity->getIssue()->getNumber()),
                $activity->getIssue()->getNumber()
            );
        } else if($activity->getWikiPage() !== null) {
            /** @noinspection PhpMethodParametersCountMismatchInspection */
            return $t->a( a::style('font-weight: bold;'), a::href('/wiki/'. $activity->getWikiPage()->getId()),
                $activity->getWikiPage()->getName()
            );
        }
    }

    /**
     * @param Tag $t
     * @param Activity $activity
     * @return string
     */
    private function renderContent($t, $activity)
    {
        switch ($activity->getActivityType()) {
            case ActivityType::COMMENT:
                return $t->div( a::c1ass('panel panel-primary alert-primary no-transform space-reduce'),
                    $activity->getNewValue()
                );
            case ActivityType::EDITED_CONTENT:
            case ActivityType::UPDATE_DESCRIPTION:
                return $t->div(
                    a::c1ass('panel panel-primary alert-primary no-transform space-reduce col-sm-12 col-xs-12'),
                    $t->i(
                        $t->mark(
                            a::c1ass('mark-color-red col-sm-12 col-xs-12'),
                            $t->del( $activity->getOldValue() )
                        )
                    ),
                    $t->i(
                        $t->mark(
                            a::c1ass('mark-color-green col-sm-12 col-xs-12'),
                            $activity->getNewValue()
                        )
                    )
                );
            case ActivityType::CHANGE_ASSIGNMENT:
            case ActivityType::CHANGE_STATUS:
            case ActivityType::ISSUE_CREATED:
            case ActivityType::LOG_TIME:
            case ActivityType::STARTED_PROGRESS:
            case ActivityType::UPLOAD_FILE:
            case ActivityType::UPDATE_CUSTOM_FIELDS:
            default :
                return "";
        }
    }

    /**
     * @param Activity $activity
     * @return string
     */
    private function renderActivityTime($activity)
    {
        $seconds  = strtotime(date('Y-m-d H:i:s')) - strtotime($activity->getCreated()->format('Y-m-d H:i:s'));

        $months = floor($seconds / (3600*24*30));
        $day = floor($seconds / (3600*24));
        $hours = floor($seconds / 3600);
        $mins = floor(($seconds - ($hours*3600)) / 60);
        $secs = floor($seconds % 60);

        $time = trans('activities.like') . ' ';
        if($seconds < 60)
            $time .= $secs . " " . $this->renderPostfixAgo( $secs, 'second' );
        else if($seconds < 60*60 )
            $time .= $mins . " " . $this->renderPostfixAgo( $mins, 'minute' );
        else if($seconds < 60*60*60)
            $time .= $hours . " " . $this->renderPostfixAgo( $hours, 'hour' );
        else if($seconds < 24*60*60*60)
            $time .= $day . " " . $this->renderPostfixAgo( $day, 'day' );
        else if($seconds < 24*60*60*60*30)
            $time .= $months . " " . $this->renderPostfixAgo( $months, 'month' );
        else
            $time .= $months . " " . $this->renderPostfixAgo( $secs, 'year' );

        return $time;
    }

    private function renderPostfixAgo($val, $timeType)
    {
        if( $val == 1 ) {
            return trans("activities.$timeType.ago");
        } else {
            return trans("activities.$timeType"."s.ago");
        }
    }

    /**
     * @param Activity $activity
     * @return a
     */
    private function renderImage($activity)
    {
        if($activity->getUser()->getAvatar() !== null ) {
            return a::src($activity->getUser()->getAvatar());
        } else {
            return a::src(asset('img/profile-icon.png'));
        }
    }
}