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
                 <div class="col-md">
                     <!-- Portlet card -->
                     <div class="card">
                         <div class="card-header bg-danger py-3 text-white">
                             <div class="card-widgets">
                                 <a data-bs-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                             </div>
                             <h5 class="card-title mb-0 text-white">Hasil Quiz</h5>
                         </div>
                         <div id="cardCollpase4" class="collapse show">
                             <div class="card-body">
                                 <div class="row">
                                     <div style="text-align: right;" class="col-md">
                                         <a type="button" class="btn btn-sm btn-danger" href="<?= base_url('front/dashboard') ?>"><i class="fa fa-home"></i> Beranda</a>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div style="text-align: center;" class="col-md">
                                         <img style="width: 150px; height:150px" class="img-fluid" src="<?= base_url('assets/images/done.png') ?>" alt="">
                                         <h3>Selamat anda telah menyelesaikan quiz ini <i class="fa fa-info-circle"></i> </h3><br>
                                         <span class="text-muted">Jumlah Pertanyaan yang dijawab : <strong><?= $jumlahJawab; ?></strong> </span><br>
                                         <span>Jumlah Jawaban yang benar : <?= $jumlahBenar; ?></span>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div style="text-align: center;" class="col-md">
                                         <h3><span class="badge badge-primary">Nilai : <?= $nilaiQuiz; ?></span></h4>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div> <!-- end card-->
                 </div><!-- end col -->
             </div>
             <!-- end row -->
         </div> <!-- container -->
     </div> <!-- content -->