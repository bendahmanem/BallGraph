<?php


namespace App\Controller;


use App\Chart\Tp1;

class Tp1Controller extends AbstractController
{
    public function getView() {
        $this->render("tp1/getView.php");
    }

    public function renderData() {
        if ( isset($_POST["tp1"])) {
            $distance = $_POST["distance"];
            $graph = new Tp1($distance, 1600, 1200);
            $graph->render();
        }
    }
}