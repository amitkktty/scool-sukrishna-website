<div class="fixedd" style="bottom:360px; right:-70px">
   <a href="tel:+91-8084696222">Talk to Our Experts</a>
</div>
<div class="fixed" style="bottom:170px; right:-69px">
   <a href="javascript:void(0)" class="modelOpener">Admission Enquiry</a>
</div>

<a href="javascript:void(0)" class="desktop-sticky-btn openFeeStructureModal" data-pdf="pdfs/fee-structure.pdf">Download Fee Structure</a>

<style>
.desktop-sticky-btn {
  position: fixed;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  background-color: #7731bb;
  color: white;
  padding: 14px 28px;
  font-size: 18px;
  font-weight: bold;
  text-decoration: none;
  border-radius: 50px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.2);
  transition: all 0.3s ease;
  z-index: 1000;
}

.desktop-sticky-btn:hover {
  background-color: #4D33DD;
  color: white;
  transform: translateX(-50%) scale(1.05); /* Maintain centering on hover */
}

/* Hide on screens smaller than 768px */
@media (max-width: 767px) {
  .desktop-sticky-btn {
    display: none;
  }
}
</style>




<style type="text/css">
   .fixedd {
      position: fixed;
      bottom: 200px;
      /* right: -55px; */
      z-index: 9999;
      transform: rotate(270deg);
   }

   .fixedd a {
      background: linear-gradient(45deg, #E91E63, #6934c6);
      color: white;
      padding: 5px 23px;
      z-index: 999;
   }

   .fixed {
      position: fixed;
      bottom: 200px;
      /* right: -70px; */
      z-index: 9999;
      transform: rotate(270deg);
   }

   .fixed a {
      background: linear-gradient(45deg, #E91E63, #6934c6);
      color: white;
      padding: 5px 23px;
      z-index: 999;
   }

   .bighss {
      width: 162px;
      margin-bottom: 10px;
   }

   .fldx {}
</style>

<style>
   .footer-mobile-menu {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background: #fff;
      z-index: 999;
      display: none;
      padding: 8px 10px;
      box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.1);
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
   }

   .footer-mobile-menu .btn-wrapper {
      display: flex;
      gap: 10px;
   }

   .footer-mobile-menu a {
      flex: 1;
      /*background: #4d33dd;*/
      /*border: 1px solid #ccc;*/
      border-radius: 8px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
   }
   

   .footer-mobile-menu a img,
   .footer-mobile-menu a i {
      margin-right: 6px;
      width: 20px;
      height: 20px;
   }

   .call-btns {
      background-color: #ffe9e0;
      color: #ff641a;
      border: 1px solid #ff641a;
   }

   .whatsapp-btn {
      background-color: #25D366;
      color: #fff;
      border: 1px solid #25D366;
   }

   .footer-mobile-menu a:hover {
      transform: translateY(-2px);
      box-shadow: 0px 2px 8px rgba(0,0,0,0.2);
   }

   @media (max-width: 768px) {
      .footer-mobile-menu {
         display: block;
      }
   }
</style>

<div class="footer-mobile-menu">
    <div class="btn-wrapper" style="display: flex; justify-content: space-between; align-items: center; gap: 8px;">
        <a href="javascript:void(0)" class="call-btns openFeeStructureModal" data-pdf="pdfs/fee-structure.pdf" style="flex: 1; display: flex; align-items: center; gap: 6px; font-size: 14px;">
            <img src="images/download-btn.png" alt="Download Icon" style="width: 20px;">
            Download Fee Structure
        </a>

        <a href="https://wa.me/91808469622" class="whatsapp-btn" target="_blank" style="flex-shrink: 0; font-size: 16px; padding: 6px 10px;">
            <i class="fa-brands fa-whatsapp"></i>
            WhatsApp
        </a>
    </div>
</div>


   <!-- Modal Form For Question Bank -->
<div class="modal fade FeeStructureModal" id="FeeStructureModal" tabindex="-1" aria-labelledby="FeeStructureLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-4">
      <div class="modal-header bg-danger rounded-top-4">
        <h4 class="modal-title text-white text-center" style="text-align: center;" id="FeeStructureLabel">
          🧾 Get Fee Structure Now!
        </h4>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-4 pt-4 pb-0">
        <form class="pdfForm">
          <input type="hidden" name="form_name" value="Fee Structure Download">
          <div class="mb-3">
            <label for="nameInput" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control form-control-lg border" id="nameInput" placeholder="Enter your full name" required>
          </div>
          <div class="mb-3">
            <label for="phoneInput" class="form-label">Phone Number</label>
            <input type="tel" name="phone" class="form-control form-control-lg border" id="phoneInput" placeholder="Enter your phone number" maxlength="10" required>
          </div>
          <div class="mb-4">
              <label for="branchSelect" class="form-label">Choose Branch</label>
              <select name="branch" class="form-control form-control-lg border" id="branchSelect">
                <option value="">-- Select Branch --</option>
                <option value="Boring Road">Boring Road</option>
                <option value="Kankarbagh">Kankarbagh</option>
                <option value="Gola Road">Gola Road</option>
              </select>
            </div>
          
          <div class="modal-footer border-0 px-0 pb-0">
            <button type="submit" class="btn btn-primary px-4">Download Now</button>
          </div>
        </form>
        <div class="thank-you text-center d-none">
          <h5 class="text-success mt-3">🎉 Thank you!</h5>
          <p>Your download will begin shortly.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   <!--Js for download fee structure-->
   <script>
  $(document).ready(function () {
    let selectedPDF = '';

    // Capture PDF path
    $(document).on("click", ".openFeeStructureModal", function () {
      selectedPDF = $(this).data("pdf") || '';
      console.log("Opening modal for PDF:", selectedPDF);
      $(".FeeStructureModal").modal("show");
    });

    // Handle form submission
    $(".FeeStructureModal .pdfForm").submit(function (e) {
      e.preventDefault();

      const form = $(this);
      const formData = form.serialize();
      const modal = form.closest('.FeeStructureModal');
      const thankYou = modal.find(".thank-you");

      $.ajax({
        url: "fee-structure-formSubmit.php",
        method: "POST",
        dataType: "json",
        data: formData,
        success: function (response) {
          if (response.status === "success") {
            form.addClass("d-none");
            thankYou.removeClass("d-none");

            setTimeout(() => {
              modal.modal('hide');

              if (selectedPDF) {
                const a = document.createElement('a');
                a.href = selectedPDF;
                a.setAttribute('download', '');
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
              }

              form[0].reset();
              form.removeClass("d-none");
              thankYou.addClass("d-none");
              selectedPDF = '';
            }, 2000);
          } else {
            alert(response.message || "An error occurred. Please try again.");
          }
        },
        error: function () {
          alert("An error occurred while submitting the form.");
        }
      });
    });
  });
</script>



<style>
   @media (max-width: 767px) {
      .branchesLocation {
         display: none;
      }
   }
</style>
<div class="join-our-team-area pt-4 pb-4 v-1 rts-section-gap shape-move">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-4 branchesLocation">
            <div class="thumbnail-jointeam-one pl--70">
               <img src="images/Girl std..png" alt="join">
               <div class="shape-area-one shape-image">
                  <img src="assets/images/instructor/shape/01.png" alt="shape" data-speed="0.04" class=" shape one">
                  <img src="assets/images/instructor/shape/02.png" alt="shape" data-speed="0.04" data-revert="true"
                     class=" shape two">
                  <img src="assets/images/instructor/shape/03.png" alt="shape" data-speed="0.04" class=" shape three">
                  <img src="assets/images/instructor/shape/04.png" alt="shape" data-speed="0.04" data-revert="true"
                     class=" shape four">
               </div>
            </div>
         </div>
         <div class="col-lg-8">
            <div class="row g-5">
               <div class="col-md-12">
                  <div class="section-title-w-style-center ">
                     <h2 class="title">Our Branches</h2>
                     <p>📍 Find the nearest Sukrishna Commerce Academy branch and start your journey toward excellence
                        today! 🚀📚</p>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="single-blog-style-one shadow">
                     <a href="#!" class="thumbnail">
                        <img src="images/boring-road.jpg" alt="blog">
                     </a>
                     <a href="#!">
                        <h5 class="title">Head office Boring Road :</h5>
                     </a>
                     <p>📍3rd Floor, Surya Crystal, Boring Rd, opp. karlo Automobiles, Patna,
                        Bihar 800001 <br> ☎ <a href="tel:8084696222"><strong>8084696222</strong></a></p>
                     <div class="button-area">
                        <a href="https://maps.app.goo.gl/HfjQD3NApxStkyNF8" target="_blank"
                           class="rts-btn btn-primary readmore-btn">View On Map <i
                              class="fa-regular fa-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="single-blog-style-one shadow">
                     <a href="#!" class="thumbnail">
                        <img src="images/kankarbagh.jpg" alt="blog">
                     </a>
                     <a href="#!">
                        <h5 class="title"> Kankarbagh Branch :</h5>
                     </a>
                     <p>📍2nd Floor, Suryalaxmi Complex, Above Bandhan Bank, Doctor's Colony, Kankarbagh, Patna <br> ☎
                        <a href="tel:9102025565"><strong>9102025565</strong></a>
                     </p>
                     <div class="button-area">
                        <a href="https://maps.app.goo.gl/eCto7WsjM985EfaW6" target="_blank"
                           class="rts-btn btn-primary readmore-btn">View On Map <i
                              class="fa-regular fa-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="single-blog-style-one shadow">
                     <a href="#!" class="thumbnail">
                        <img src="images/gola-road.jpg" alt="blog">
                     </a>
                     <a href="#!">
                        <h5 class="title">Gola Road Branch:</h5>
                     </a>
                     <p>📍1st Floor, Uday Enclave, Sonu Market, Gola Rd, Patna, Bihar 801503 <br> ☎ <a
                           href="tel:8084696111"><strong>8084696111</strong></a></p>
                     <div class="button-area">
                        <a href="https://maps.app.goo.gl/tpR2F5Q2jUr2B79FA" target="_blank"
                           class="rts-btn btn-primary readmore-btn">View On Map <i
                              class="fa-regular fa-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
      </div>
   </div>
   <div class="shape-area shape-image">
      <img src="assets/images/instructor/shape/05.png" data-speed="0.04" alt="shape" class="shape">
   </div>
</div>


<div class="footer-callto-action-area bg-dark-footer-1">
   <!--  <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="call-to-sction bg_image shape-move">
               <div class="title-area-left-style">
                  <div class="pre-title">
                     <img src="assets/images/banner/bulb-2.png" alt="icon">
                     <span>Downloads App</span>
                  </div>
                  <h2 class="title mb--25">Get Certified and Strengthen Your Skills <br> at Sukrishna Commerce Academy
                  </h2>
                  <div class="finding-source">
                     <a target="_blank" href="https://apps.apple.com/us/app/sukrishna-digital-minds/id6557054407">
                        <img src="assets/images/cta/01.svg" alt="cta-one">
                     </a>
                     <a target="_blank"
                        href="https://play.google.com/store/apps/details?id=com.app.sukrishnadigitalminds.sukrishnadigitalmindsapp&amp;hl=en_IN">
                        <img src="assets/images/cta/02.svg" alt="cta-one">
                     </a>
                  </div>
               </div>
               <div class="image-right">
                  <img src="images/03s.png" alt="cta-main">
               </div>
               <div class="banner-shape-area-two shape-image">
                  <img src="assets/images/cta/03.svg" data-speed="0.04" alt="one" class="shape one">
                  <img src="assets/images/cta/05.svg" data-speed="0.04" data-revert="true" alt="two" class=" shape two">
               </div>
            </div>
         </div>
      </div>
   </div> -->
   <div class="container">
      <div class="row  ptb--100">
         <div class="col-lg-12">
            <div class="footer-one-main-wrapper">
               <div class="footer-singl-wized left-logo">
                  <div class="head">
                     <a href="#">
                        <img src="images/offlicial__logos.png" alt="logo" loading="lazy">
                     </a>
                  </div>
                  <div class="body">

                     <ul class="wrapper-list">
                        <li><i class="fa-regular fa-location-dot"></i>3rd Floor, Surya Crystal, Near Boring Road Patna
                           Bihar-800001 </li>
                        <li><i class="fa-regular fa-phone"></i><a href="tel:+9708324873">+91-9708324873</a></li>
                        <li><i class="fa-regular fa-envelope"></i><a href="tel:+8084696222">+91-8084696222</a></li>
                     </ul>
                     <div class="social-copyright text-white">
                       Follow Us:
                       <a href="https://www.facebook.com/sukrishnacommerce" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                       <a href="https://www.instagram.com/sukrishnacommerce" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                       <a href="https://twitter.com/sukrishnacomm" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                       <a href="https://www.youtube.com/channel/UCLEq1ZlJuHAE6-xmJISKd6g" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                       <a href="https://in.pinterest.com/sukrishnacomm/" target="_blank"><i class="fa-brands fa-pinterest"></i></a>
                    </div>
                  </div>
               </div>
               <style>
                   .social-copyright a {
                   margin: 0 8px; /* space between icons */
                   color: white; /* or your desired color */
                   font-size: 18px; /* adjust icon size if needed */
                   transition: all 0.3s ease;
                   display: inline-block;
                }
                
                .social-copyright a:hover {
                   transform: translateY(-2px);
                   color: #ff9800; /* hover color (optional) */
                }
               </style>
               
               <div class="row">
                   <div class="col-6">
                      <div class="footer-singl-wized">
                         <div class="head">
                            <h6 class="title">Quick Links</h6>
                         </div>
                         <div class="body">
                            <ul class="menu">
                               <li><a href="institue-profile.php">About Us</a></li>
                               <li><a href="core-teams.php">Meet The Teams</a></li>
                               <li><a href="contact-us.php">Contact Us</a></li>
                               <li><a href="#!" class="modelOpener">Brochure</a></li>
                               <li><a href="e-learning.php">E-Learning</a></li>
                               <li><a href="chief-mentor.php">Chief Mentor</a></li>
                               <li><a href="admission-process.php">Admission Process</a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                
                   <div class="col-6">
                      <div class="footer-singl-wized">
                         <div class="head">
                            <h6 class="title">Important Link</h6>
                         </div>
                         <div class="body">
                            <ul class="menu">
                               <li><a href="#!">Infrastructure</a></li>
                               <li><a href="video-outlook-of-campus.php">Outlook of Campus</a></li>
                               <li><a target="_blank" href="https://www.google.com/maps/...">360 Degree View</a></li>
                               <li><a href="term-condition.php">Terms & Conditions</a></li>
                               <li><a href="privacy-policy.php">Privacy Policy</a></li>
                               <li><a href="refund-policy.php">Refund Policy</a></li>
                               <li><a href="shipping-policy.php">Shipping Policy</a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                </div>

               <div class="footer-singl-wized">
                  <div class="head">
                     <h6 class="title">Explore</h6>
                  </div>
                  <div class="body">
                     <ul class="menu">
                        <li><a href="result.php">Result</a></li>
                        <li><a href="gallery.php">Our Gallery</a></li>
                        <li><a href="core-teams.php">Advisory Board</a></li>
                        <li><a href="amendment-visitor-remarks.php">Eminent Visitors</a></li>
                        <li><a href="e-learning.php">E-Learning</a></li>
                        <li><a href="result.php">Result speaks</a></li>
                     </ul>
                  </div>
               </div>
               <div class="footer-singl-wized input-area">
                  <div class="head">
                     <h6 class="title">Newsletter</h6>
                  </div>
                  <div class="body">
                     <p class="disc">Subscribe Our newsletter and get update about our new courses.</p>
                     <form action="#">
                        <div class="input-area-fill">
                           <input type="email" placeholder="Enter Your Email" required>
                           <button> Subscribe</button>
                        </div>
                        <!-- <div class="d-flex align-items-center">
                                 <input type="checkbox" id="exampleCheck1">
                                 <label for="exampleCheck1">I agree to the terms of use and privacy policy.</label>
                              </div> -->
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="container">
      <div class="row ">
         <div class="col-lg-12">
            <div class="footer-one-main-wrapper">

               <div class="row">
                       <div class="col-6">
                          <div class="footer-singl-wized">
                             <div class="head">
                                <h6 class="title">Quick Links</h6>
                             </div>
                             <div class="body">
                                <ul class="menu">
                                   <li><a href="online-registartion.php">Online Registration</a></li>
                                   <li><a href="rules-and-regulation.php">Fee Regulations</a></li>
                                   <li><a href="notification.php">Notification</a></li>
                                   <li><a href="result.php">Result</a></li>
                                   <li><a href="http://icsi.edu/" target="_blank">ICSC</a></li>
                                   <li><a href="https://bbose.in/" target="_blank">BBOSE</a></li>
                                   <li><a href="https://cisce.org/" target="_blank">ICSC</a></li>
                                   <li><a href="https://www.cbse.gov.in/" target="_blank">CBSE</a></li>
                                   <li><a href="faq.php">FAQ</a></li>
                                </ul>
                             </div>
                          </div>
                       </div>
                    
                       <div class="col-6">
                          <div class="footer-singl-wized">
                             <div class="head">
                                <h6 class="title">Important Link</h6>
                             </div>
                             <div class="body">
                                <ul class="menu">
                                   <li><a href="https://icmai.in/icmai/" target="_blank">Cost Accountants of India</a></li>
                                   <li><a href="http://results.biharboardonline.com/" target="_blank">Bihar Board Result</a></li>
                                   <li><a href="http://icai.org/" target="_blank">Official ICAI</a></li>
                                   <li><a href="https://pup.ac.in/" target="_blank">Patna University</a></li>
                                   <li><a href="https://ppup.ac.in/" target="_blank">Patliputra University</a></li>
                                   <li><a href="https://akubihar.ac.in/EN/Default.aspx" target="_blank">Aryabhatta University</a></li>
                                   <li><a href="https://akubihar.ac.in/EN/Default.aspx" target="_blank">Magadh University</a></li>
                                   <li><a href="https://play.google.com/store/apps/details?id=com.app.sukrishnadigitalminds.sukrishnadigitalmindsapp&amp;hl=en_IN" target="_blank">Sukrishna App</a></li>
                                   <li><a href="#!" class="modelOpener">Quick Enquiry</a></li>
                                </ul>
                             </div>
                          </div>
                       </div>
                    </div>

               <div class="footer-singl-wized">
                  <div class="head">
                     <h6 class="title">Our Courses</h6>
                  </div>
                  <div class="body">
                     <ul class="menu">
                        <li><a href="#!">Board Courses</a></li>
                        <li><a href="#!">University Courses</a></li>
                        <li><a href="#!">Professional Courses</a></li>
                        <li><a href="#!">Computer Courses</a></li>
                        <li><a href="#!">Intregrated Courses</a></li>
                        <li><a href="ca-coaching-in-patna.php">CA&nbsp;(Chartered&nbsp;Accounancy)</a></li>
                        <li><a href="best-cs-coaching-in-patna.php"> CS (Company Secretary) </a></li>
                        <li><a href="cma-classes-in-patna.php"> CMA / CFA</a></li>
                        <li><a href="other-courses.php"> Other's Courses </a></li>
                     </ul>
                  </div>
               </div>
               <div class="footer-singl-wized">
                  <div class="head">
                     <h6 class="title">Get Sukrishna APP</h6>
                  </div>
                  <div class="row pt-4">
                     <div class="col-lg-12">
                        <div class="fldx">
                           <a target="_blank" href="https://apps.apple.com/us/app/sukrishna-digital-minds/id6557054407">
                              <img class="bighss" src="assets/images/cta/01.svg" alt="cta-one">
                           </a>
                           <a target="_blank"
                              href="https://play.google.com/store/apps/details?id=com.app.sukrishnadigitalminds.sukrishnadigitalmindsappn">
                              <img class="bighss" src="assets/images/cta/02.svg" alt="cta-one">
                           </a>
                        </div>
                     </div>

                  </div>


               </div>
               <div class="footer-singl-wized">
                  <div class="head">
                     <h6 class="title">Need Help?</h6>
                  </div>
                  <div class="body">
                     <ul class="menu">
                        <li><a href="tel:8084696222">+91-8084696222</a></li>
                     </ul>
                  </div>
                  <div class="body">
                     <ul class="menu">
                        <li><a>Mon - Sat: 07:00 - 09:00</a></li>
                        <li><a>Sunday Closed</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <style>
      @media (max-width: 768px) {
         .copyright-area-one-border.copyrightSection {
            padding-bottom: 3.75rem;
         }
      }
   </style>
   <div class="copyright-area-one-border copyrightSection">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="copyright-area-one">
                  <p>Copyright © 2024 All Rights Reserved by Sukrishna Commerce Academy.
                     Desgined by<a href="https://www.shishtechnology.com/" target="_blank"> <strong>Shish
                           Technology</strong></a>
                  </p>

                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal login-pupup-modal fade" id="exampleModal-login" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hi, Welcome back!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="#" class="login-form">
               <input type="text" placeholder="Username of Email Address" required>
               <input type="password" placeholder="Password" required>
               <div class="d-flex mb--20 align-items-center">
                  <input type="checkbox" id="examplecheck-modal">
                  <label for="examplecheck-modal">I agree to the terms of use and privacy policy.</label>
               </div>
               <button type="submit" class="rts-btn btn-primary">Sign In</button>
               <p class="dont-acc mt--20">Dont Have an Account? <a href="registration.html">Sign-up</a> </p>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- <div class="modal login-pupup-modal fade" id="admiggion-login" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class=" ">
               <h4 class="title text-center">Online Admission Enquiry👋</h4>
               <form class="contact-page-form" action="#">
                  <div class="single-input-wrapper">
                     <input id="name" class="form-control" type="text" placeholder=" Your Name*" required="">
                  </div>
                  <div class="half-input-wrapper ">
                     <div class="single-input-wrapper">
                        <input id="phone" class="form-control" type="tel" placeholder="Phone Number*" maxlength="10"
                           required="">
                     </div>
                  </div>
                  <div class="single-input-wrapper">
                     <select id="course" class="form-control" style="padding: 10px;" required>
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
                  <div class="half-input-wrapper pt-5">
                     <div class="single-input-wrapper">
                        <input id="location" class="form-control" type="text" placeholder="Location*" required="">
                     </div>
                  </div>
                  <div class="single-input-wrapper">
                     <textarea id="message" name="message" placeholder="Let tell us about your Query"></textarea>
                  </div>
                  <div class="single-checkbox-filter">
                     <button class="rts-btn btn-primary w-100">Enquiry Now</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div> -->


<div class="modal login-pupup-modal fade" id="ssss-login" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class=" ">
               <h4 class="title text-center">Download Notes</h4>
               <form class="contact-page-form" action="#">
                  <div class="single-input-wrapper">
                     <!-- <label for="name"></label> -->
                     <input id="name" type="text" placeholder=" Your Name*" required="">
                  </div>
                  <div class="half-input-wrapper">
                     <div class="single-input-wrapper">
                        <input id="username" type="text" placeholder="Courses Name" required="">
                     </div>
                     <div class="single-input-wrapper">
                        <input id="email" type="tel" placeholder="Phone Number" required="">
                     </div>
                  </div>
                  <div class="half-input-wrapper">
                     <div class="single-input-wrapper">
                        <input id="text" type="text" placeholder="Location" required="">
                     </div>

                  </div>
                  <div class="single-checkbox-filter">

                  </div>
                  <button class="rts-btn btn-primary">Download Now</button>

               </form>
            </div>
         </div>
      </div>
   </div>
</div>





<div id="side-bar" class="side-bar header-two">
   <button class="close-icon-menu"><i class="far fa-times"></i></button>
   <!--  <div class="inner-main-wrapper-desk">
            <div class="thumbnail">
               <img src="assets/images/banner/04.jpg" alt="elevate">
            </div>
            <div class="inner-content">
               <h4 class="title">We Build Building and Great Constructive Homes.</h4>
               <p class="disc">
                  We successfully cope with tasks of varying complexity, provide long-term guarantees and regularly master new technologies.
               </p>
               <div class="footer">
                  <h4 class="title">Got a project in mind?</h4>
                  <a href="contact.html" class="rts-btn btn-primary">Let's talk</a>
               </div>
            </div>
         </div>  -->
   <div class="mobile-menu-main">
      <nav class="nav-main mainmenu-nav mt--30">
         <ul class="mainmenu metismenu" id="mobile-menu-active">
            <li>
               <a href="index.php" class="main">Home</a>
            </li>
            <li class="has-droupdown">
               <a href="#" class="main">Courses</a>
               <ul class="submenu mm-collapse">
                  <li class="has-droupdown third-lvl">
                     <a class="main" href="#!">Foundation Courses</a>
                     <ul class="submenu-third-lvl mm-collapse">
                        <li><a href="best-commerce-coaching-in-Patna-for-class-11.php"></a>11th Class</li>
                        <li><a href="best-commerce-coaching-in-Patna-for-class-12.php"></a> 12th Class</li>
                     </ul>
                  </li>
                  <li class="has-droupdown third-lvl">
                     <a class="main" href="#!">University Courses</a>
                     <ul class="submenu-third-lvl mm-collapse">
                        <li><a href="best-commerce-classes-in-patna.php"></a>B.COM</li>
                        <li><a href="bba-entrance-exam-coaching-in-patna.php"></a> BBA</li>
                     </ul>
                  </li>
                  <li class="has-droupdown third-lvl">
                     <a class="main" href="#!">Professional Courses</a>
                     <ul class="submenu-third-lvl mm-collapse">
                        <li><a href="ca-coaching-in-patna.php"></a>CA</li>
                        <li><a href="best-cs-coaching-in-patna.php"></a>CS</li>
                        <li><a href="cma-classes-in-patna.php"></a>CMA / CFA</li>
                        <li><a href="cuet-coaching-near-me.php"></a> CUET</li>
                        <li><a href="ipm-coaching-classes.php"></a> IPM</li>
                        <li><a href="clat-coaching-in-patna.php"></a> CLAT</li>
                     </ul>
                  </li>
                  <li class="has-droupdown third-lvl">
                     <a class="main" href="#!">Computer Courses</a>
                     <ul class="submenu-third-lvl mm-collapse">
                        <li><a href="#!"></a>DCA</li>
                        <li><a href="#!"></a>TALLY</li>
                     </ul>
                  </li>
                  <li class="has-droupdown third-lvl">
                     <a class="main" href="#!">Integrated Courses</a>
                     <ul class="submenu-third-lvl mm-collapse">
                        <li><a href="dca-computer-course.php"></a>DCA</li>
                        <li><a href="tally-course-in-patna.php"></a>TALLY</li>
                     </ul>
                  </li>
               </ul>
            </li>
            <li class="has-droupdown">
               <a href="#" class="main">Campus Preview</a>
               <ul class="submenu mm-collapse">
                  <li><a href="state-of-art-infrastructure.php" class="tag">State of Art Infrastructure </a></li>
                  <li><a class="mobile-menu-link" href="video-outlook-of-campus.php">Video Outlook of Campus</a></li>
                  <li><a class="mobile-menu-link"
                        href="https://www.google.com/maps/uv?pb=!1s0x39ed583b133c1739%3A0x535f28f8ee333f05!3m1!7e115!4shttps%3A%2F%2Flh5.googleusercontent.com%2Fp%2FAF1QipO0ztDts47OX56_68YEl5acj0fTA7fP1USN5ght%3Dw241-h160-k-no!5ssukrishna%20institute%20-%20Google%20Search!15sCgIgARICCAI&imagekey=!1e10!2sAF1QipP4_RnYQW4aa0hFI-SIHMRMW63oPYYe4Jcp4hf3&hl=en&sa=X&ved=2ahUKEwiB3rGJ7JbwAhUrxzgGHWQGCo4QoiowEnoECEEQAw">360
                        Degree View</a></li>
               </ul>
            </li>
            <li class="has-droupdown">
               <a href="#!" class="main">Academic</a>
               <ul class="submenu mm-collapse">
                  <li class=" third-lvl">
                     <a class="main" href="career-after-12th-commerce.php">Career After 12th Commerce </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="admission-process.php">Admission Process </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="rules-and-regulation.php">General Rules and Regulations </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="student-feedback-and-grievance-redresser.php">Student Feedback and Grievance
                        Redresser </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="rules-and-regulation.php">Fee Regulations </a>
                  </li>
               </ul>
            </li>

            <li class="has-droupdown">
               <a href="#" class="main">Mentor</a>
               <ul class="submenu mm-collapse">
                  <li class=" third-lvl">
                     <a class="main" href="chief-mentor.php">Chief Mentor </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="#mentor-team-of-sukrishna.php">Mentor Team of Sukrishna </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="#!">Others </a>
                  </li>
               </ul>
            </li>
            <li class="has-droupdown">
               <a href="#!" class="main">About Us</a>
               <ul class="submenu mm-collapse">
                  <li class=" third-lvl">
                     <a class="main" href="centre-of-excellence.php">Centre of Excellence </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="mission-vision.php">Vision and Mission </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="director-message.php">Director Message </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="core-teams.php">Our Core team </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="features.php">Our Features </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="institue-profile.php">Milestone / Journey </a>
                  </li>
               </ul>
            </li>
            <li class="has-droupdown">
               <a href="#" class="main">Student Corner</a>
               <ul class="submenu mm-collapse">
                  <li class=" third-lvl">
                     <a class="main" href="question-for-10th-year.php">Question for 10th year </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="commerce-question-bank.php">Question Bank </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="https://sukrishnadigitalminds.com/" target="_blank">Online Test </a>
                  </li>
                  <li class=" third-lvl">
                     <a class="main" href="#!">Career guidance video </a>
                  </li>
                  <li class="third-lvl">
                     <a class="main" href="super-ca-commerce-scholarship-test.php">Super CA Scholarship Test </a>
                  </li>
               </ul>
            </li>
            <li class="has-droupdown">
               <a href="#" class="main">Testomonials</a>
               <ul class="submenu mm-collapse">
                  <li><a class="mobile-menu-link" href="#!"> Success Story of Student</a></li>
                  <li><a class="mobile-menu-link" href="students-success-video.php"> Success Story of Student video</a>
                  </li>
                  <li><a class="mobile-menu-link" href="parents-say.php"> Parents Review</a></li>
                  <li><a class="mobile-menu-link" href="amendment-visitor-remarks.php"> Amendment Visitor Remarks</a>
                  </li>
                  <li><a class="mobile-menu-link" href="amendment-visitor-remarks.php"> Google Reviews</a></li>
               </ul>
            </li>
         </ul>
      </nav>
      <div class="buttons-area">
         <a href="online-registartion.php" class="rts-btn btn-border">Online Registration</a>
         <a href="#!" class="rts-btn btn-primary modelOpener">Admission
            Enquery</a>
      </div>
      <div class="rts-social-style-one pl--20 mt--50">
         <ul>
            <li>
               <a href="https://www.facebook.com/sukrishnacommerce">
                  <i class="fa-brands fa-facebook-f"></i>
               </a>
            </li>
            <li>
               <a href="https://www.instagram.com/sukrishnacommerce">
                  <i class="fa-brands fa-instagram"></i>
               </a>
            </li>
            <li>
               <a href="https://twitter.com/sukrishnacomm">
                  <i class="fa-brands fa-twitter"></i>
               </a>
            </li>
            <li>
               <a href="https://www.youtube.com/channel/UCLEq1ZlJuHAE6-xmJISKd6g">
                  <i class="fa-brands fa-youtube"></i>
               </a>
            </li>
            <li>
               <a href="https://in.pinterest.com/sukrishnacomm/">
                  <i class="fa-brands fa-pinterest"></i>
               </a>
            </li>
         </ul>
      </div>
   </div>
</div>

<!-- <div id="myModal-1" class="modal fade" role="dialog">
   <div class="modal-dialog ">
      <img src="images/asv.jpg">
   </div>
</div> -->

<div class="search-input-area">
   <div class="container">
      <div class="search-input-inner">
         <div class="input-div">
            <input class="search-input autocomplete" type="text" placeholder="Search by keyword or #">
            <button><i class="far fa-search"></i></button>
         </div>
      </div>
   </div>
   <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
</div>
<div id="anywhere-home" class="">
</div>