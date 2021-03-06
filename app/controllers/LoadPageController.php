<?php

use Phalcon\Mvc\Controller;
//use StepInIncidient;
use Phalcon\Mvc\View;

class LoadPageController extends Controller
{
    public $str="";

    public function indexAction()
    {

    }

    public function baseAction()
    {
        if(!$this->request->isPost()) return;
       // $this->view->setRenderLevel(View::LEVEL_NO_RENDER); websockets - двунаправленное соединение
        $index = $this->request->getPost('index');
        $index--;
        $id = $this->request->getPost('page');
        $t = $this->request->getPost('type');

        //$objectMyModel = new StepInIncidient;
        $step = StepInIncidient::find(
            ['idIncidient = :ind: AND step = :st:',       //запрос
            'bind'=>[
                        'ind' => $id,//$pageid,
                        'st' => $index,
                    ],
            ]
        );
        //var_dump($step[0]);

        if ($step[0]->ending==NULL) {
            //$step[0]->ending = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
            $step->update(
                [
                    'ending' => date('Y-m-d H:i:s'),
                ]
            );
        }

        if($t=='-'){
            $incidient = Incidient::find(
                ['id = :ind:',       //запрос
                    'bind'=>[
                        'ind' => $id,//номер записи,
                    ],
                ]
            );
            $incidient->update(
                [
                    'status' => '1',
                ]
            );
        }
        //var_dump($step[0]);
        //var_dump($objectMyModel->getChangedFields());

        echo var_dump($_POST);
        echo var_dump($index);
        echo var_dump($id);
    }

    public function typAction()
    {
        if(!$this->request->isPost()) return;
        // $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
        $id = $this->request->getPost('dni');

        //$objectMyModel = new Incidient();
        $incidient = Incidient::find(
            ['id = :ind:',       //запрос
                'bind'=>[
                    'ind' => $id,//номер записи,
                ],
            ]
        );

        var_dump($incidient[0]);
        //var_dump($incidient[0]->status);
        /*$incidient=$incidient->searchForChange($id);
        var_dump($incidient[0]);
        var_dump($incidient[0]->status);*/
        //if($incidient)
        if ($incidient[0]->status=='0') {
            //$step[0]->ending = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
            $incidient->update(
                [
                    'status' => '1',
                ]
            );
        }

        //var_dump($step[0]);
        //var_dump($objectMyModel->getChangedFields());

        echo var_dump($_POST);
        echo var_dump($id);
    }

    public function endAction()
    {
        if(!$this->request->isPost()) return;
        // $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
        $id = $this->request->getPost('i');
        $index = $this->request->getPost('tep');
        $index--;


        $step = StepInIncidient::find(
            ['idIncidient = :ind: AND step = :st:',       //запрос
                'bind'=>[
                    'ind' => $id,//$pageid,
                    'st' => $index,
                ],
            ]
        );

        if ($step[0]->ending==NULL) {
            //$step[0]->ending = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
            $step->update(
                [
                    'ending' => date('Y-m-d H:i:s'),
                ]
            );
        }

        $objectMyModel = new Incidient();
        $incidient = Incidient::find(
            ['id = :ind:',       //запрос
                'bind'=>[
                    'ind' => $id,//$pageid,
                ],
            ]
        );

        if (($incidient[0]->status==1)OR($incidient[0]->status==0)) {
            //$step[0]->ending = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
            $incidient->update(
                [
                    'status' => 2,
                    'dateEnd' => date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']),
                ]
            );
        }
        //var_dump($step[0]);
        //var_dump($objectMyModel->getChangedFields());

        echo var_dump($_POST);
        echo var_dump($id);
    }

