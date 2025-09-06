<?php include('admin/dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta Title -->
    <title>Contact Us | Sukrishna Commerce Patna</title>

    <!-- Meta Description -->
    <meta name="description" content="Contact Sukrishna Commerce in Patna for inquiries about our coaching programs. Reach out via phone, email, or visit us. Connect now for expert guidance.">

    <!-- Meta Keywords (optional) -->
    <meta name="keywords" content="Contact Sukrishna Commerce, Commerce Coaching Patna, Sukrishna Commerce Contact, Patna Coaching Inquiry">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://sukrishnacommerce.com/contact-us.php">
    
   <?php include('include/head.php'); ?>
</head>

<body>
   <?php include('include/header.php'); ?>
   <div class="rts-bread-crumbarea-1 rts-section-gap bg_image">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb-main-wrapper">
                  <h1 class="title">Contact Us</h1>
                  <div class="pagination-wrapper">
                     <a href="index.php">Home</a>
                     <i class="fa-regular fa-chevron-right"></i>
                     <a class="active" href=" ">Contact us</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="rts-contact-area rts-section-gapTop">
      <div class="container">
         <div class="row g-5">
            <div class="col-xl-5">
               <div class="login-page-form-area">
                  <h2 class="title">Love to hear from you <br>
                     <span>Get in touch!</span>
                  </h2>
                  <div id="messageContainer" style="display: none; margin-top: 10px;"></div>
                  <form id="contactForm" action="contact-submit.php" method="POST">
                     <div class="single-input-wrapper">
                        <input name="name" type="text" placeholder="Enter Your Name" required>
                     </div>
                     <div class="half-input-wrapper">
                        <div class="single-input-wrapper">
                           <input name="phone" type="tel" placeholder="Phone Number" maxlength="10" required>
                        </div>
                        <div class="single-input-wrapper">
                           <input name="email" type="email" placeholder="Email Address" required>
                        </div>
                     </div>
                     <div class="half-input-wrapper">
                        <div class="single-input-wrapper">
                           <select name="subject" class="form-control" style="padding: 13px;" required>
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
                        <div class="single-input-wrapper">
                           <input name="location" type="text" placeholder="Your Location" required>
                        </div>
                     </div>
                     <div class="col-12 pb-2">
                        <textarea placeholder="Enter Your Message" class="form-control col-12" name="message"
                           required></textarea>
                     </div>
                     <button class="rts-btn btn-primary" type="submit">Submit Now</button>
                  </form>
               </div>

            </div>
            <div class="col-xl-7 pl--50 pl_lg--15 pl_md--15 pl_sm--15 pb_md--100 pb_sm--100">
               <div class="contact-map-area-start">
                  <div class="single-maptop-info">
                     <div class="icon">
                        <img src="assets/images/contact/02.png" alt="contact">
                     </div>
                     <p class="disc">
                        📍 3rd Floor, Surya Crystal, Near Boring Road Chauraha, Beside Hira Panna Jewellers, Patna-800
                        001
                        (Bihar).
                     </p>
                  </div>
                  <div class="single-maptop-info">
                     <div class="icon">
                        <img src="assets/images/contact/03.png" alt="contact">
                     </div>
                     <a href="tel:+918084696222">☎ <strong>+91-80846 96222</strong></a> <br>
                     <a href="mailto:info@sukrishna.in">✉️ <strong>info@sukrishna.in</strong></a>
                  </div>
                  <div class="single-maptop-info">
                     <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1798.871693598503!2d85.118022!3d25.613442!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed583b133c1739%3A0x535f28f8ee333f05!2sSukrishna%20Commerce%20Academy!5e0!3m2!1sen!2sin!4v1732804913768!5m2!1sen!2sin"
                        width="10%" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
               </div>
               <div class="contact-map-area-start pt-5">
                  <div class="single-maptop-info">
                     <div class="icon">
                        <img src="assets/images/contact/02.png" alt="contact">
                     </div>
                     <p class="disc">
                        📍 1st Floor, Sonu Market, Uday Enclave, Gola Rd, Vastu Ganga Colony, Vivek Vihar Colony, Patna,
                        Bihar 801503
                     </p>
                  </div>
                  <div class="single-maptop-info">
                     <div class="icon">
                        <img src="assets/images/contact/03.png" alt="contact">
                     </div>
                     <a href="tel:+918084696111">☎ <strong>+91-80846 96111</strong></a> <br>
                     <a href="mailto:info@sukrishna.in">✉️ <strong>info@sukrishna.in</strong></a>
                  </div>
                  <div class="single-maptop-info">
                     <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57561.37376129031!2d84.98447122167967!3d25.6186744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed5765ed70cb8b%3A0x1bdf842501fb8e1f!2sSukrishna%20Commerce%20Academy!5e0!3m2!1sen!2sin!4v1743160827080!5m2!1sen!2sin"
                        width="10%" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
               </div>
               <div class="contact-map-area-start pt-5">
                  <div class="single-maptop-info">
                     <div class="icon">
                        <img src="assets/images/contact/02.png" alt="contact">
                     </div>
                     <p class="disc">
                        📍 2nd Floor, Surya Laxmi Complex, Doctor Colony Golambar, Kankarbagh, Patna.
                     </p>
                  </div>
                  <div class="single-maptop-info">
                     <div class="icon">
                        <img src="assets/images/contact/03.png" alt="contact">
                     </div>
                     <a href="tel:+9102025565"> ☎ <strong>+91-91020 25565</strong></a> <br>
                     <a href="mailto:info@sukrishna.in">✉️ <strong>info@sukrishna.in</strong></a>
                  </div>
                  <div class="single-maptop-info">
                     <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d917903.911505648!2d84.52044435888368!3d26.015156576037803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed59b8c969d57f%3A0xa98a5bb927e3d339!2sHDFC%20Bank%20Home%20Loan%20Branch%20-%20Patna%20(Lohiya%20Nagar)!5e0!3m2!1sen!2sin!4v1743161674088!5m2!1sen!2sin"
                        width="10%" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
               </div>
               <!-- <div class="map-bottom-area mt--30">
                  <iframe
                     src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1798.871693598503!2d85.118022!3d25.613442!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed583b133c1739%3A0x535f28f8ee333f05!2sSukrishna%20Commerce%20Academy!5e0!3m2!1sen!2sin!4v1732804913768!5m2!1sen!2sin"
                     width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                     referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div> -->
            </div>
         </div>
      </div>
   </div>
   <div class="rts-section-gap">
   </div>
   <?php include('include/footer-modal-sidebar.php'); ?>
   <?php include('include/footer-js.php'); ?>