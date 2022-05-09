<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function chart($model)
    {
        return Chart::getModelReport($model);
    }
}
