<?php
$session = session_start();

include_once "classes.php";

$basketTotalProductTypes = 0 ;
$basket = [];
$i=0;
$singleMovieObject = new Event;
$newItem = true;

if(isset($_COOKIE['basketTotalProductTypes'])) {
    $basketTotalProductTypes = $_COOKIE['basketTotalProductTypes'];

    if(isset($_POST['buyTicket'])) {
        for($i=0;isset($_COOKIE["eventID" . $i]);$i++) {
            if($_COOKIE["eventID" . $i] == $_POST['eventID']) {
                $newNumberOfItemsID = "noOfTickets" . $i;
                $newNumberOfItems = (int) $_POST['numberOfTickets'] + (int) $_COOKIE[$newNumberOfItemsID];
                
                setcookie($newNumberOfItemsID, $newNumberOfItems, time()+3500);
                unset($_POST['buyTicket']);
                $newItem = false;
            }
        }
    }
        
        if($newItem) {
            $eventID = "eventID" . $i;
            $numberOfItemsID = "noOfTickets" . $i;
            $event = $_POST['eventID'];
            $numberOfItems = (int) $_POST['numberOfTickets'];
             
            setcookie($eventID, $event, time()+3500);
            setcookie($numberOfItemsID, $numberOfItems, time()+3500);

            $basketTotalProductTypes = $basketTotalProductTypes + 1;
        
            setcookie("basketTotalProductTypes", $basketTotalProductTypes, time()+3500);
            unset($_POST['buyTicket']);
        } 
    }
} else {
    if(isset($_POST['buyTicket'])) {
        $eventID = "eventID1";
        $numberOfItemsID = "noOfTickets1";
        $event = $_POST['eventID'];
        $numberOfItems = (int) $_POST['numberOfTickets'];
            
        setcookie($eventID, $event, time()+3500);
        setcookie($numberOfItemsID, $numberOfItems, time()+3500);

        $basketTotalProductTypes = 1;
    
        setcookie("basketTotalProductTypes", $basketTotalProductTypes, time()+3500);
        unset($_POST['buyTicket']);
    }
}

include_once "head.php";
include_once "nav.php";

if($mainpage == "client") {
include_once "main.php";
} else {
include_once "mainadmin.php";
}
include_once "footer.php";

?>