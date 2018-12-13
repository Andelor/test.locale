<?php
use Phalcon\Mvc\Model;

class Users extends Model
{
    public $id;
    public $surname;
    public $name;
    public $patronymic;
    public $role;
}