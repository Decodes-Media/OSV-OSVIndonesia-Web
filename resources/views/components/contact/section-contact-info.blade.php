<section class="contact-info">
    <div class="container px-4 px-lg-0">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 mb-5 mb-md-0">
                <h3 class="mb-4">Get in Touch</h3>
                <form method="POST" onsubmit="" class="form mb-5">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label>Full Name<span class="text-danger">*</span></label>
                            <input id="fullName" type="text" class="form-control" name="fullName" placeholder="eg. John Doe" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label>Phone Number<span class="text-danger">*</span></label>
                            <input id="phone" type="number" class="form-control" name="phone" placeholder="eg. 081234567890" required>
                        </div>
                        <div class="col-12">
                            <label>Country<span class="text-danger">*</span></label>
                            <input id="country" type="text" class="form-control" name="country" placeholder="eg. Indonesia" required>
                        </div>
                        <div class="col-12">
                            <label>Company Name<span class="text-danger">*</span></label>
                            <input id="companyName" type="text" class="form-control" name="companyName" placeholder="eg. ABC Company" required>
                        </div>
                        <div class="col-12">
                            <textarea id="message" class="form-control" name="message" rows="5" placeholder="Write your message.." required></textarea>
                        </div>
                        <div class="col-12">
                            <p>
                                By sending your data, you agree to the <a href="#">Privacy Policy.</a><br/>
                                We will process your details and contact you.
                            </p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn--outline-dark btn-magnetic fill">
                            Send Message
                        </button>
                    </div>
                </form>

                <!-- <h5>Follow OSV Indonesia</h5>
                <ul class="social-media">
                    <li>
                        <a href="#" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                </ul> -->
            </div>

            <div class="col-12 col-md-6 col-lg-4 pl-lg-4 text-md-right">
                <img src="{{ asset('img/AAK_4059.jpg') }}" class="w-100 img-fluid mb-3" alt="Compro" />
                <button class="btn btn--outline-dark btn-magnetic fill" data-toggle="modal" data-target="#modalUserData">Download here</button>
                <!-- <div class="tab-area">
                    <ul class="nav nav-tabs" id="Tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="factory-tab" data-toggle="tab" href="#factory" role="tab" aria-controls="factory" aria-selected="false">Factory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="office-tab" data-toggle="tab" href="#office" role="tab" aria-controls="office" aria-selected="true">Office</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="TabContent">
                        <div class="tab-pane fade show active" id="factory" role="tabpanel" aria-labelledby="factory-tab">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1328.2803796507471!2d110.71430371934889!3d-6.540174947424431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7123dde697c459%3A0x43913a6fc8cca4a6!2sOSV%20Indonesia!5e0!3m2!1sen!2sid!4v1725967356547!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <h4>OSV Indonesia Factory</h4>
                            <p>Jalan Drago RT 08, RW 02, 
                                Desa/Kelurahan Sinanggul, Kecamatan Mlonggo 
                                Lab. Jepara - Jawa Tengah 
                                59452 - Indonesia
                            </p>
                        </div>
                        <div class="tab-pane fade" id="office" role="tabpanel" aria-labelledby="office-tab">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1328.2803796507471!2d110.71430371934889!3d-6.540174947424431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7123dde697c459%3A0x43913a6fc8cca4a6!2sOSV%20Indonesia!5e0!3m2!1sen!2sid!4v1725967356547!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <h4>OSV Indonesia Office</h4>
                            <p>Map or information about the office location will go here.</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

<x-modals.modal-user-data />