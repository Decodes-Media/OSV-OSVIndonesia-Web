<section class="contact-info">
    <div class="container px-4 px-lg-0">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8 mb-5 mb-md-0">
                <h3 class="mb-4">Get in Touch</h3>
                @if (\Session::has('success'))
                    <div class="alert alert-success mb-3">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
                <form method="POST" action="{{ route('contact-us.store') }}" class="form mb-5">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input id="fullName" type="text" class="form-control" name="fullname" placeholder="Full Name" required>
                            @error('fullName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <input id="phone" type="number" class="form-control" name="phone" placeholder="Phone Number" required>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <input id="country" type="text" class="form-control" name="country" placeholder="Country" required>
                            @error('country')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <input id="companyName" type="text" class="form-control" name="company_name" placeholder="Company Name" required>
                            @error('company_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <input id="companyEmail" type="email" class="form-control" name="company_email" placeholder="Company Email" required>
                            @error('company_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <textarea id="message" class="form-control" name="message" rows="5" placeholder="Write your message.." required></textarea>
                            @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <p>
                                By sending your data, you agree to the <a ref="" data-toggle="modal" data-target="#privacy_policy">Privacy Policy.</a>
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
            </div>

            @if(@$data)
                <div class="col-12 col-md-6 col-lg-4 pl-lg-4 text-md-right">
                    <img src="{{ public_url(@$data->catalog_cover) }}" class="w-100 img-fluid mb-3" alt="Compro" />
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
            @endif
        </div>
    </div>
</section>

<x-modals.modal-user-data />