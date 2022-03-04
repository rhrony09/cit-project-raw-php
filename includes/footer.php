 <!-- footer -->
 <footer>
     <div class="copyright-wrap">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-12">
                     <div class="copyright-text text-center">
                         <p><span><?= $setting['name'] ?></span> © <?= date('Y') ?> | All Rights Reserved</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- footer-end -->

 <!-- JS here -->
 <script src="assets/frontend/js/vendor/jquery-1.12.4.min.js"></script>
 <script src="assets/frontend/js/popper.min.js"></script>
 <script src="assets/frontend/js/bootstrap.min.js"></script>
 <script src="assets/frontend/js/isotope.pkgd.min.js"></script>
 <script src="assets/frontend/js/one-page-nav-min.js"></script>
 <script src="assets/frontend/js/slick.min.js"></script>
 <script src="assets/frontend/js/ajax-form.js"></script>
 <script src="assets/frontend/js/wow.min.js"></script>
 <script src="assets/frontend/js/aos.js"></script>
 <script src="assets/frontend/js/jquery.waypoints.min.js"></script>
 <script src="assets/frontend/js/jquery.counterup.min.js"></script>
 <script src="assets/frontend/js/jquery.scrollUp.min.js"></script>
 <script src="assets/frontend/js/imagesloaded.pkgd.min.js"></script>
 <script src="assets/frontend/js/jquery.magnific-popup.min.js"></script>
 <script src="assets/frontend/js/plugins.js"></script>
 <script src="assets/frontend/js/main.js"></script>
 <script src="assets/dashboard/lib/sweetalert/sweetalert.min.js"></script>
 <script>
     <?php if (isset($_SESSION['success'])) : ?>
         const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             didOpen: (toast) => {
                 toast.addEventListener('mouseenter', Swal.stopTimer)
                 toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
         })

         Toast.fire({
             icon: 'success',
             title: "<?= show_session_data('success') ?>"
         })
     <?php endif ?>
     <?php if (isset($_SESSION['error'])) : ?>
         const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 3000,
             timerProgressBar: true,
             didOpen: (toast) => {
                 toast.addEventListener('mouseenter', Swal.stopTimer)
                 toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
         })

         Toast.fire({
             icon: 'error',
             title: "<?= show_session_data('error') ?>"
         })
     <?php endif ?>
 </script>
 </body>

 </html>