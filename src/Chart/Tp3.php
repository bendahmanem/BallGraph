<?php


namespace App\Chart;

use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

class Tp3
{
    private float $vitesseInitiale;
    private float $angle;
    private float $width;
    private float $height;
    private array $data;
    private float $xmax;
    private float $ymax;

    public const G = 9.81;

    /**
     * Tp3 constructor.
     * @param float $angle
     * @param float $vitesseInitiale
     * @param float $width
     * @param float $height
     */
    public function __construct(float $angle, float $vitesseInitiale, float $width, float $height)
    {
        $this->angle = $angle * pi() / 180;
        $this->width = $width;
        $this->height = $height;
        $this->vitesseInitiale = $vitesseInitiale;

        $this->data = $this->createPlot();
    }

    private function createPlot()
    {
        $xdata[] = [];
        $ydata[] = [];

        $delta = pow(tan($this->angle),2);

        $s1 = (- tan($this->angle)) + (sqrt($delta) /  ( - self::G  / ( 2* pow($this->vitesseInitiale, 2) * pow(cos($this->angle), 2))));
        $s2 =   (- tan($this->angle)) - (sqrt($delta) /   ( - self::G  / (2 * pow($this->vitesseInitiale, 2) * pow(cos($this->angle), 2))));

        $this->xmax = max($s1, $s2);


        //dd($s1, $s2);
        // calcul des données d'ordonnées
        for ($i = 0; $i <= ($this->xmax + 0.3 * $this->xmax); $i++){
            $xdata[$i]= $i;
            $pointDeChute = 0;
            $tmp = ($i * tan($this->angle)) - ( (self::G * pow($i, 2)) / (2 * pow($this->vitesseInitiale, 2) * pow(cos($this->angle), 2)));
            if ($i > 0 && $tmp == 0 && $pointDeChute == 0) {
                $pointDeChute = $i;
            }
            $ydata[$i] =  ($i * tan($this->angle)) - ( (self::G * pow($i, 2)) / (2 * pow($this->vitesseInitiale, 2) * pow(cos($this->angle), 2)));
        }
        $this->ymax = max($ydata);

        return $ydata;

    }
    
    public function render() 
    {
        // The code to setup a very basic graph
        $__width  = $this->width;
        $__height = $this->height;
        $graph    = new Graph\Graph($__width, $__height);
        $graph->SetScale('linlin', 0, $this->ymax + (0.1 * $this->ymax), 0,  $this->xmax + (0.1 * $this->xmax));
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
