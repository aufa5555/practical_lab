<?php

$error="";
$showBill = false;


if (isset($_POST['calculate']))
   $firstinput = $_POST['first'];
   $secondinput = $_POST['second'];
   $thirdinput = $_POST['third'];
   $fourthinput = $_POST['fourth'];
   $fifthinput = $_POST['fifth'];
   

    //first validation
    //if user not enter anything, then output will be zero(0)
    if($firstinput == "")
        $firstinput = 0;
    if($secondinput == "")
        $secondinput = 0;
    if($thirdinput == "")
        $thirdinput = 0;
    if($fourthinput == "")
        $fourthinput = 0;
    if($fifthinput == "")
        $fifthinput = 0;

    //second validation
    if($firstinput < 0 || $secondinput < 0 || $thirdinput < 0 || $fourthinput < 0 || $fifthinput < 0)
        $error = "Please enter positive numbers only!!!";

    //third validation
    //will validate exactly as question asked
    // max value max for each input
    else if($firstinput>200)
        $error = "Please enter below 200kwh";
     else if($secondinput>100)
        $error = "Please enter below 100kwh";
     else if($secondinput>300)
        $error = "Please enter below 300kwh";
    else if($thirdinput>300)
        $error = "Please enter below 300kwh";
    else if($fourthinput>300)
        $error = "Please enter below 300kwh";
    //fifth input has no limit because the tariff says"901 kwh onwards

    //fourth validation
    //will check if any felds has input from user
    else if(
        $firstinput + $secondinput + $thirdinput + $fourthinput + $fifthinput==0
        )
     $error = "Please enter at least one input";
        
    //once all above validations already passed, we calculate the bill
    else{
        $firstcharge = $firstinput *0.218;
        $secondcharge = $secondinput *0.334;
        $thirdcharge =$thirdinput*0.516;
        $fourthcharge =$fourthinput* 0.546;
        $fifthcharge =$fifthinput* 0.571;

        $totalInput = $firstinput + $secondinput + $thirdinput + $fourthinput + $fifthinput;
        $totalCharge = $firstcharge + $secondcharge + $thirdcharge + $fourthcharge + $fifthcharge;
        
        if($totalCharge <3)
            $totalCharge =3;
        
        if($totalInput > 600 ){
            $totalCharge = $totalCharge*0.06 ;
            #totalCharge = $totalCharge + $sst;

            //cara cepat nak kira hasil
            //$totalCharge = $totalCharge * 1.06;
        }

        $showBill=true;

    }
        
    
   //create variable to store the value of multiplication
   //$firstcharge = $firstinput * 0.218;
 // echo" The first charge is:" . $firstcharge;

?>