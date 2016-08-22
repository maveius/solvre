<?php

namespace Solvre\Utils;


use Solvre\Model\Doctrine\Entity\Activity;


class ActivityType
{
    const COMMENT = "COMMENT";
    const CHANGE_STATUS = "CHANGE_STATUS";
    const LOG_TIME = "LOG_TIME";
    const CHANGE_ASSIGNMENT = "CHANGE_ASSIGNMENT";
    const UPLOAD_FILE = "UPLOAD_FILE";
    const UPDATE_CUSTOM_FIELDS = "UPDATE_CUSTOM_FIELDS";
    const ISSUE_CREATED = "ISSUE_CREATED";
    const UPDATE_DESCRIPTION = "UPDATE_DESCRIPTION";
    const EDITED_CONTENT = "EDITED_CONTENT";
    const STARTED_PROGRESS = "STARTED_PROGRESS";

    /**
     * @param Activity $a
     * @param Activity $b
     * @return int
     */
    public static function compare($a, $b)
    {
        if (strtotime($a->getCreated()->format("Y-m-d H:i:s")) === strtotime($b->getCreated()->format("Y-m-d H:i:s"))) {
            return 0;
        }
        return (
            strtotime($a->getCreated()->format("Y-m-d H:i:s")) <
            strtotime($b->getCreated()->format("Y-m-d H:i:s"))) ?
            1 :
            -1;
    }
}