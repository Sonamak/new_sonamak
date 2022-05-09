<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Chart extends Model
{
    use HasFactory;

    static function getModelReport($model)
    {
        $model = App::make('App\Models\\'.$model);

        if ( $model ) {
            $getPassedMonthes = self::getMonthesPassed();
            $countReport = [];

            for($count = 0;$count <= count($getPassedMonthes) - 1;$count++) {
                $countReport[$getPassedMonthes[$count]] = $model->whereMonth('created_at',$count + 1)->count();
            }

            return $countReport;

        }

    }

    static function getMonthesPassed()
    {
        $year_start = Carbon::createFromFormat('Y-m-d', date('Y-01-01'));
        $year_now = Carbon::createFromFormat('Y-m-d', date('Y-m-01'));
        $number_of_passed_monthes = $year_now->diffInMonths($year_start);
        $monthes = ['January','February','March','April','May','June','July','Auguest','September','October','November','December'];
        $passed_month = [];
        
        for ( $count = 0;  $count < $number_of_passed_monthes + 1; $count++ ) {
            array_push($passed_month,$monthes[$count]);
        }

        return $passed_month;
    }
}
