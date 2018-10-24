<?php

use Phalcon\Mvc\Controller;
use StepInIncidient;

class LoadPageController extends Controller
{
    public $str="";

    public function indexAction()
    {

    }

    public  function pageAction()
    {
        $pageid = $this->dispatcher->getParam("pageid");

        $string = 'http://site.ru/w/api.php?action=query&prop=revisions&rvprop=content&format=json&pageids=';

        $string = $string . $pageid;//должен быть get


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $string);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $ctri = curl_exec($curl);
        $ctri = json_decode($ctri);
        $pages = $ctri->query->pages;
        $t = "*";
        $string = "";

        foreach ($pages as $page) {  //вывод
            $string = $string . $page->revisions[0]->{$t};   //занесение текста в строку
            $titles=$page->title;
        }
        $m = preg_split("/[=]{2}([^=]*)[=]{2}/imsu", $string);

        preg_match_all("/[=]{2}([^=]*)[=]{2}/imsu", $string, $matches);

        $tim=0;
        $lengthM = count($m);
        for($i=0;$i < $lengthM-1;$i++){
            $matches[0][$i]=preg_replace("/[=]{2}/",'', $matches[0][$i]);
            if (preg_match("|^[\d]{1,}\-[\d]{1,}\ мин$|", $matches[0][$i])) { //если заголовок со временем
                preg_match_all("/\d{1,}/", $matches[0][$i], $times);
                $tim +=  $times[0][1] - $times[0][0];
            }
        }

        $this->view->tim=$tim;
        $this->view->m=$m;
        $this->view->matches=$matches;


        $objectMyModel = new Incidient();
        $result=$objectMyModel->checkOnFreedom($pageid);


        $zerro=0;
        foreach($result as $e){
            if (($e->id!=0) or ($e->id!='')) $zerro=1;
        }
        if ($zerro==1) {
            $this->view->ech=$result;
            //$currentTime = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
            $currentTime=$_SERVER['REQUEST_TIME']; //
            time();
            mktime(``);

            $date=date_parse_from_format('Y-m-d H:i:s',$result[0]->dateStart);//массив
            $date_1=date('U',mktime($date["hour"],$date["minute"],$date["second"],$date["month"],$date["day"],$date["year"]));//время в микро секундах

            $difference = (int)$currentTime - (int)$date_1;

            $this->view->time_diff=(int)$difference;//разница во времени в микросекундах
        }
        else { //сохраняем новый инцедент если нет такого незавершенного
            $objectMyModel->saveIncidientStart($pageid,1,$titles,$tim);
            $this->view->ech=$result;


            $result_1=$objectMyModel->checkOnFreedom($pageid);
            $this->view->ech_1=$result_1;

            $lengthM = count($m);
            for($i=0;$i < $lengthM-1;$i++){//если новый инцедент, то создаем необходимое кол-во шагов для этого действия
                //foreach($result_1[0] as $f){//хоть и резуьтат единственный, но запрос возвращает таблицу
                    $stepin= new StepInIncidient();
                    $stepin->idIncidient=$result_1[0]->id;
                    $stepin->step=$i;
                    $stepin->save();
                //}
            }
        }//добавить user id

        $steps=StepInIncidient::find(
          [
              'idIncidient = :ind:',       //запрос
              'bind'=>[
                  'ind' => $result[0]->id,//$pageid,
              ],
          ]
        );
        $this->view->steps=$steps;

        $cur_steps=0;
        $i=0;
        while($steps[$i]->ending!=NULL){
            $i++;
        }
        //$cur_steps=$i+1;//это правильный вариант
        $cur_steps=$i+3;//тестовый вариант
        $this->view->cur_steps=$cur_steps;
        curl_close($curl);
    }



}
