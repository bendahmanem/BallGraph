<?php


namespace App\Controller;


use App\Chart\Tp4;

class Tp4Controller extends  AbstractController
{
    public function getView()
    {
        $this->render("tp4/getView.php");
    }

    public function renderData() {
        if (isset($_POST["tp4"]))
        {
            $angle = $_POST["angle"];
            $initialSpeed = $_POST["initialSpeed"];
            $bulletWeight = $_POST["bulletWeight"];
            $bulletDiameter = $_POST["bulletDiameter"];

            $tp4 = new Tp4($angle, $initialSpeed, $bulletWeight, $bulletDiameter);

            $tp4->render();
        }
    }

}