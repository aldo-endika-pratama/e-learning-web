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
                         <h4 class="page-title">Dashboard E-Learning</h4>
                     </div>
                 </div>
             </div>
             <!-- end page title -->

             <div class="row">
                 <div class="col-md-6 col-xl-3">
                     <div class="widget-rounded-circle card-box">
                         <div class="row">
                             <div class="col-6">
                                 <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                     <i class="fe-calendar font-22 avatar-title text-primary"></i>
                                 </div>
                             </div>
                             <div class="col-6">
                                 <div class="text-right">
                                     <h3 class="mt-1"><span data-plugin="counterup"><?= $this->db->get('materi_kategori')->num_rows(); ?></span></h3>
                                     <p class="text-muted mb-1 text-truncate">Kategori Materi</p>
                                 </div>
                             </div>
                         </div> <!-- end row-->
                     </div> <!-- end widget-rounded-circle-->
                 </div> <!-- end col-->

                 <div class="col-md-6 col-xl-3">
                     <div class="widget-rounded-circle card-box">
                         <div class="row">
                             <div class="col-6">
                                 <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                     <i class="fe-clipboard font-22 avatar-title text-success"></i>
                                 </div>
                             </div>
                             <div class="col-6">
                                 <div class="text-right">
                                     <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $this->db->get('materi')->num_rows(); ?></span></h3>
                                     <p class="text-muted mb-1 text-truncate">Materi</p>
                                 </div>
                             </div>
                         </div> <!-- end row-->
                     </div> <!-- end widget-rounded-circle-->
                 </div> <!-- end col-->

                 <div class="col-md-6 col-xl-3">
                     <div class="widget-rounded-circle card-box">
                         <div class="row">
                             <div class="col-6">
                                 <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                     <i class="fe-layers font-22 avatar-title text-info"></i>
                                 </div>
                             </div>
                             <div class="col-6">
                                 <div class="text-right">
                                     <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $this->db->get('quiz_details')->num_rows(); ?></span></h3>
                                     <p class="text-muted mb-1 text-truncate">Quiz</p>
                                 </div>
                             </div>
                         </div> <!-- end row-->
                     </div> <!-- end widget-rounded-circle-->
                 </div> <!-- end col-->

                 <div class="col-md-6 col-xl-3">
                     <div class="widget-rounded-circle card-box">
                         <div class="row">
                             <div class="col-6">
                                 <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                     <i class="fe-book-open font-22 avatar-title text-warning"></i>
                                 </div>
                             </div>
                             <div class="col-6">
                                 <div class="text-right">
                                     <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $this->db->get('quiz_questions')->num_rows(); ?></span></h3>
                                     <p class="text-muted mb-1 text-truncate">Soal/Pertanyaan</p>
                                 </div>
                             </div>
                         </div> <!-- end row-->
                     </div> <!-- end widget-rounded-circle-->
                 </div> <!-- end col-->
             </div>
             <!-- end row-->

         </div> <!-- container -->

     </div> <!-- content -->