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
                </div>
            @endif
        </div>
    </div>
</section>

<x-modals.modal-user-data />