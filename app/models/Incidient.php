<?php

use Phalcon\Mvc\Model;

class Incidient extends Model
{
    public $id;         //возможно нужно будет менять на протектед
    public $idInWiki;
    public $userId;
    public $status;
    public $dateStart;
    public $dateEnd;
    public $title;
    public $time;

    //добавить связку BelongsTo и Hasmany
    public function initialize(){
        $this->setSource('incidient');
    }

    public function checkOnFreedom($strQuery){//id
        $query = $this->modelsManager->createQuery(
            "SELECT * FROM Incidient WHERE idInWiki=$strQuery AND  dateEnd is NULL AND status=0");//AND status=0;

        return $free = $query->execute();
    }// проверка на наличие незакрытого события такого типа

    public function searchForChange($id){
        $query = $this->modelsManager->createQuery(
            "SELECT * FROM Incidient WHERE id=$id");

        return $step = $query->execute();
    }//function searchRealTime

    public function searchRealTime($strQuery){
        $query = $this->modelsManager->createQuery(
            "SELECT ");

        return $step = $query->execute();
    }//function searchRealTime

    public function searchActive($strQuery){
        $dateStart = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
        $query = $this->modelsManager->createQuery(
            "SELECT ");

        return $active = $query->execute();
    }//поиск активных заявок за последние сутки

    public function searchLong($strQuery){
        $dateStart = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
        $query = $this->modelsManager->createQuery(
            "SELECT id = ");

        return $long = $query->execute();
    }//поиск долгосрочных заявок за последние сутки

    public function searchFinished(){
        $dateStart = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
        $query = $this->modelsManager->createQuery(
            "SELECT ");

        return $finished = $query->execute();
    }//поиск завершенных заявок за последние сутки


    public function saveIncidientStart($idInWiki, $userId, $title, $time){
        //$incid = new Incidient();
        $dateStart = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
        //date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);

        $this->idInWiki=$idInWiki;
        $this->userId=$userId;
        $this->status=0;
        $this->dateStart=$dateStart;
        $this->title=$title;
        $this->time=$time;
        $this->save();

    }//сохранение в базу начала инцедента работает
}