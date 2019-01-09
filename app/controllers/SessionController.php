<?php

use Phalcon\Mvc\Controller;

class SessionController extends Controller
{

    private function _registerSession($user)
    {
        $this->session->set(
            'auth',
            [
                'id'   => $user[0]->id,
                'surname'=> $user[0]->surname,
                'name' => $user[0]->name,
                'patronymic'=> $user[0]->patronymic,
            ]
        );
    }

    public function startAction()
    {
        if ($this->request->isPost()) {
            // Get the data from the user
            //$_POST['select_name']=
            $id = $this->request->getPost('select_surname');
            //$surname = $this->request->getPost('surname');

            // Find the user in the database
            $user = Users::find(
                [
                    "id = :id:",
                    'bind' => [
                        //'surname'    => $surname,
                        'id'=> $id,
                    ]
                ]
            );


            if ($user !== false) {
                $this->_registerSession($user);

                $this->flash->success(
                    'Добро пожаловать ' . $user->name
                );

                // Forward to the 'index' controller if the user is valid
                return $this->dispatcher->forward(
                    [
                        'controller' => 'index',
                        'action'     => 'index',
                    ]
                );
            }

            $this->flash->error(
                'Не найдено данное имя'
            );
        }

        // Forward to the login form again
        return $this->dispatcher->forward(
            [
                'controller' => 'index',
                'action'     => 'index',
            ]
        );
    }
}