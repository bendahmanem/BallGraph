<?php

namespace App\Chart;
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

class Tp1 {
    private float $distance;
    private int $width;
    private int $height;
    private array  $data;


    /**
     * Tp1 constructor.
     * @param float $distance
     * @param int $width
     * @param int $height
     */
    public function __construct(float $distance, int $width, int $height)
    {
        $this->distance = $distance;
        $this->width = $width;
        $this->height = $height;

        $this->data =  $this->createPlot();


    }

    private function createPlot() {
        $ydata = [];
        $a = ($this->distance / pow($this->distance, 2));
        for ($i = 0; $i <= $this->distance; $i++) {

            // remplacer A par a calculé
            $ydata[] = ((-$a * pow($i, 2)) + $i) / 100;


        }
        return $ydata;
    }

    public function render() {
        $__width = $this->width;
        $__height = $this->height;

        $graph = new Graph\Graph($__width, $__height);
        $graph->SetScale('linlin');
        $graph->SetMargin(50, 15, 50, 30);
        $graph->SetMarginColor('white');
        $graph->SetFrame(true, 'blue', 3);
        $graph->title->Set('Label background');
        $graph->title->SetFont(FF_ARIAL, FS_BOLD, 12);
        $graph->subtitle->SetFont(FF_ARIAL, FS_NORMAL, 10);
        $graph->subtitle->SetColor('darkred');
        $graph->subtitle->Set('"LABELBKG_NONE"');
        $graph->SetAxisLabelBackground(LABELBKG_NONE, 'orange', 'red', 'lightblue', 'red');

        $graph->xaxis->SetFont(FF_ARIAL, FS_NORMAL, 9);
        $graph->yaxis->SetFont(FF_ARIAL, FS_NORMAL, 9);
        $graph->xgrid->Show();

        $p1 = new Plot\LinePlot($this->data);
        $graph->Add($p1);

        $graph->Stroke();
    }


}