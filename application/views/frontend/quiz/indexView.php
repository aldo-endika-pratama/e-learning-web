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
                         <h4 class="page-title">Quiz</h4>
                     </div>
                 </div>
             </div>
             <!-- end page title -->

             <div class="row">
                 <div class="col-xl-12">
                     <div class="accordion custom-accordion" id="custom-accordion-one">
                         <div class="card mb-0">
                             <div class="card-header" id="headingNine">
                                 <h5 class="m-0 position-relative">
                                     <a class="custom-accordion-title text-reset d-block collapsed" data-toggle="collapse" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                         <i class="fas fa-fw fa-info-circle"></i> Daftar Quiz Yang Masih Tersedia <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                     </a>
                                 </h5>
                             </div>

                             <div id="collapseNine" class="collapse" aria-labelledby="headingFour" data-parent="#custom-accordion-one">
                                 <div class="card-body">
                                     <?php if ($quizAvai) : ?>

                                         <?php foreach ($quizAvai as $row) : ?>
                                             <div class="row mb-2">
                                                 <div class="col-md-3">
                                                     <span class="mr-3"><i class="fas fa-fw fa-question"></i></span>
                                                     <span style="font-weight: bold; font-size: 16px;"><?= $row['quiz_name'] ?></span>
                                                 </div>
                                                 <div class="col-md-2">
                                                     <span>Durasi : <?= $row['quiz_duration'] ?></span>
                                                 </div>
                                                 <div class="col-md-2">
                                                     <?php if ($row['is_active'] = true) : ?>
                                                         <span>Status : </span>
                                                         <span class="text-success">Tersedia</span>
                                                     <?php else : ?>
                                                         <span>Status : </span>
                                                         <span class="text-danger">Tidak Tersedia</span>
                                                     <?php endif; ?>
                                                 </div>
                                                 <div style="text-align: right;" class="col-md-5">
                                                     <form method="post" action="<?= base_url('front/quiz/mulaiquiz') ?>">
                                                         <input id="idQuiz" name="idQuiz" type="text" hidden value="<?= $row['quiz_id'] ?>">

                                                         <button targe onclick="return confirm('Anda yakin untuk mengerjakan QUIZ ini ?? Proses ini tidak bisa di batalkan !');" type="submit" class="btn btn-sm btn-success waves-effect waves-light">
                                                             <span class="btn-label"><i class="mdi mdi-arrow-right-circle"></i></span>Kerjakan
                                                         </button>

                                                     </form>
                                                 </div>
                                             </div>
                                         <?php endforeach; ?>
                                     <?php else : ?>
                                         <div class="row">
                                             <div style="text-align: center;" class="col-md">
                                                 <h4>
                                                     <span class="badge bg-danger">Maaf Quiz Saat Ini Belum Tersedia</span>
                                                 </h4>
                                             </div>
                                         </div>
                                     <?php endif; ?>
                                 </div>
                             </div>
                         </div>
                         <div class="card mb-0">
                             <div class="card-header" id="headingSeven">
                                 <h5 class="m-0 position-relative">
                                     <a class="custom-accordion-title text-reset collapsed d-block" data-toggle="collapse" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                         <i class="fas fa-fw fa-info-circle"></i> Daftar Quiz Yang Sudah Di Kerjakan <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                     </a>
                                 </h5>
                             </div>
                             <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#custom-accordion-one">
                                 <div class="card-body">

                                     <?php foreach ($quizDone as $row) : ?>
                                         <div class="row mb-2">
                                             <div class="col-md-3">
                                                 <span class="mr-3"><i class="fas fa-fw fa-check-circle"></i></span>
                                                 <span style="font-weight: bold; font-size: 16px;"><?= $row['quiz_name'] ?></span>
                                             </div>
                                             <div class="col-md-2">
                                                 <span>Tanggal Kerja : <?= $row['tgl_kerja'] ?></span>
                                             </div>
                                             <div class="col-md-3">
                                                 <span>Status Quiz : </span>
                                                 <span class="badge badge-success">Dikerjakan</span>
                                                 <span class="ml-2 badge badge-success">Nilai : <?= $row['total_grade'] ?></span>
                                             </div>
                                             <div class="col-md-2">
                                                 <?php if ($row['total_jawab'] < 2) : ?>
                                                     <span class="text-primary">Kesempatan 1x Lagi Untuk Mengulang</span>
                                                 <?php else : ?>
                                                     <span class="text-danger">Kesempatan Mengulang Sudah Habis</span>
                                                 <?php endif; ?>
                                             </div>
                                             <div style="text-align: right;" class="col-md-2">
                                                 <?php if ($row['total_jawab'] < 2) : ?>
                                                     <form method="post" action="<?= base_url('front/quiz/mulaiquiz') ?>">
                                                         <input id="idQuiz" name="idQuiz" type="text" hidden value="<?= $row['id_quiz'] ?>">
                                                         <button type="submit" class="btn btn-sm btn-warning waves-effect waves-light">
                                                             <span class="btn-label"><i class="mdi mdi-arrow-right-circle"></i></span>Ulang
                                                         </button>
                                                     </form>
                                                 <?php endif; ?>
                                             </div>
                                         </div>
                                     <?php endforeach; ?>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- end row-->

         </div> <!-- container -->

     </div> <!-- content -->