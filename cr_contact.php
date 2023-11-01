<?php include("Crystalline_navbar.php")?>

        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Contact Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Crystalline_index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="Admission_Form.php">Admission</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Get In Touch</h1>
                    <p>We are always willing and ready to connect with you. Our clientele/parent-teachers relationship is one of the best qualities we can proudly speak about ourselves. Kindly reach out now.</p>
                </div>
                <div class="row g-4 mb-5">
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <h6>Mafowurosere Street, Jaleyemi, 230222, Osogbo, NG</h6>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa fa-envelope-open fa-2x text-primary"></i>
                        </div>
                        <h6 class="mb-2"><a class="text-dark" href="mailto:admin@crystalline-academy">admin@crystalline-academy</a></h6>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <h6 class="mb-2"><a class="text-dark" href="tel:+2347053338338">+234 (0)705 333 8338</a></h6>
                    </div>
                </div>
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <p class="mb-4">Please submit a message for us here below. Our Administrative Officer will respond to you in the fastest time possible and also route your needs through the most appropriate channel.</p>
                                <h1 class="mb-4">Make Appointment</h1>
                                    <form action="Crystalline_appointment.php" method="post">
                                        <div class="row g-3">
                                            <div class="col-sm-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="gname" name="gname"
                                                        placeholder="Guardian Name">
                                                    <label for="gname">Guardian Name</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control border-0" id="gmail" name="gmail"
                                                        placeholder="Guardian Email">
                                                    <label for="gmail">Guardian Email</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="cname" name="cname"
                                                        placeholder="Child Name">
                                                    <label for="cname">Student Name</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="cage" name="cage"
                                                        placeholder="Child Age">
                                                    <label for="cage">Student Age</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control border-0" name="message"
                                                        placeholder="Leave a message here" id="message"
                                                        style="height: 100px"></textarea>
                                                    <label for="message">Message</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.181682235608!2d4.544563573947961!3d7.770550107419073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1037877fcbc41fd3%3A0x6a47a2b276a27eea!2sCrystalline%20Montessori%20Academy!5e0!3m2!1sen!2sng!4v1692885008462!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
<?php include ("Crystalline_footer.php");?>