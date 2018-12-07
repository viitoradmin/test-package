<?php

namespace Viitor\TimeDiff;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;

/**
 * Class TimeDiffController
 * @package Viitor\TimeDiff
 */
class TimeDiffController extends Controller
{
    /**
     * @param $startTime
     * @param $finishTime
     * @return string
     */
    public function getTimeDifference($startTime = null, $finishTime = null)
    {
        try {
            if (isset($startTime) && isset($finishTime)) {
//                dd($startTime,$finishTime);
                $startTime = Carbon::parse($startTime);
                $finishTime = Carbon::parse($finishTime);
                $monthCount = $finishTime->diffInMonths($startTime);
                if ($monthCount == 0) {
                    $weekCount = $finishTime->diffInWeeks($startTime);

                    if ($weekCount == 0) {
                        $dayCount = $finishTime->diffInDays($startTime);
                        if ($dayCount == 0) {
                            $hoursCount = $finishTime->diffInHours($startTime);

                            if ($hoursCount == 0) {
                                $minuteCount = $finishTime->diffInMinutes($startTime);
                                if ($minuteCount == 0) {
                                    $secondCount = $finishTime->diffInSeconds($startTime);
                                    $string = $secondCount . ' second(s) ago';
                                } else {
                                    $string = $minuteCount . ' minute(s) ago';
                                }
                            } else {
                                $string = $hoursCount . ' hour(s) ago';
                            }
                        } else {
                            $string = $dayCount . ' day(s) ago';
                        }
                    } else {
                        $string = $weekCount . ' week(s) ago';
                    }
                } else {
                    $string = $monthCount . ' month(s) ago';
                }
            } else {
                $string = '';
            }
            return $string;
//            //dd($string);
//            $result = $string;
            return view('timeDiff::welcome', compact('result'));
        } catch (\Exception $ex) {
            dd($ex);
            return '';
        }
    }
}
