<?php

namespace App\Services;

use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;

class EventService
{
  public static function checkEventDuplication($eventDate, $startTime, $endTime)
{
    return DB::table('events')
        ->whereDate('start_date', $eventDate)
        ->whereTime('end_date', '>', $startTime)
        ->whereTime('start_date', '<', $endTime)
        ->whereNull('deleted_at') // deleted_at が null の場合に限定
        ->exists();
}

public static function countEventDuplication($eventDate, $startTime, $endTime)
{
    return DB::table('events')
        ->whereDate('start_date', $eventDate)
        ->whereTime('end_date', '>', $startTime)
        ->whereTime('start_date', '<', $endTime)
        ->whereNull('deleted_at') // deleted_at が null の場合に限定
        ->count();
}

public static function joinDateAndTime($date, $time)
{
    $join = $date. " " .  $time; 
    return Carbon::createFromFormat('Y-m-d H:i', $join);
}

public static function getWeekEvents($startDate, $endDate)
{
    $reservedPeople = DB::table('reservations')
        ->select('event_id', DB::raw('sum(number_of_people) as number_of_people'))
        ->whereNotNull('canceled_date')
        ->groupBy('event_id');

    return DB::table('events')
        ->leftJoinSub($reservedPeople, 'reservedPeople', function($join){
            $join->on('events.id', '=', 'reservedPeople.event_id');
        })
        ->whereBetween('start_date', [$startDate, $endDate])
        ->whereNull('deleted_at') // deleted_at が null の場合に限定
        ->orderBy('start_date', 'asc')
        ->get();
}


}