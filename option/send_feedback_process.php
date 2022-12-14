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
        $sToken = "";
        $sMessage = "New Feedback!!\n";
        $sMessage .= "\n";
        $sMessage .= "TOPIC: " . $topic . "\n";
        $sMessage .= "ชื่อ-นามสกุล: " . $cus_name . "\n";
        $sMessage .= "วันที่เข้ารับบริการ: " . $date_service . "\n";
        $sMessage .= "แผนกที่เข้ารับบริการ: " . $department_service . "\n";
        $sMessage .= "ความพึงพอใจภาพรวมแผนก: " . $complacent_depart . "\n";
        $sMessage .= "ความพึงพอใจต่อพนักงาน: " . $complacent_staff . "\n";
        $sMessage .= "ความพึงพอใจด้านสถานที่: " . $complacent_operat . "\n";
        $sMessage .= "ข้อเสนอแนะอื่นๆ: " . $other_feedback . "\n";
        $sMessage .= "เบอร์โทรติดต่อ: " . $cus_phone . "\n";


        $chOne = curl_init(); 

        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 

        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 

        //ส่งข้อความที่ 2 (ทำเผื่อเอาไว้)
        $sToken2 = "";
        $headers2 = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken2.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers2); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne );

        curl_close( $chOne );
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
        $sToken = "";
        $sMessage = "New Feedback!!\n";
        $sMessage .= "\n";
        $sMessage .= "TOPIC: " . $topic . "\n";
        $sMessage .= "ชื่อ-นามสกุล: " . $cus_name . "\n";
        $sMessage .= "วันที่เข้ารับบริการ: " . $date_service . "\n";
        $sMessage .= "แผนกที่เข้ารับบริการ: " . $department_service . "\n";
        $sMessage .= "ข้อร้องเรียนการให้บริการ: " . $other_feedback . "\n";
        $sMessage .= "เบอร์โทรติดต่อ: " . $cus_phone . "\n";

        $chOne = curl_init(); 

        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 

        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 

        //ส่งข้อความที่ 2 (ทำเผื่อเอาไว้)
        $sToken2 = "";
        $headers2 = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken2.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers2); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne );

        curl_close( $chOne );
        // ------------------------------------ End line notify ------------------------------------

        header("location: ../index.php?feedback=success");
    }

?>