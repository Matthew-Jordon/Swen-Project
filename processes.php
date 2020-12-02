<?php
require_once 'sql conn.php';
require '';

class Processes {
    private $docmanager;
    private $schedule;
    function __construct() {
        $this ->req = filter_var($_REQUEST[''], FILTER_VALIDATE_STRING);
        $this ->docmanager = new Docmanager();
        $this ->schedule = new schedule();
    }
    
    //Methods
    function registerRequest($req) {
        $docmanager ->store($req);
        echo('request saved');
    }

    function receiveData() {
        echo($docmanager ->retrieve());
        
    }

    function Notify() {
         
    }

    function addToSchedule($slot,$id) {
        $schedule.add($slot);
    }
}

class schedule {
    private $slots = array();

    function add($slot,$id) {
        $slots[$id] = $slot;
    }
    function display() {
        foreach ($slots as $key=>$val) {
            echo("$key at $val");
        }
    }
}
?>