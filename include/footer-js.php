<style>
    #pop31Text {
   display: none; /* hidden by default */
}

@media (max-width: 768px) {
   #pop31Text {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      flex-wrap: wrap; /* allow wrapping if needed */
      padding: 10px;
   }

   #pop31Text a {
      flex: 1;
      background-color: #25D366;
      color: white;
      padding: 10px 15px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: bold;
      font-size: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 5px;
      transition: 0.3s ease;
      min-width: 140px; /* so buttons have decent size */
   }

   #pop31Text a.call-btn {
      background-color: #4D33DD;
   }

   #pop31Text a:hover {
      transform: translateY(-2px);
   }
}
</style>
<div id="custom-modal" class="custom-modal apnaCustomModel">
   <div class="custom-modal-dialog">
      <div class="custom-modal-content">
         <span class="close-modal">X</span>
         <div class="custom-modal-body">
            <div class="pop1">
               <a href="tel:+91-8084696222"><img src="images/modal-form-image.webp" alt="Sukrishna Topper"></a>
            </div>
            <div class="pop2">
               <div class="pop3">
                  <h4>Let's Connect With Sukrishna!</h4>
                  <hr class="mt-0">
                  <a href="https://wa.me/918084696222" target="_blank" rel="nofollow" title="Contact on WhatsApp"><i
                        class="fab fa-whatsapp"></i>
                     Let's Talk on WhatsApp</a>
                  <a href="tel:+91-8084696222" title="Call us a +91-8084696222" rel="nofollow"><i
                        class="fas fa-mobile-alt"></i> Call us at
                     +91-8084696222</a>
               </div>

               <div id="pop31Text" class="pop31">
                  <a href="https://wa.me/918084696222" target="_blank" rel="nofollow" title="Contact on WhatsApp"
                     class="whatsapp-btn">
                     <i class="fab fa-whatsapp"></i> WhatsApp Chat
                  </a> <br>
                  <a href="tel:91-8084696222" title="Call us at +91-8084696222" rel="nofollow" class="call-btn">
                     <i class="fas fa-phone"></i>8084696222
                  </a>
               </div>

               <div class="pop4">
                  <h4>Admission&nbsp;Enquiry/&nbsp;Get&nbsp;Callback</h4>
                  <div id="messageContainer" style="display: none; margin-top: 10px; font-size: 16px;"></div>
                  <form id="inquiryForm" class="contactForm" action="enquiry-formSubmit.php" method="POST">
                     <input type="hidden" name="formType" value="Admission/Callback" readonly>
                     <div class="pop5">
                        <!-- Full Name -->
                        <div class="pop6">
                           <label for="popcname">Full Name</label>
                           <input type="text" class="form-control" placeholder="Enter full name" id="popcname"
                              name="name" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="pop6">
                           <label for="popnumber">Phone Number</label>
                           <input type="tel" class="form-control" placeholder="Enter Phone Number" id="popnumber"
                              name="phone" maxlength="10" required>
                        </div>
                        <!-- Course -->
                        <div class="pop6">
                           <label for="popemail">Course</label>
                           <select id="course" name="course" class="form-control" style="padding: 10px;" required>
                              <option value="">Select Course</option>
                              <option value="XIth &amp; XIIth">XIth &amp; XIIth</option>
                              <option value="XIth &amp; XIIth Integrated">XIth &amp; XIIth Integrated</option>
                              <option value="B.COM &amp; BBA">B.COM &amp; BBA</option>
                              <option value="CA">CA</option>
                              <option value="CMA">CMA</option>
                              <option value="CS">CS</option>
                              <option value="Computer">Computer</option>
                              <option value="Other">Other</option>

                           </select>
                        </div>
                        <!-- Location -->
                        <div class="pop6">
                           <label for="poplocation">Your Location</label>
                           <input type="text" class="form-control" placeholder="Enter Your Location" id="poplocation"
                              name="location" required>
                        </div>
                        <!-- Message -->
                        <div class="col-12">
                           <label for="popmessage">Message</label>
                           <textarea placeholder="Enter Your Message" class="form-control col-12" id="popmessage"
                              name="message" required></textarea>
                        </div>
                     </div>
                     <!-- Submit Button -->
                     <div class="pop5">
                        <button class="btn btn-primary" style="padding: 10px;" type="submit"
                           name="submit">Submit</button>
                     </div>
                  </form>

               </div>

            </div>
         </div>
      </div>
   </div>
