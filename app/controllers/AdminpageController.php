<?php

use Phalcon\Mvc\Controller;
//use StepInIncidient;
use Phalcon\Mvc\View;

class adminpageController extends Controller
{
    public function indexAction()
    {

    }

    public function reportAction()
    {
        $login = $this->request->getPost('select_surname');
        $password = $this->request->getPost('select_surname');
    }

    public function loginAction()
    {
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');
    }

    public function requestAction()
    {
        $date_start = $this->request->getPost('beginDate', 'int');
        $date_end = $this->request->getPost('endDate', 'int');
        $type_request = $this->request->getPost('inputType', 'int');

        echo var_dump($date_start, $date_end, $type_request);

        if ($type_request == 1)//по шагам(сколько за период завершено шагов)
        {
            $user = Users::find(
                [
                    '',
                ]
            );

            $i=count($user);

            $data=array();

            foreach ($user as $us)
            {
                $us->id;
                $steps = StepInIncidient::find(
                    [
                        'idUserEnding = :id: AND ending between :date: AND :dats:',       //запрос
                        'bind' => [
                            'id' => $us->id, //$result_1[0]->id,//$pageid,
                            'date' => $date_start,
                            'dats' => $date_end,
                        ],
                        //'conditions' => 'date between "2017-12-31" AND "2019-12-31"',
                    ]
                );
                $summ=count($steps);

                $index = (int)$us->id - 1;
                $data[$index][1]=(string)$us->id;
                $data[$index][2]=(string)$us->surname;
                $data[$index][3]=(string)$summ;
                echo var_dump($us->id, $us->surname, $summ);
            }
            //заголовки
            $title=array();
            $title[0]='Номер';
            $title[1]='Фамилия оператора';
            $title[2]='Количество';

            $this->view->nameTable="Количество завершенных шагов за период с ".$date_start." по ".$date_end;
            $this->view->title=$title;
            $this->view->data=$data;
        }


        if ($type_request == 2)//по колличеству начатых инцидентов
        {
            $user = Users::find(
                [
                    '',
                ]
            );

            $i=count($user);

            $data=array();
            foreach ($user as $us) {
                $us->id;
                $incidient = Incidient::find(
                    [
                        'userId = :id: AND (dateStart between :date: AND :dats: OR dateEnd between :date: AND :dats:) ',       //запрос
                        'bind' => [
                            'id' => $us->id, //$result_1[0]->id,//$pageid,
                            'date' => $date_start,
                            'dats' => $date_end,
                        ],
                        //'conditions' => 'date between "2017-12-31" AND "2019-12-31"',
                    ]
                );
                $summ = count($incidient);

                /*$time=$date_end-$date_start;
                $date_start_2=$date_start-$time;
                $date_end_2=$date_start;

                //$this->view->time= ;
                //$this->view->date_start_2=
                //$this->view->date_end_2=

                $incidient_last_week = Incidient::find(
                    [
                        'userId = :id: AND (dateStart between :date: AND :dats: OR dateEnd between :date: AND :dats:) ',       //запрос
                        'bind' => [
                            'id' => $us->id, //$result_1[0]->id,//$pageid,
                            'date' => $date_start_2,
                            'dats' => $date_end_2,
                        ],
                        //'conditions' => 'date between "2017-12-31" AND "2019-12-31"',
                    ]
                );
                $summ_2 = count($incidient_last_week);*/

                $index = (int)$us->id - 1;
                $data[$index][1] = (string)$us->id;
                $data[$index][2] = (string)$us->surname;
                $data[$index][3] = (string)$summ;
                //$data[$index][4] = (string)$summ_2;
                echo var_dump($us->id, $us->surname, $summ);
            }

            //заголовки
            $title=array();
            $title[0]='Номер';
            $title[1]='Фамилия оператора';
            $title[2]='Количество';
            //$title[3]='Количество за предыдущий период';

            $this->view->nameTable="Количество открытых и закрытых инцидентов за выбранный период с ".$date_start." по ".$date_end;
            $this->view->title=$title;
            $this->view->data=$data;
        }

        if ($type_request == 3)//по типам
        {
            $incidient = Incidient::find(
                [
                    '(dateStart between :date: AND :dats:) OR (dateEnd between :date: AND :dats:)',       //запрос
                    'bind' => [
                        'date' => $date_start,
                        'dats' => $date_end,
                    ],
                    //'group' => 'idInWiki, title',
                    //'group' => 'idInWiki',
                ]
            );

            $objectMyModel = new Incidient();
            $rows= $objectMyModel->genIncidientInDate($date_start,$date_end);

            /*$i2 = Incidient::count(
                [
                    'group' => 'idInWiki, title',
                    //'group' => 'title',
                    //'order' => 'rowcount',
                ]
            );*/
            $index=0;
            $data=array();
            foreach ($rows as $c){
                $data[$index][1]=$c->title;
                $data[$index][2]=$c->idInWiki;
                $data[$index][3]=$c->quantity;
                //$data[$index][4]=1;
                $index++;
            }

            //заголовки
            $title=array();
            $title[0]='Инцидент';
            $title[1]='idInWiki';
            $title[2]='Сумма';

            $this->view->nameTable="Количество по типам за выбранный период с ".$date_start." по ".$date_end;
            $this->view->title=$title;
            $this->view->data=$data;

            $this->view->incidient = $incidient;
            //$this->view->i2 = $i2;
            $this->view->rows=$rows;
            //var_dump($i2);

        }
    }

}