<?php

namespace App\Chart;

use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

class Tp2 {
    private float $angle;
    private float $vitesseInitiale;
    private float $coeffFluide;
    private float $massePtMat;
    private int $distance;
    private int $width;
    private int $height;
    private array $data;
    private float $xmax;
    private float $ymax;
    
    public const G = 9.81;

    /**
     * Tp2 constructor.
     * @param float $angle
     * @param float $vitesseInitiale
     * @param float $coeffFluide
     * @param float $massePtMat
     * @param int $distance
     * @param int $width
     * @param int $height
     * @param array $data
     */
    public function __construct(float $angle, float $vitesseInitiale, float $coeffFluide, float $massePtMat, float $distance, int $width, int $height)
    {
        $this->angle = $angle;
        $this->vitesseInitiale = $vitesseInitiale;
        $this->coeffFluide = $coeffFluide;
        $this->massePtMat = $massePtMat;
        $this->distance = $distance;
        $this->width = $width;
        $this->height = $height;
        $this->data = $this->createPlot();
    }

    private function createPlot() {
        $ydata = [];
        $this->angle = ($this->angle * pi()) / 180;
        $k =  $this->coeffFluide / $this->massePtMat; // ??? / kg

        // calcul des différents coeff
        $a = $this->vitesseInitiale / $k * cos($this->angle);
        $c = self::G / pow($k, 2);

        $b = $this->vitesseInitiale / $k * sin($this->angle) + $c;
        // calcul des données d'ordonnées
        for ($i = 0; $i <= $this->distance; $i++){
            $ydata[] = ( ($b/$a) * $i) + ($c * log( abs(1 - ($i / $a))) );
        }
        $this->xmax = ( (pow($this->vitesseInitiale, 2)) * cos($this->angle) * sin($this->angle)) / ($k*$this->vitesseInitiale*sin($this->angle) + self::G);
        $this->ymax =  (($b/$a) * $this->xmax) + ($c*log( 1 - ($this->xmax / $a))) ;
        return $ydata;
    }

    public function render() {
        // The code to setup a very basic graph
        $__width  = $this->width;
        $__height = $this->height;
        $graph    = new Graph\Graph($__width, $__height);
        $graph->SetScale('linlin', 0, $this->ymax + 10, 0, $this->xmax * 3);
        $graph->SetMargin(30, 15, 40, 30);
        $graph->SetMarginColor('white');
        $graph->SetFrame(false);

        $graph->title->Set('Label background');
        $graph->title->SetFont(FF_ARIAL, FS_BOLD, 12);

        $graph->subtitle->SetFont(FF_ARIAL, FS_NORMAL, 10);
        $graph->subtitle->SetColor('darkred');
        $graph->subtitle->Set('"LABELBKG_NONE"');

        $graph->SetAxisLabelBackground(LABELBKG_NONE, 'orange', 'red', 'lightblue', 'red');

        // Use Ariel font
        $graph->xaxis->SetFont(FF_ARIAL, FS_NORMAL, 9);
        $graph->yaxis->SetFont(FF_ARIAL, FS_NORMAL, 9);
        $graph->xgrid->Show();

        // Create the plot line
        $p1 = new Plot\LinePlot($this->data);
        $graph->Add($p1);
        // Output graph
        $graph->Stroke();
    }


}