<?php
function weekDay($dayNum){


    if($dayNum == 1){
        return 'Monday';
    }
    if($dayNum == 2){
        return 'Tuesday';
    }
    if($dayNum == 3){
        return 'Wednesday';
    }
    if($dayNum == 4){
        return 'Thursday';
    }
    if($dayNum == 5){
        return 'Friday';
    }
    if($dayNum == 6){
        return 'Saturday';
    }
    if($dayNum == 7){
        return 'Sunday';
    }

}



function activeStat($status){
    if($status == 0){
        return 'Inactive';
    }
    if($status == 1){
        return 'Active';
    }

}
?>