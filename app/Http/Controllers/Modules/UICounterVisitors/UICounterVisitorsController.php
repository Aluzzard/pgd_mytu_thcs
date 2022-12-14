<?php

namespace App\Http\Controllers\Modules\UICounterVisitors;

use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Session;
use DateTime;
//Models
use App\Models\Modules\ModuleVisitor;

class UICounterVisitorsController {

    public function index() {
    	// Session::put('visited', false);
    	$check_visited = Session::get('visited');
        $counter_day = ModuleVisitor::where('name','today')->first();
        $date_day = new DateTime($counter_day->updated_at);
        $counter_week = ModuleVisitor::where('name','week')->first();
        $date_week = new DateTime($counter_week->updated_at);
        $counter_month = ModuleVisitor::where('name','month')->first();
        $date_month = new DateTime($counter_month->updated_at);
        $counter_year = ModuleVisitor::where('name','year')->first();
        $date_year = new DateTime($counter_year->updated_at);
        $counter_total = ModuleVisitor::where('name','total')->first();

        if( !$check_visited ) {
            Session::put('visited', true);
            // Counter ToDay
            if( date("d") == $date_day->format('d')){
                $counter_day->increment('counter');
            } else {
                $counter_day->counter = 1;
                $counter_day->update();
            }
            // Counter ByWeek
            if( date("W") == $date_week->format('W')){
                $counter_week->increment('counter');
            } else {
                $counter_week->counter = 1;
                $counter_week->update();
            }
            //Counter ByMonth
            if( date("m") == $date_month->format('m')){
                $counter_month->increment('counter');
                $counter_month->update();
            } else {
                $counter_month->counter = 1;
                $counter_month->update();
            }
            //Counter ByYear
            if( date("Y") == $date_year->format('Y')){
                $counter_year->increment('counter');
            } else {
                $counter_year->counter = 1;
                $counter_year->update();
            }
            //Counter Total
            $counter_total->increment('counter');
        }   
    }

}
