<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if (isset($_GET['feedback'])) {
    if ($_GET['feedback'] == 'success') {
        echo "<script>";
        echo "Swal.fire(
                    'ส่งแบบประเมินสำเร็จ',
                    'ขอบคุณสำหรับคำแนะนำ',
                    'success'
                )";
        echo "</script>";
    }
    if ($_GET['feedback'] == 'fail') {
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
<style>
    body {
        place-content: center;
    }

    .form-floating>.bi-calendar-date+.datepicker_input+label {
        padding-left: 3.5rem;
        z-index: 3;
    }
</style>
<br>
<img src="img/prh_logo.png" alt="" style="width: 50%;">
<div class="container main_page">
    <div class="container">
        <div class="texthead">แบบประเมินความพึงพอใจในการ <br> ให้บริการโรงพยาบาล</div>
        <div class="textdetail">ทุกคำแนะนำของท่านคือกำลังในการพัฒนางานบริการของเรา</div>
        <div class="textdetail">**โปรดเลือกหัวข้อแบบสอบถามที่ท่านต้องการแสดงความคิดเห็น**</div>
        <br>
        <div class="selector">
            <div class="selecotr-item">
                <input type="radio" id="option-1" name="topic" class="selector-item_radio" onclick="window.location.href='index.php#score'">
                <label for="option-1" class="selector-item_label">ให้คะแนนความพึงพอใจ</label>
            </div>
            <br>
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


                    <div>
                        <h4>ชื่อ-นามสกุล ผู้เข้ารับบริการ</h4>
                        <input type="text" class="form-control" name="cus_name">
                    </div>
                    <div>
                        <h4>เบอร์โทรศัพท์</h4>
                        <input type="text" class="form-control" name="cus_phone">
                    </div>
                    <!--  <div>
                        <h4>วันที่เข้ารับบริการ</h4>
                            <input type="date" name="date_service" value="11-1-2022">📆
                            <input type="date" data-date="" data-date-format="DD MMMM YYYY" value="2015-08-09">
                    </div> -->
                    <div>
                        <h4>วันที่เข้ารับบริการ</h4>
                        <div class="input-group mb-4">
                            <i class="bi bi-calendar-date input-group-text"></i>
                            <input type="text" class="datepicker_input form-control" name="date_service" placeholder="กรุณาระบุวันที่ ที่เข้ารับบริการ" required aria-label="กรุณาระบุวันที่ ที่เข้ารับบริการ">
                        </div>
                    </div>

                    <div>
                        <h4>แผนกที่เข้ารับบริการ</h4>
                        <select class="select_department" name="department_service">
                            <option selected disabled>เลือกแผนก</option>
                            <option value="ภาพรวมของโรงพยาบาล">ภาพรวมของโรงพยาบาล</option>
                            <option value="แผนกเปล">แผนกเปล</option>
                            <option value="เวชระเบียน">เวชระเบียน</option>
                            <option value="แผนกศูนย์ดูแลลูกค้า">แผนกศูนย์ดูแลลูกค้า - Customer care center</option>
                            <option value="แผนกผู้ป่วยนอก">แผนกผู้ป่วยนอก - Outpartient Department</option>
                            <option value="แผนกรับผู้ป่วยใน">แผนกรับผู้ป่วยใน - Admission</option>
                            <option value="แผนกโรคติดเชื้อทางเดินหายใจ ARI">แผนกโรคติดเชื้อทางเดินหายใจ ARI</option>
                            <option value="แผนกการเงินนอก">แผนกการเงิน (ชั้น 1)</option>
                            <option value="แผนกการเงินใน">แผนกการเงินใน (ชั้น 2)</option>
                            <option value="แผนกบริหารลูกหนี้ (พ.ร.บ.)">แผนกบริหารลูกหนี้ (พ.ร.บ.)</option>
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
                <p>**โปรดกรอกแบบสอบถามและแจ้งความคิดเห็นของท่านให้เราทราบ**</p>

                <div>
                    <h4>ชื่อ-นามสกุล ผู้เข้ารับบริการ</h4>
                    <input type="text" name="cus_name" class="form-control">
                </div>
                <div>
                    <h4>เบอร์โทรศัพท์</h4>
                    <input type="text" name="cus_phone" class="form-control">
                </div>
                <!-- <div>
                    <h4>วันที่เข้ารับบริการ</h4>
                    <input type="date" name="date_service" class="form-control">
                </div> -->
                <div>
                    <h4>วันที่เข้ารับบริการ</h4>
                    <div class="input-group mb-4">
                        <i class="bi bi-calendar-date input-group-text"></i>
                        <input type="text" class="datepicker_input form-control" name="date_service" placeholder="กรุณาระบุวันที่ ที่เข้ารับบริการ" required aria-label="กรุณาระบุวันที่ ที่เข้ารับบริการ">
                    </div>
                </div>
                <div>
                    <h4>แผนกที่เข้ารับบริการ</h4>
                    <select class="select_department" name="department_service">
                        <option selected disabled>เลือกแผนก</option>
                        <option value="ภาพรวมของโรงพยาบาล">ภาพรวมของโรงพยาบาล</option>
                        <option value="แผนกเปล">แผนกเปล</option>
                        <option value="เวชระเบียน">เวชระเบียน</option>
                        <option value="แผนกศูนย์ดูแลลูกค้า">แผนกศูนย์ดูแลลูกค้า - Customer care center</option>
                        <option value="แผนกผู้ป่วยนอก">แผนกผู้ป่วยนอก - Outpartient Department</option>
                        <option value="แผนกรับผู้ป่วยใน">แผนกรับผู้ป่วยใน - Admission</option>
                        <option value="แผนกโรคติดเชื้อทางเดินหายใจ ARI">แผนกโรคติดเชื้อทางเดินหายใจ ARI</option>
                        <option value="แผนกการเงินนอก">แผนกการเงิน (ชั้น 1)</option>
                        <option value="แผนกการเงินใน">แผนกการเงินใน (ชั้น 2)</option>
                        <option value="แผนกบริหารลูกหนี้ (พ.ร.บ.)">แผนกบริหารลูกหนี้ (พ.ร.บ.)</option>
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
                    <textarea rows="15" name="other_feedback"></textarea>
                </div>
        </div>

        <div class="btn-block">
            <button type="submit" name="submit-feedback">Send Feedback</button>
        </div>
        </form>
</div>
</section>
</div>
</div><br><br>


<!-- Anime -->
<div class="heart">
    <svg xmlns="http://www.w3.org/2000/svg" id="svg5" version="1.1" viewBox="-5 -5 278 56">
        <filter id="blur">
            <feGaussianBlur stdDeviation="1.6" />
        </filter>
        <g id="layer1" transform="translate(29.1 -127.42)">
            <path id="line" d="M-28.73 167.2c26.43 9.21 68.46-9.46 85.45-12.03 18.45-2.78 32.82 4.86 28.75 9.83-3.82 4.66-25.77-21.18-14.81-31.5 9.54-8.98 17.64 10.64 16.42 17.06-1.51-6.2 2.95-26.6 14.74-22.11 11.7 4.46-4.33 49.03-15.44 44.08-6.97-3.1 15.44-16.26 26.1-16 23.03.56 55.6 27.51 126.63 3.36" pathLength="1" />
        </g>
        <g id="layer2" transform="translate(29.1 -127.42)">
            <path filter="url(#blur)" id="point" d="M-28.73 167.2c26.43 9.21 68.46-9.46 85.45-12.03 18.45-2.78 32.82 4.86 28.75 9.83-3.82 4.66-25.77-21.18-14.81-31.5 9.54-8.98 17.64 10.64 16.42 17.06-1.51-6.2 2.95-26.6 14.74-22.11 11.7 4.46-4.33 49.03-15.44 44.08-6.97-3.1 15.44-16.26 26.1-16 23.03.56 55.6 27.51 126.63 3.36" pathLength="1" />
        </g>
    </svg>
</div>

<div class="textdetail" style="text-align: center;">"ความพึงพอใจของท่านมีค่ากับเราเสมอ"</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>
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

    const getDatePickerTitle = elem => {
    // From the label or the aria-label
    const label = elem.nextElementSibling;
    let titleText = '';
    if (label && label.tagName === 'LABEL') {
        titleText = label.textContent;
    } else {
        titleText = elem.getAttribute('aria-label') || '';
    }
    return titleText;
    }

    const elems = document.querySelectorAll('.datepicker_input');
    for (const elem of elems) {
    const datepicker = new Datepicker(elem, {
        'format': 'dd/mm/yyyy', // UK format
        title: getDatePickerTitle(elem)
    });
    }
</script>