    public  function pageAction()
    {
        $pageid = $this->dispatcher->getParam("pageid");


        $incidient = Incidient::find(
            ['id = :ind:',       //запрос
                'bind'=>[
                    'ind' => $pageid,
                ],
            ]
        );

        $pageid=$incidient[0]->idInWiki;

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
        //$result=$objectMyModel->checkOnFreedom($incidient[0]->id);

        if ($incidient[0]->title=='.') {
           $zerro=0;
        }
        else $zerro=1;

        /*$zerro=0;
        foreach($result as $e){
            if (($e->id!=0) or ($e->id!='')) $zerro=1;
        }*/
        if ($zerro==1) {
            $this->view->ech=$incidient;
            //$currentTime = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
            $currentTime=$_SERVER['REQUEST_TIME']; //
            time();
            mktime(``);

            $date=date_parse_from_format('Y-m-d H:i:s',$incidient[0]->dateStart);//массив
            $date_1=date('U',mktime($date["hour"],$date["minute"],$date["second"],$date["month"],$date["day"],$date["year"]));//время в микро секундах

            $difference = (int)$currentTime - (int)$date_1;

            $this->view->time_start_in=(int)$date_1;

            $this->view->time_diff=(int)$difference;//разница во времени в микросекундах

            $this->view->current_time=(int)$currentTime;

            $steps=StepInIncidient::find(
                [
                    'idIncidient = :ind:',       //запрос
                    'bind'=>[
                        'ind' => $incidient[0]->id,//$pageid,
                    ],
                ]
            );

            foreach ($steps as $st){//проход по шагам
                if(($st->isOverdue==1 )&&( $st->ending!=NULL))//если окончен с просрочкой
                {

                }
                else
                    if(($st->isOverdue==0 )&&( $st->ending!=NULL)){ //без просрочки

                    }
            }

        }
        else { //сохраняем новый инцедент если нет такого незавершенного
            //$objectMyModel->saveIncidientStart($pageid,1,$titles,$tim); //создание новой записи в инцедентах
            //$this->view->ech=$result;
            $incidient[0]->title = $titles;
            $incidient[0]->userId = 1;
            $incidient[0]->time=$tim;
            $incidient[0]->dateStart=date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);;
            $incidient[0]->status=0;
            $incidient[0]->save();

            //$result_1=$objectMyModel->checkOnFreedom($pageid);
            $this->view->ech=$incidient;

            //$this->view->ech_1=$result_1;

            $lengthM = count($m);
            for($i=0;$i < $lengthM-1;$i++){//если новый инцедент, то создаем необходимое кол-во шагов для этого действия
                //foreach($result_1[0] as $f){//хоть и резуьтат единственный, но запрос возвращает таблицу
                    $stepin= new StepInIncidient();
                    $stepin->idIncidient=$incidient[0]->id;//$result_1[0]->id;
                    $stepin->step=$i;
                    $stepin->save();
                //}
            }
            $steps=StepInIncidient::find(
                [
                    'idIncidient = :ind:',       //запрос
                    'bind'=>[
                        'ind' => $incidient[0]->id,//$result_1[0]->id,//$pageid,
                    ],
                ]
            );
        }//добавить user id


        $this->view->steps=$steps;

        $this->view->id_in=$incidient[0]->id;

        $cur_steps=0;//изменить на реальный шаг в соответствии с базой
        $i=0;
        while(($steps[$i]->ending!=NULL) and ($i<count($steps)-1)){
            $i++;
        }
        $cur_steps=$i+1;//это правильный вариант
        //$cur_steps=$i+3;//тестовый вариант
        $this->view->cur_steps=$cur_steps;
        curl_close($curl);
    }

    function newAction(){
        $id = $this->dispatcher->getParam("ndx");

        $objectMyModel = new Incidient();
        $objectMyModel->idInWiki=$id;
        $objectMyModel->userId=1;
        $objectMyModel->title='.';
        $objectMyModel->time=0;


        if ($objectMyModel->create() === false) {
            echo "Мы не можем сохранить робота прямо сейчас: \n";

            $messages = $objectMyModel->getMessages();

            foreach ($messages as $message) {
                echo $message, "\n";
            }
        } else {
            echo 'Отлично, новая запись робот был успешно создан!';
        }
        $num=$objectMyModel->id;
        //pageid
        header("Location: http://test.locale/incidient/$num");
        //$this->pageAction();
    }

}
