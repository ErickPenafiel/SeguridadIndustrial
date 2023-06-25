<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Accidente;

class AccidentesCharts extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct(){
        parent::__construct();
    }
}