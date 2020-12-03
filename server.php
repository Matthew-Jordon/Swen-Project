<?php

    $servername;
    $user;
    $password;
    $dbase;
    $charset;

    $this->servername = "localhost";
    $this->user = "test";
    $this->password = "Comp2140";
    $this->dbase = " eilps";
    $this->charset = "utf8mb4";
  
    try{
        //create connection
        $dsn = "mysql:host=".$this->$servername.";dbname=".$this->dbname.";charset=".$this->charset;
        $connect = new PDO($dsn,$this->user,$this->password);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $p = new process();
        $p ->process();
     
    }catch (PDOException $e){
        echo "Connection failed: ".$e->getMessage;
    }
    


class Processes {
    private $docmanager;
    private $schedule;
    function __construct() {
        $this ->docmanager = new Docmanager();
        $this ->schedule = new schedule();
    }
    
    //Methods
    function registerRequest($id,$date,$quantity,$request,$delivery) {
        $docmanager ->insertdata($id,$date,$quantity,$request,$delivery);
        echo('request saved');
        Notify();
    }

    function receiveData($id) {
        $r = $docmanager ->retrieve_data();
        if ($id == null) {
            foreach ($x as $r) {
                    echo("<table><tr><th>id</th><th>date made</th><th>quantity</th><th>request</th><th>delivery</th></tr>
                    <tr><td>".$x['Orderid']."</td><td>".$x['dateCreated']."</td><td>".$x['quantity']."</td><td>".$x['request']."</td><td>".$x['delivery']."</td></tr></table>");
                }
            } else {
            foreach ($x as $r) {
                if ($x['Orderid'] == $id) {
                    echo("<table><tr><th>id</th><th>date made</th><th>quantity</th><th>request</th><th>delivery</th></tr>
                    <tr><td>".$x['Orderid']."</td><td>".$x['dateCreated']."</td><td>".$x['quantity']."</td><td>".$x['request']."</td><td>".$x['delivery']."</td><td><a href='".$x['img']."'download='image'>Image File</a></td></tr></table>");
                }
            }
        }
    }

    function Notify() {
        mail("matthewjordon.whynter@mymona.uwi.edu","New Request", "There is a new request login to check it out.");
    }

    function addToSchedule($id,$date,$time,$type) {
        $schedule.add($id,$date,$time,$type);
    }
    function display_sc() {
        $schedule.display();
    }
    function process() {
        $req = $_REQUEST['req'];
        $con = $_REQUEST['con'];
        if (strcasecmp($con,"")) {
            
        } else if (strcasecmp($con,"")) {

        }
    }
}

class schedule {
    private $slots = array();

    function add($id,$date,$time,$type) {
        $docmanager ->add_schedule($id,$date,$time,$type);
    }
    function display() {
        $result = $docmanager ->display_sched();
        foreach ($x as $result) {
            echo("<table><tr><th>id</th><th>date</th><th>time</th><th>appointment</th></tr>
            <tr><td>".$x['cust_id']."<td></td>".$x['sdate']."<td></td>".$x['stime']."<td></td>".$x['stype']."</td></tr></table>");
        }
    }
}


class Docmanager{
    function insertdata($id,$date,$quantity,$request,$delivery,$img){
        $insertData = "INSERT INTO 'Request'('OrderId', 'dateCreated', 'quantity', 'request', 'delivery') 
        VALUES ('$id','$date','$quantity','$request','$delivery')";
        $insertimg = "INSERT INTO 'Request'('img') values (SELECT * FROM OPENROWSET($img, SINGLE_BLOB) as T1)";
    
        $stmt = $connect->query($insertData);
    }

    function retrieve_data(){
        $stmt = $connect->query("SELECT * FROM 'Request'");
        $results = $stmt ->fetchALL(PDO ::FETCH_ASSOC);
        return $result;
        
    }

    function store_invoice($invoice_id,$date_invoice,$price,$request){
        $insertData = "INSERT INTO 'invoice('invoice_id','date_invoice','price','request')
        VALUES('$invoice_id','$date_invoice','$price','$request')";
    }

    function get_invoice($id){
        $stmt = $connect->query("SELECT * FROM `invoice`");
        $results = $stmt ->fetchALL(PDO ::FETCH_ASSOC);
        return $result;
    }
    function add_schedule($id,$date,$time,$type) {
        $insertData = "INSERT INTO 'Slot('cust_id','sdate','stime','stype')
        VALUES('$id','$date','$time','$type')";
    }
    function display_sched() {
        $stmt = $connect->query("SELECT * FROM 'Slot'");
        $results = $stmt ->fetchALL(PDO ::FETCH_ASSOC);
        return $result;
    }
}

?>