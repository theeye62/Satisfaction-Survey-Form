<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="js/lib/jquery-1.11.1.js"></script>
<?php
    if(isset($_GET['feedback'])){
        if($_GET['feedback']=='success'){
            echo "<script>";
            echo "Swal.fire(
                    'ส่งแบบประเมินสำเร็จ',
                    'ขอบคุณสำหรับคำแนะนำ',
                    'success'
                )";
            echo "</script>";
        }
        if($_GET['feedback']=='fail'){
            echo "<script>";
            echo "Swal.fire({
                    icon: 'error',
                    title: 'มีบางอย่างผิดพลาด',
                    text: 'กรุณากรอกข้อมูลใหม่อีกครั้ง หรือติดต่อโรงพยาบาล',
                })";
            echo "</script>";
        }
    }
?>

<br>
<div class="container main_page">
    <div class="container">
        <div class="selector">
            <div class="selecotr-item">
                <input type="radio" id="option-1" name="topic" class="selector-item_radio" onclick="window.location.href='index.php#score'">
                <label for="option-1" class="selector-item_label">ให้คะแนนความพึงพอใจ</label>
            </div>
            <div class="selecotr-item">
                <input type="radio" id="option-2" name="topic" class="selector-item_radio" onclick="window.location.href='index.php#report'">
                <label for="option-2" class="selector-item_label">ร้องเรียนการให้บริการ</label>
            </div>
        </div>

        <!-- ----------------------------------------- Score ----------------------------------------- -->
        <section id="score" style="display:none;">
            <div class="testbox">
                <form action="option/send_feedback_process.php" method="post">
                    <input type="hidden" name="topic_hidden" id="topic_hidden">
                    <h1>แบบประเมินความพึงพอใจในการให้บริการ โรงพยาบาล...</h1>
                    <p>ความพึงพอใจของท่านมีค่ากับเราเสมอ ทุกคะแนนและคำแนะนำของท่านคือกำลังในการพัฒนางานบริการของเรา</p>
                    <p>**โปรดกรอกแบบสอบถามและแจ้งความคิดเห็นของท่านให้เราทราบ**</p>

                    <div>
                        <h4>ชื่อ-นามสกุล ผู้เข้ารับบริการ</h4>
                            <input type="text" class="form-control" name="cus_name">
                    </div>
                    <div>
                        <h4>เบอร์โทรศัพท์</h4>
                            <input type="text" class="form-control" name="cus_phone">
                    </div>
                    <div>
                        <h4>วันที่เข้ารับบริการ</h4>
                            <input type="date" class="form-control" name="date_service">
                    </div>
                    <div>
                        <h4>แผนกที่เข้ารับบริการ</h4>
                            <select class="select_department" name="department_service">
                            <option selected disabled>เลือกแผนก</option>
                                <option value="ภาพรวมของโรงพยาบาล">ภาพรวมของโรงพยาบาล</option>
                                <option disabled="disabled">───</option>
                                <option value="แผนกเปล">แผนกเปล</option>
                                <option value="เวชระเบียน">เวชระเบียน</option>
                                <option value="แผนกศูนย์ดูแลลูกค้า">แผนกศูนย์ดูแลลูกค้า - Customer care center</option>
                                <option value="แผนกผู้ป่วยนอก">แผนกผู้ป่วยนอก - Outpartient Department</option>
                                <option value="แผนกรับผู้ป่วยใน">แผนกรับผู้ป่วยใน - Admission</option>
                                <option value="แผนกการเงินนอก">แผนกการเงิน (ชั้น 1)</option>
                                <option value="แผนกการเงินใน">แผนกการเงินใน (ชั้น 2)</option>
                                <option value="แผนกเภสัชกรรม">แผนกเภสัชกรรม (ห้องจ่ายยา) - Phamarceutical</option>
                                <option value="แผนกผู้ป่วยฉุกเฉิน และอุบัติเหตุ">แผนกผู้ป่วยฉุกเฉิน และอุบัติเหตุ - Emergency Room (ชั้น 1)</option>
                                <option value="แผนกชันสูตรวิเคราะห์">แผนกชันสูตรวิเคราะห์ (laboratory)</option>
                                <option value="แผนกรังสีวินิจฉัย(เอกซเรย์)">แผนกรังสีวินิจฉัย(เอกซเรย์) - Radiology</option>
                                <option value="แผนกเวชศาสตร์ฟื้นฟู (กายภาพบำบัด)">แผนกเวชศาสตร์ฟื้นฟู (กายภาพบำบัด) - Physical Therapy</option>
                                <option value="แผนกผู้ป่วยในชั้น 4">แผนกผู้ป่วยในชั้น 4 - Inpatient</option>
                                <option value="แผนกผู้ป่วยในชั้น 5">แผนกผู้ป่วยในชั้น 5 - Inpatient</option>
                                <option value="แผนกผู้ป่วยในชั้น 6">แผนกผู้ป่วยในชั้น 6 - Inpatient</option>
                                <option value="แผนกผู้ป่วยหนัก (ICU)">แผนกผู้ป่วยหนัก (ICU) - Intensive Care Unit</option>
                                <option value="แผนกห้องผ่าตัด">แผนกห้องผ่าตัด</option>
                                <option value="แผนกไตเทียม">แผนกไตเทียม</option>
                                <option value="แผนกทันตกรรม">แผนกทันตกรรม</option>
                                <option value="แผนกโภชนาศาสตร์">แผนกโภชนาศาสตร์ (โรงอาหาร) ชั้น 2</option>
                                <option value="พชราศรมสปา">พชราศรมสปา</option>
                                <option value="ร้านกาแฟ - Honeybee">ร้านกาแฟ - Honeybee Coffee</option>
                            </select>
                    </div>

                    <h4>ท่านพึงพอใจ(ภาพรวม)แผนกที่เข้ารับบริการมากน้อยเพียงใด?</h4>
                    <div class="question-answer">
                        <label><input type="radio" value="1" name="complacent_depart" />1</label>
                        <label><input type="radio" value="2" name="complacent_depart" />2</label>
                        <label><input type="radio" value="3" name="complacent_depart" />3</label>
                        <label><input type="radio" value="4" name="complacent_depart" />4</label>
                        <label><input type="radio" value="5" name="complacent_depart" />5</label>
                    </div>
                    <h4>ท่านพึงพอใจกับการให้บริการของพนักงานในแผนกนี้มากน้อยเพียงใด?</h4>
                    <div class="question-answer">
                        <label><input type="radio" value="1" name="complacent_staff" />1</label>
                        <label><input type="radio" value="2" name="complacent_staff" />2</label>
                        <label><input type="radio" value="3" name="complacent_staff" />3</label>
                        <label><input type="radio" value="4" name="complacent_staff" />4</label>
                        <label><input type="radio" value="5" name="complacent_staff" />5</label>
                    </div>
                    <h4>ท่านพึงพอใจกับการให้บริการด้านสถานที่ อุปกรณ์การแพทย์ รวมทั้งสิ่งอำนวยความสะดวกอื่นๆในแผนกนี้มากน้อยเพียงใด?</h4>
                    <div class="question-answer">
                        <label><input type="radio" value="1" name="complacent_operat" />1</label>
                        <label><input type="radio" value="2" name="complacent_operat" />2</label>
                        <label><input type="radio" value="3" name="complacent_operat" />3</label>
                        <label><input type="radio" value="4" name="complacent_operat" />4</label>
                        <label><input type="radio" value="5" name="complacent_operat" />5</label>
                    </div>
                    <div>
                        <h4>ข้อเสนอแนะอื่นๆ</h4>
                            <textarea rows="15" name="other_feedback"></textarea>
                    </div>
            </div>

                <div class="btn-block">
                    <button type="submit" name="submit-report">Send Feedback</button>
                </div>
                </form>
    </div>
        </section>

    <!-- ----------------------------------------- Report ----------------------------------------- -->
        <section id="report" style="display:none;">
            <div class="testbox">
                <form action="option/send_feedback_process.php" method="post">
                    <input type="hidden" name="topic_hidden2" id="topic_hidden2">
                    <h1>แบบร้องเรียนการให้บริการ โรงพยาบาล...</h1>
                    <p>**โปรดกรอกแบบสอบถามและแจ้งความคิดเห็นของท่านให้เราทราบ**</p>

                    <div>
                        <h4>ชื่อ-นามสกุล ผู้เข้ารับบริการ</h4>
                            <input type="text" name="cus_name" class="form-control">
                    </div>
                    <div>
                        <h4>เบอร์โทรศัพท์</h4>
                            <input type="text" name="cus_phone" class="form-control">
                    </div>
                    <div>
                        <h4>วันที่เข้ารับบริการ</h4>
                            <input type="date" name="date_service" class="form-control">
                    </div>
                    <div>
                        <h4>แผนกที่เข้ารับบริการ</h4>
                            <select class="select_department" name="department_service">
                                <option selected disabled>เลือกแผนก</option>
                                <option value="ภาพรวมของโรงพยาบาล">ภาพรวมของโรงพยาบาล</option>
                                <option disabled="disabled">───</option>
                                <option value="แผนกเปล">แผนกเปล</option>
                                <option value="เวชระเบียน">เวชระเบียน</option>
                                <option value="แผนกศูนย์ดูแลลูกค้า">แผนกศูนย์ดูแลลูกค้า - Customer care center</option>
                                <option value="แผนกผู้ป่วยนอก">แผนกผู้ป่วยนอก - Outpartient Department</option>
                                <option value="แผนกรับผู้ป่วยใน">แผนกรับผู้ป่วยใน - Admission</option>
                                <option value="แผนกการเงินนอก">แผนกการเงิน (ชั้น 1)</option>
                                <option value="แผนกการเงินใน">แผนกการเงินใน (ชั้น 2)</option>
                                <option value="แผนกเภสัชกรรม">แผนกเภสัชกรรม (ห้องจ่ายยา) - Phamarceutical</option>
                                <option value="แผนกผู้ป่วยฉุกเฉิน และอุบัติเหตุ">แผนกผู้ป่วยฉุกเฉิน และอุบัติเหตุ - Emergency Room (ชั้น 1)</option>
                                <option value="แผนกชันสูตรวิเคราะห์">แผนกชันสูตรวิเคราะห์ (laboratory)</option>
                                <option value="แผนกรังสีวินิจฉัย(เอกซเรย์)">แผนกรังสีวินิจฉัย(เอกซเรย์) - Radiology</option>
                                <option value="แผนกเวชศาสตร์ฟื้นฟู (กายภาพบำบัด)">แผนกเวชศาสตร์ฟื้นฟู (กายภาพบำบัด) - Physical Therapy</option>
                                <option value="แผนกผู้ป่วยในชั้น 4">แผนกผู้ป่วยในชั้น 4 - Inpatient</option>
                                <option value="แผนกผู้ป่วยในชั้น 5">แผนกผู้ป่วยในชั้น 5 - Inpatient</option>
                                <option value="แผนกผู้ป่วยในชั้น 6">แผนกผู้ป่วยในชั้น 6 - Inpatient</option>
                                <option value="แผนกผู้ป่วยหนัก (ICU)">แผนกผู้ป่วยหนัก (ICU) - Intensive Care Unit</option>
                                <option value="แผนกห้องผ่าตัด">แผนกห้องผ่าตัด</option>
                                <option value="แผนกไตเทียม">แผนกไตเทียม</option>
                                <option value="แผนกทันตกรรม">แผนกทันตกรรม</option>
                                <option value="แผนกโภชนาศาสตร์">แผนกโภชนาศาสตร์ (โรงอาหาร) ชั้น 2</option>
                                <option value="พชราศรมสปา">พชราศรมสปา</option>
                                <option value="ร้านกาแฟ - Honeybee">ร้านกาแฟ - Honeybee Coffee</option>
                            </select>
                    </div>

                    <div>
                        <h4>กรุณาระบุความคิดเห็นหรือข้อร้องเรียนของท่าน</h4>
                            <textarea rows="15"></textarea>
                    </div>
            </div>

                <div class="btn-block">
                    <button type="submit" name="submit-feedback">Send Feedback</button>
                </div>
                </form>
            </div>
        </section>
    </div>
</div>

<script type="text/javascript">

    $('#option-1').on('click', function() {
		$('#score').show('slow');
		$('#report').hide('slow');
        $('#topic_hidden').val("ให้คะแนน");
        $('#topic_hidden2').val("ให้คะแนน");
	});
	$('#option-2').on('click', function() {
		$('#report').show('slow');
		$('#score').hide('slow');
        $('#topic_hidden').val("ร้องเรียน");
        $('#topic_hidden2').val("ร้องเรียน");
	});


</script>