<?php


namespace App\Controller;


use App\Chart\Tp3;

class Tp3Controller extends AbstractController
{
    public function getView()
    {
        $this->render("tp3/getView.php");
    }

    public function renderData() {
    if (isset($_POST["tp3"]))
        {
        $angle = $_POST["angle"];
        $vitesseInitiale = $_POST["vitesseInitiale"];

        $tp3 = new Tp3($angle, $vitesseInitiale, 1600, 1200);

        $tp3->render();
    }
    }
}