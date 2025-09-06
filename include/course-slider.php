<style>
    @media (min-width: 769px) {
        .courseSide {
            display: none;
        }
    }

    @media (max-width: 1440px) {
        .courseSide {
            display: none;
        }
    }

    @media (min-width: 769px) {
        .courseSide1 {
            display: none;
        }
    }

    @media (max-width: 1440px) {
        .courseSide1 {
            display: none;
        }
    }
</style>
<div class="right-course-details courseSide">
    <div class="course-side-bar shadow">
        <div class="thumbnail">
            <video width="100%" height="200" muted="" loop="" autoplay="">
                <source src="images/sssuk.mp4" type="video/mp4">
            </video>
        </div>
        <div class="clock-area">
            <i class="fa-light fa-clock"></i>
            <span>2 Day going to get admission </span>
        </div>
        <!-- <a href="#!" class="rts-btn btn-primary nod0osss">Syllabus</a> -->
        <br>
        <a href="#!" class="rts-btn btn-border shadow-sm bg-danger text-white nod0os modelOpener">Syllabus</a>
        <a href="#!" class="rts-btn btn-border bg-primary shadow-sm text-white nod0os">Job Scope</a>
        <a href="#!" class="rts-btn btn-border bg-warning shadow-sm text-white nod0os modelOpener">Download Broucher</a>
    </div>
</div>
<div class="course-side-bar shadow courseSide1">
    <div class="right-course-details mt--30">
        <form id="inquiryForm" class="contact-page-form form-control" action="enquiry-formSubmit.php" method="POST">
            <input type="hidden" name="formType" value="CourseQuick Inquiry" readonly>
            <h4 class="title text-center">Quick Inquiry 🤔📞</h4>
            <div class="single-input-wrapper">
                <input class="form-control" name="name" type="text" placeholder=" Your Full Name*" required="">
            </div>
            <div class="half-input-wrapper ">
                <div class="single-input-wrapper pt-2">
                    <input class="form-control" name="phone" type="tel" placeholder="Phone Number*" maxlength="10"
                        required="">
                </div>
            </div>
            <div class="single-input-wrapper pt-2">
                <select name="course" class="form-control" style="padding: 10px;" required>
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
            <div class="half-input-wrapper pt-2">
                <div class="single-input-wrapper">
                    <input name="location" class="form-control" type="text" placeholder="Location*" required="">
                </div>
            </div>
            <div class="single-input-wrapper pt-2">
                <textarea name="message" placeholder="Let tell us about your Query"></textarea>
            </div>
            <div class="single-checkbox-filter">
                <button class="rts-btn btn-primary w-100" name="submit" type="submit">Enquiry Now</button>
            </div>
        </form>
    </div>
    <div id="messageContainer" style="display: none; margin-top: 10px;"></div>
</div>