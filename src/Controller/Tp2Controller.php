<?php


namespace App\Controller;


use App\Chart\Tp2;

class Tp2Controller extends AbstractController
{
    public function getView()
    {
        $this->render("tp2/getView.php");
    }

    public function renderData()
    {
        if (isset($_POST["tp2"]))
        {
            $angle = $_POST["angle"];
                $vitesseInitiale = $_POST["vitesseInitiale"];
                $coeffFluide = $_POST["coeffFluide"];
                $massePtMat = $_POST["massePtMat"];
                $distance = $_POST["distance"];
                $tp2 = new Tp2($angle, $vitesseInitiale, $coeffFluide, $massePtMat, $distance, 1600, 1200);
                $tp2->render();
        }
    }


}