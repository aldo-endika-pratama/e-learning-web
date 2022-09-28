 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page">
     <div class="content">

         <!-- Start Content-->
         <div class="container-fluid">

             <!-- start page title -->
             <div class="row">
                 <div class="col-12">
                     <div class="page-title-box">
                         <h4 class="page-title">Mulai Quiz</h4>
                     </div>
                 </div>
             </div>
             <!-- end page title -->

             <div class="row">
                 <div class="col-xl-12">

                     <!-- Card Waktu -->
                     <div class="row">
                         <div class="col-md">
                             <div class="card bg-secondary text-white">
                                 <div class="card-body">
                                     <h5 class="card-title text-white">Waktu Tersisa : <span id="timer"></span></h5>
                                 </div>
                             </div> <!-- end card-->
                         </div> <!-- end col -->
                     </div>

                     <form class="quizForm" id="msform" name="question-form" method="post" action="<?= base_url('front/quiz/submitquiz'); ?>">

                         <?php if (count($question) > 0) :
                                $counter = 1;
                                foreach ($question as $quest) : ?>

                                 <!-- Card Untuk Soal -->
                                 <div id="widget_<?= $counter ?>" class="fieldset step">
                                     <div class="row">
                                         <div class="col-lg">
                                             <div class="card border-primary border mb-3">
                                                 <div style="font-size: 17px; font-weight:bold; text-align:left" class="card-header">Question <?php echo $counter; ?> of <?php echo count($question); ?></div>
                                                 <div class="card-body">
                                                     <h3 class="card-title text-primary mb-3"><?php echo $quest['question']; ?></h3>

                                                     <div class="quiz-row">

                                                         <div class="q-tab">
                                                             <div class="radio radio-success ml-3 mb-2">
                                                                 <input class="ans-opt" type="radio" name="question_<?php echo $quest['id']; ?>" id="option1-<?php echo $quest['id']; ?>" value="option_1">
                                                                 <label for="option1-<?php echo $quest['id']; ?>">
                                                                     <?php echo $quest['option1']; ?>
                                                                 </label>
                                                             </div>
                                                         </div>

                                                         <div class="q-tab">
                                                             <div class="radio radio-success ml-3 mb-2">
                                                                 <input class="ans-opt" type="radio" name="question_<?php echo $quest['id']; ?>" id="option2-<?php echo $quest['id']; ?>" value="option_2">
                                                                 <label for="option2-<?php echo $quest['id']; ?>">
                                                                     <?php echo $quest['option2']; ?>
                                                                 </label>
                                                             </div>
                                                         </div>

                                                         <div class="q-tab">
                                                             <div class="radio radio-success ml-3 mb-2">
                                                                 <input class="ans-opt" type="radio" name="question_<?php echo $quest['id']; ?>" id="option3-<?php echo $quest['id']; ?>" value="option_3">
                                                                 <label for="option3-<?php echo $quest['id']; ?>">
                                                                     <?php echo $quest['option3']; ?>
                                                                 </label>
                                                             </div>
                                                         </div>

                                                         <div class="q-tab">
                                                             <div class="radio radio-success ml-3 mb-2">
                                                                 <input class="ans-opt" type="radio" name="question_<?php echo $quest['id']; ?>" id="option4-<?php echo $quest['id']; ?>" value="option_4">
                                                                 <label for="option4-<?php echo $quest['id']; ?>">
                                                                     <?php echo $quest['option4']; ?>
                                                                 </label>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>


                                     <?php if (count($question) == 1) : ?>
                                         <button type="button" name="submit" id="sbmtbtn" onclick="return loadingData();" class="btn btn-primary text-white">
                                             <span class="btn-label"><i class="mdi mdi-check-circle"></i></span>Submit
                                         </button>
                                     <?php elseif ($counter == count($question)) : ?>
                                         <a onclick="return prevPage()" type="button" name="prev" id="prev" class="btn btn-danger text-white">
                                             <span class="btn-label"><i class="mdi mdi-arrow-left-circle"></i></span>Kembali
                                         </a>
                                         <button type="button" name="submit" id="sbmtbtn" onclick="return submitLoading();" class="btn btn-primary text-white">
                                             <span class="btn-label"><i class="mdi mdi-check-circle"></i></span>Submit
                                         </button>
                                     <?php else :  ?>
                                         <?php if ($counter > 1) : ?>
                                             <a onclick="return prevPage()" rel="0" type="button" name="prev" id="prev" class="btn btn-danger text-white">
                                                 <span class="btn-label"><i class="mdi mdi-arrow-left-circle"></i></span>Prev
                                             </a>
                                         <?php endif; ?>
                                         <a onclick="return nextPage()" rel="1" type="button" name="next" id="next" class="btn btn-success text-white">
                                             <span class="btn-label"><i class="mdi mdi-arrow-right-circle"></i></span>Next
                                         </a>
                                     <?php endif; ?>
                                 </div>

                         <?php $counter++;
                                endforeach;
                            endif; ?>

                         <input type="hidden" name="quizid" value="<?php echo $question[0]['quiz_id']; ?>">

                         <button hidden id="submitQuiz" type="submit">Submit</button>

                     </form>

                 </div>
             </div>
         </div>
     </div>

     <?php
        $count_down = $time[0]['quiz_duration'];
        $duration = trim($count_down, 'min');
        ?>

     <script type="text/javascript">
         //  Tampilkan Waktu Berjalan
         document.getElementById('timer').innerHTML = <?php echo $duration; ?> + ":" + 59;
         startTimer();

         //var timerId = setInterval(startTimer, 1000);
         function startTimer() {

             var presentTime = document.getElementById('timer').innerHTML;
             var timeArray = presentTime.split(/[:]+/);
             var m = timeArray[0];

             var second = checkSecond((timeArray[1] - 1));

             if (second == 59) {
                 m = m - 1
             }
             document.getElementById('timer').innerHTML = m + ":" + second;

             if (second == 00 && m == 00) {
                 //clearInterval(timerId);
                 //alert("Click Next");
                 $("#sbmtbtn").click();
                 //timerId = setInterval(startTimer, 1000);
             }
             setTimeout(startTimer, 1000);
         }

         function checkSecond(sec) {
             if (sec < 10 && sec >= 0) {
                 sec = "0" + sec
             }; // add zero in front of numbers < 10
             if (sec < 0) {
                 sec = "59"
             };

             return sec;
         }

         //  Button Ke Selanjutnya
         function nextPage() {

             var berikutnya = $("#next").attr('rel');
             berikutnya = parseInt(berikutnya) + 1;

             console.log(berikutnya)

             $('.step').hide()

             $("#next").attr('rel', berikutnya);
             $("#widget_" + berikutnya).show();

         }

         //  Button Previus
         function prevPage() {

             var kembali = $("#next").attr('rel');
             kembali = parseInt(kembali) - 1;

             console.log(kembali)

             $('.step').hide()

             $("#next").attr('rel', kembali);
             $("#widget_" + kembali).show();

         }

         //  Button Submit Jawaban
         function submitAnswer() {
             let attempt = 0;
             $(".ans-opt").each(function() {
                 if ($(this).prop("checked")) {
                     attempt++;
                 }
             });

             if (confirm('Total Jawaban Anda : ' + attempt + '/' + <?= count($question); ?> + '\n Anda Yakin Untuk SUBMIT Jawaban ??'))
                 return true;
             else
                 return false;
         }

         function loadingData() {
             $(document).ready(function() {
                 $.toast({
                     heading: 'LOADING !',
                     text: '<h5>Menyimpan Jawaban . .</h5>',
                     position: 'top-center',
                     icon: 'warning',
                     loaderBg: '#509532',
                     bgColor: '#F8B90D',
                     hideAfter: 1500,
                     stack: false,
                     showHideTransition: 'slide',
                     textAlign: 'center',
                     afterHidden: function() {
                         $("#submitQuiz").click();
                     }
                 })
             })
         }

         //  Loading Submit Button
         function submitLoading() {
             var submit = submitAnswer();
             console.log(submit);
             if (submit == true) {
                 loadingData();
             } else {
                 return false;
             }
         }
     </script>