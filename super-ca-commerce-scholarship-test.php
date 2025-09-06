<?php include "admin/dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super CA Commerce Scholarship Test | Sukrishna Patna</title>
    <meta name="description" content="Join the Super CA Commerce Scholarship Test at Sukrishna Commerce in Patna. Earn scholarships for CA coaching. Enroll now to secure your future.">
    <meta name="keywords" content="Super CA Scholarship Test, Sukrishna Commerce Patna, CA Coaching Scholarship, Patna Commerce Test">
    <link rel="canonical" href="https://sukrishnacommerce.com/super-ca-commerce-scholarship-test.php">
    <meta property="og:title" content="Super CA Commerce Scholarship Test | Sukrishna Commerce Patna">
    <meta property="og:description" content="Participate in the Super CA Commerce Scholarship Test at Sukrishna Commerce in Patna for CA coaching.">
    <meta property="og:url" content="https://sukrishnacommerce.com/super-ca-commerce-scholarship-test.php">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://sukrishnacommerce.com/images/sukrishna-commerce-logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Super CA Scholarship Test | Sukrishna Patna">
    <meta name="twitter:description" content="Super CA Commerce Scholarship Test at Sukrishna in Patna. Join now.">
    <meta name="twitter:image" content="https://sukrishnacommerce.com/images/sukrishna-commerce-logo.png">
    <?php include('include/head.php'); ?>
</head>

<body>
    <?php include('include/header.php'); ?>
    <div class="rts-section-gap bgCCarreer bg_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main-wrapper">
                        <h1 class="title">Super CA Scholarship Test</h1>
                        <div class="pagination-wrapper">
                            <a href="index.php">Home</a>
                            <i class="fa-regular fa-chevron-right"></i>
                            <a class="active" href="#!"> Super CA Scholarship Test</a>
                        </div>
                        <!-- breadcrumb pagination area end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-contact-area rts-section-gapTop" style="background-color: #f7f9fc; padding: 40px 0;">
        <div class="container">
            <div class="row g-5">
                <div class="row">
                    <!-- Image in col-5 -->
                    <div class="col-md-7 pt-5">
                        <img src="https://sukrishna.in/images/scolarship3.jpg" alt="Super CA Registration"
                            style="width:100%; height:auto; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
                    </div>

                    <!-- Form in col-7 -->
                    <div class="col-md-5 pt-5">
                        <h4 class="text-center" style="font-size: 28px; font-weight: bold; color: #333;">Super CA
                            Registration Form</h4>
                        <p class="text-center" style="color: #e74c3c; font-size: 16px;">All Fields
                            are Mandatory*</p>
                        <form action="superCA-formSubmit.php" method="POST">
                            <div class="row gx-20">
                                <!-- Full Name -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="name" style="font-size: 16px; font-weight: bold;">Full Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Full Name" required=""
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;">
                                </div>

                                <!-- Date of Birth -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="dob" style="font-size: 16px; font-weight: bold;">Date of Birth <span
                                            class="text-danger">*</span></label>
                                    <input type="date" id="dob" name="dob" class="form-control" required=""
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;">
                                </div>

                                <!-- Mobile Number -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="mobile" style="font-size: 16px; font-weight: bold;">Mobile Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="mobile" name="mobile" class="form-control"
                                        placeholder="Mobile Number" maxlength="10"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');" required=""
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;">
                                </div>

                                <!-- Email Address -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="email" style="font-size: 16px; font-weight: bold;">Email Address
                                        (Optional)</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Email Address (Optional)"
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;">
                                </div>

                                <!-- Current Coaching Name -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="coachingName" style="font-size: 16px; font-weight: bold;">Current
                                        Coaching Name <span class="text-danger">*</span></label>
                                    <input type="text" id="coachingName" name="coachingName" class="form-control"
                                        placeholder="Current Coaching Name (e.g., Sukrishna Commerce or Other)"
                                        required=""
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;">
                                </div>

                                <!-- Current Class -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="currentClass" style="font-size: 16px; font-weight: bold;">Current
                                        Class</label>
                                    <input type="text" id="currentClass" name="currentClass" class="form-control"
                                        value="11th" readonly=""
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;">
                                </div>

                                <!-- Board Selection -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="board" style="font-size: 16px; font-weight: bold;">Board</label>
                                    <select id="board" name="board" class="form-control" required=""
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;">
                                        <option value="">Select Board</option>
                                        <option value="CBSE">CBSE</option>
                                        <option value="BSEB">BSEB</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>

                                <!-- Preferred Test Mode -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="testMode" style="font-size: 16px; font-weight: bold;">Preferred Test
                                        Mode</label>
                                    <input type="text" id="testMode" name="testMode" class="form-control"
                                        value="Offline" readonly=""
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;">
                                </div>

                                <!-- Test Date -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="testDate" style="font-size: 16px; font-weight: bold;">Test Date</label>
                                    <input type="text" id="testDate" name="testDate" class="form-control"
                                        value="01 December" readonly=""
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;">
                                </div>

                                <!-- Select Course -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="course" style="font-size: 16px; font-weight: bold;">Select Course <span
                                            class="text-danger">*</span></label>
                                    <select id="course" name="course" class="form-control" required=""
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;">
                                        <option value="">Select Course</option>
                                        <option value="XIIth">XIIth</option>
                                        <option value="XIIth + CA FOUNDATION">XIIth + CA FOUNDATION</option>
                                        <option value="12th + CUET">12th + CUET</option>
                                        <option value="CUET">CUET</option>
                                        <option value="12th + IPMAT">12th + IPMAT</option>
                                        <option value="IPMAT">IPMAT</option>
                                        <option value="12th + CLAT">12th + CLAT</option>
                                        <option value="CLAT">CLAT</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <!-- Parent/Guardian Name -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="guardianName"
                                        style="font-size: 16px; font-weight: bold;">Parent/Guardian Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="guardianName" name="guardianName" class="form-control"
                                        placeholder="Parent/Guardian Name" required=""
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;">
                                </div>

                                <!-- Address -->
                                <div class="col-md-12 form-group mb-3">
                                    <label for="address" style="font-size: 16px; font-weight: bold;">Address
                                        (Optional)</label>
                                    <textarea id="address" name="address" class="form-control"
                                        placeholder="Address (Optional)"
                                        style="border-radius: 8px; border: 1px solid #ccc; padding: 12px; font-size: 14px;"></textarea>
                                </div>

                                <!-- Declaration Checkbox -->
                                <div class="col-md-12 form-group mb-3">
                                    <input type="checkbox" id="declaration" name="declaration" required="">
                                    <label for="declaration"
                                        style="font-size: 14px; font-weight: normal; color: #dc3545;">
                                        I hereby declare that the information provided above is true to the best of my
                                        knowledge.
                                    </label>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-md-12 text-center">
                                    <button type="submit" name="send_btn" class="btn btn-primary"
                                        style="padding: 10px 30px; border-radius: 50px; font-size: 16px; background-color: #3498db; border: none;">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-section-gap"></div>
    <?php include('include/footer-modal-sidebar.php'); ?>
    <?php include('include/footer-js.php'); ?>