<?php
namespace  App\Traits;

use Jenssegers\Date\Date;

trait DatesTranslator
{
    public function getCreatedAtAtribute($date)
    {

        return new Date($date);
    }

    public function getUpdatedAtAtribute($date)
    {
        return new Date($date);
    }

    public function getDeletedAtAtribute($date)
    {
        return new Date($date);
    }
}