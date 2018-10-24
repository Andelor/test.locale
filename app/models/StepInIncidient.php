<?php
use Phalcon\Mvc\Model;

class StepInIncidient extends Model
{
    public $id;
    public $idIncidient;
    public $step;
    public $ending;
    public $isOverdue;

    function saveStep($idIncidient, $step, $ending, $isOverdue){//проверить работоспособность
        $this->idIncidient=$idIncidient;
        $this->step=$step;
        $this->isOverdue=$isOverdue;
        $this->save();
    }

    function searchNeedString($idIncidient, $step){
        $query = $this->modelsManager->createQuery(
            "SELECT * FROM step_in_incidient WHERE idIncidient=$idIncidient AND  step=$step");//AND status=0;


        return $free = $query->execute();
    }

    function currentStep($idIncidient){
        //$query = $this->modelsManager->createQuery(
            //"SELECT * FROM step_in_incidient WHERE idIncidient=$idIncidient AND  step=");//AND status=0;


        //return $free = $query->execute();
    }

}