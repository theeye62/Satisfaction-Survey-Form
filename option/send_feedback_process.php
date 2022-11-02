<?php

    include('../Connections/db_config.php');


    // ------------------------------------ Score Report ------------------------------------
    if(isset($_POST['submit-report'])){

        $topic = mysqli_real_escape_string($conn, $_POST['topic_hidden']);
        $cus_name = mysqli_real_escape_string($conn, $_POST['cus_name']);
        $cus_phone = mysqli_real_escape_string($conn, $_POST['cus_phone']);
        $date_service = mysqli_real_escape_string($conn, $_POST['date_service']);
        $department_service = mysqli_real_escape_string($conn, $_POST['department_service']);
        $complacent_depart = mysqli_real_escape_string($conn, $_POST['complacent_depart']);
        $complacent_staff = mysqli_real_escape_string($conn, $_POST['complacent_staff']);
        $complacent_operat = mysqli_real_escape_string($conn, $_POST['complacent_operat']);
        $other_feedback = mysqli_real_escape_string($conn, $_POST['other_feedback']);

        $query = "INSERT INTO feedback(topic, cus_name, cus_phone, date_service, department_service, complacent_depart, complacent_staff, complacent_operat, other_feedback)
                    VALUE ('$topic', '$cus_name', '$cus_phone', '$date_service', '$department_service', '$complacent_depart', '$complacent_staff', '$complacent_operat', '$other_feedback')";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        echo $query;
        // ------------------------------------ line notify ------------------------------------
        // $sToken = "";
        // $sMessage = "NEW FEEDBACK!!\n";
        // $sMessage .= "\n";
        // $sMessage .= "TOPIC: " . $topic . "\n";
        // $sMessage .= "วันที่นัดหมาย: " . $date_select . "\n";
        // $sMessage .= "เวลา: " . $time_select . "\n";
        // $sMessage .= "ชื่อ-นามสกุล: " . $app_name_lastname . "\n";
        // $sMessage .= "เบอร์โทรติดต่อ: " . $app_phone . "\n";


        // $chOne = curl_init(); 
        // curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        // curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        // curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        // curl_setopt( $chOne, CURLOPT_POST, 1); 
        // curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        // $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        // curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        // curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        // $result = curl_exec( $chOne ); 

        //ส่งข้อความที่ 2 (ทำเผื่อเอาไว้)
        /*$sToken2 = "kaPknlGVcBIowgVPkxSYhqyKJCTyNMJwA95BFyP96C2";
        $headers2 = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken2.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers2); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); */

        // curl_close( $chOne );
        // ------------------------------------ End line notify ------------------------------------

        header("location: ../index.php?feedback=success");
    }

    // ------------------------------------ Feedback Report ------------------------------------
    if(isset($_POST['submit-feedback'])){

        $topic = mysqli_real_escape_string($conn, $_POST['topic_hidden2']);
        $cus_name = mysqli_real_escape_string($conn, $_POST['cus_name']);
        $cus_phone = mysqli_real_escape_string($conn, $_POST['cus_phone']);
        $date_service = mysqli_real_escape_string($conn, $_POST['date_service']);
        $department_service = mysqli_real_escape_string($conn, $_POST['department_service']);
        $complacent_depart = mysqli_real_escape_string($conn, $_POST['complacent_depart']);
        $complacent_staff = mysqli_real_escape_string($conn, $_POST['complacent_staff']);
        $complacent_operat = mysqli_real_escape_string($conn, $_POST['complacent_operat']);
        $other_feedback = mysqli_real_escape_string($conn, $_POST['other_feedback']);

        $query = "INSERT INTO feedback(topic, cus_name, cus_phone, date_service, department_service, complacent_depart, complacent_staff, complacent_operat, other_feedback)
                    VALUE ('$topic', '$cus_name', '$cus_phone', '$date_service', '$department_service', '$complacent_depart', '$complacent_staff', '$complacent_operat', '$other_feedback')";

        mysqli_query($conn, $query) or die(mysqli_error($conn));
        echo $query;
        // ------------------------------------ line notify ------------------------------------
        // $sToken = "";
        // $sMessage = "NEW FEEDBACK!!\n";
        // $sMessage .= "\n";
        // $sMessage .= "TOPIC: " . $topic . "\n";
        // $sMessage .= "วันที่นัดหมาย: " . $date_select . "\n";
        // $sMessage .= "เวลา: " . $time_select . "\n";
        // $sMessage .= "ชื่อ-นามสกุล: " . $app_name_lastname . "\n";
        // $sMessage .= "เบอร์โทรติดต่อ: " . $app_phone . "\n";


        // $chOne = curl_init(); 
        // curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        // curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        // curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        // curl_setopt( $chOne, CURLOPT_POST, 1); 
        // curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        // $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        // curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        // curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        // $result = curl_exec( $chOne ); 

        //ส่งข้อความที่ 2 (ทำเผื่อเอาไว้)
        /*$sToken2 = "kaPknlGVcBIowgVPkxSYhqyKJCTyNMJwA95BFyP96C2";
        $headers2 = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken2.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers2); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); */

        // curl_close( $chOne );
        // ------------------------------------ End line notify ------------------------------------

        header("location: ../index.php?feedback=success");
    }

?>