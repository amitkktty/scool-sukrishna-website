<?php include "admin/dbconnect.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Registration | Sukrishna Commerce Patna</title>
    <meta name="description" content="Register online with Sukrishna Commerce in Patna for top commerce coaching. Easy enrollment for courses. Start your academic journey today.">
    <meta name="keywords" content="Sukrishna Online Registration, Patna Coaching Enrollment, Commerce Course Registration, Sukrishna Commerce Sign-Up">
    <link rel="canonical" href="https://sukrishnacommerce.com/online-registartion.php">
    <meta property="og:title" content="Online Registration | Sukrishna Commerce Patna">
    <meta property="og:description" content="Enroll online with Sukrishna Commerce in Patna for top-tier commerce coaching courses.">
    <meta property="og:url" content="https://sukrishnacommerce.com/online-registartion.php">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://sukrishnacommerce.com/images/sukrishna-commerce-logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Online Registration Sukrishna | Patna">
    <meta name="twitter:description" content="Online registration for Sukrishna Commerce in Patna. Sign up now.">
    <meta name="twitter:image" content="https://sukrishnacommerce.com/images/sukrishna-commerce-logo.png">
   <?php include('include/head.php'); ?>
</head>

<body class="login-page">
   <?php include('include/header.php'); ?>
   <div class="login-registration-wrapper">
      <div class="container">
         <div class="row g-0">
            <div class="col-lg-6">
               <div class="login-page-form-area">
                  <h4 class="title">Online Registration Form👋</h4>
                  <div id="messageContainer" style="display: none; margin-top: 10px;"></div>
                  <form id="registrationForm" action="online-registartionFormSubmit.php" method="POST">
                     <div class="half-input-wrapper">
                        <div class="single-input-wrapper">
                           <label for="name">Your Name*</label>
                           <input id="name" name="name" type="text" placeholder="Enter Your Name" required>
                        </div>
                        <div class="single-input-wrapper">
                           <label for="location">Location*</label>
                           <input id="location" name="location" type="text" placeholder="Enter Your Location" required>
                        </div>
                     </div>

                     <div class="half-input-wrapper">
                        <div class="single-input-wrapper">
                           <label for="phone">Phone Number*</label>
                           <input id="phone" name="phone" type="tel" placeholder="Enter Phone Number" maxlength="10"
                              required>
                        </div>
                        <div class="single-input-wrapper">
                           <label for="email">Email*</label>
                           <input id="email" name="email" type="email" placeholder="Enter Your Email" required>
                        </div>
                     </div>

                     <div class="half-input-wrapper">
                        <div class="single-input-wrapper">
                           <label for="course">Choose Course*</label>
                           <select id="course" name="course" class="form-control" style="padding: 13px;" required>
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
                           <label for="board">Choose Board*</label>
                           <select id="board" name="board" class="form-control" style="padding: 13px;" required>
                              <option value="">Select Board</option>
                              <option value="CBSE">CBSE</option>
                              <option value="BSEB">BSEB</option>
                              <option value="ICSE">ICSE</option>
                              <option value="BBOSE">BBOSE</option>
                              <option value="NIOS">NIOS</option>
                              <option value="Others">Others</option>
                           </select>
                        </div>
                     </div>

                     <div class="col-12 pb-2">
                        <textarea id="message" placeholder="Enter Your Message" class="form-control col-12"
                           name="message" required></textarea>
                     </div>

                     <button type="submit" class="rts-btn btn-primary">Submit</button>

                     <!-- <p>Don't Have an account? <a href="#">Registration</a></p> -->
                  </form>

               </div>
            </div>
            <div class="col-lg-6">
               <div class="contact-thumbnail-login-p mt--100">
                  <img src="assets/images/banner/login-bg.png" width="600" height="495" alt="login-form">
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="p--100"></div>
   <!-- header style two -->


   <!-- rts backto top end -->
   <!-- offcanvase search -->

   <!-- offcanvase search -->
   <div id="anywhere-home" class="">
   </div>
   <?php include('include/footer-js.php'); ?>