</div>


<script src="assets/js/vendor/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="assets/js/vendor/jquery-ui.js"></script>
<script src="assets/js/vendor/metismenu.js"></script>
<script src="assets/js/vendor/magnifying-popup.js"></script>
<script src="assets/js/plugins/swiper.js"></script>
<script src="assets/js/plugins/counterup.js"></script>
<script src="assets/js/vendor/waypoint.js"></script>
<script src="assets/js/vendor/waw.js"></script>
<script src="assets/js/plugins/isotop.js"></script>
<script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/plugins/resizer-sensor.js"></script>
<script src="assets/js/plugins/sticky-sidebar.js"></script>
<script src="assets/js/plugins/twinmax.js"></script>
<script src="assets/js/vendor/chroma.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/plugins/contact.form.js"></script>
<script src="assets/js/plugins/calender.js"></script>
<script src="assets/js/main.js"></script>

<!-- this js is form modal form -->
<script>
   $(document).ready(function () {

      // Manually open modal on click
      $(document).on("click", ".modelOpener", function () {
         console.log("Modal opened by click");
         $("body").addClass("modal-open");
         $("#custom-modal").show();
      });

      // Close modal on click
      $(document).on("click", ".apnaCustomModel .close-modal", function () {
         console.log("Modal closed");
         $("body").removeClass("modal-open");
         $("#custom-modal").hide();
      });

   });
</script>




<script>
   $(document).ready(function () {
      $('#inquiryForm').on('submit', function (e) {
         e.preventDefault();

         $.ajax({
            type: 'POST',
            url: 'enquiry-formSubmit.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {

               $('#messageContainer').show();

               if (response.status == 'success') {
                  $('#inquiryForm')[0].reset();
                  $('#messageContainer').html('<div style="color: green;">' + response.message + '</div>');
               } else {
                  $('#messageContainer').html('<div style="color: red;">' + response.message + '</div>');
               }
            },
            error: function () {
               $('#messageContainer').show();
               $('#messageContainer').html('<div style="color: red;">An unexpected error occurred. Please try again.</div>');
            }
         });
      });
   });
</script>

<script>
   $(document).ready(function () {
      $('#contactForm').on('submit', function (e) {
         e.preventDefault();

         $.ajax({
            type: 'POST',
            url: 'contact-submit.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
               $('#messageContainer').show();

               if (response.status == 'success') {
                  $('#contactForm')[0].reset();
                  $('#messageContainer').html('<div style="color: green;">' + response.message + '</div>');
               } else {
                  $('#messageContainer').html('<div style="color: red;">' + response.message + '</div>');
               }
            },
            error: function () {
               $('#messageContainer').show();
               $('#messageContainer').html('<div style="color: red;">An unexpected error occurred. Please try again.</div>');
            }
         });
      });
   });
</script>


<script>
   $(document).ready(function () {
      $('#registrationForm').on('submit', function (e) {
         e.preventDefault();

         $.ajax({
            type: 'POST',
            url: 'online-registartionFormSubmit.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
               $('#messageContainer').show();

               if (response.status == 'success') {
                  $('#registrationForm')[0].reset();
                  $('#messageContainer').html('<div style="color: green;">' + response.message + '</div>');
               } else {
                  $('#messageContainer').html('<div style="color: red;">' + response.message + '</div>');
               }
            },
            error: function (jqXHR, textStatus, errorThrown) {

               $('#messageContainer').show();
               $('#messageContainer').html('<div style="color: red;">An unexpected error occurred. Please try again.</div>');
            }
         });
      });
   });
</script>

</body>

</html>