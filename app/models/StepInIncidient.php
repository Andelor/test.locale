<?php
use Phalcon\Mvc\Model;

class StepInIncidient extends Model
{
    public $id;
    public $idIncidient;
    public $step;
    public $ending;
    public $isOverdue;
    public $idUserEnding;

    function saveStep($idIncidient, $step, $ending, $isOverdue){//проверить работоспособность
        $this->idIncidient=$idIncidient;
        $this->step=$step;
        $this->isOverdue=$isOverdue;
        $this->save();
    }
    function searchNeedString($idIncidient, $step)
    {
        $query = $this->modelsManager->createQuery(
            "SELECT * FROM step_In_Incidient WHERE idIncidient=:idIncidient: AND  step=:step:");//AND status=0;
        return $free = $query->execute(
            [
                'idIncidient' => $idIncidient,
                'step' => $step,
            ]
        );
    }

    /*function searchNeedString($idIncidient, $step){
        $query = $this->modelsManager->createQuery(
            "SELECT * FROM step_In_Incidient WHERE idIncidient=$idIncidient AND  step=$step");//AND status=0;


        return $free=$query->execute();
    }*/

    function currentStep($idIncidient){
        //$query = $this->modelsManager->createQuery(
            //"SELECT * FROM step_in_incidient WHERE idIncidient=$idIncidient AND  step=");//AND status=0;


        //return $free = $query->execute();
    }

/* Initialize method for model.
*/
    public function initialize()
    {
        $this->setSource("step_In_Incidient");
    }

/* Returns table name mapped in the model.
*
* @return string
*/
    public function getSource()
    {
        return 'step_In_Incidient';
    }

}