@php
    /** @var \App\Settings\ContactUsSetting $setting */
    $setting = app(\App\Settings\ContactUsSetting::class);
    $companyDoc = $setting->company_document
@endphp

<div class="modal fade" id="modalUserData" tabindex="-1" role="dialog" aria-labelledby="modalUserDataTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title pl-0">Please fill in your data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" onsubmit="validateForm(event)" action="{{ route('company-document-downloads') }}" class="form form-user-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input id="fullName" type="text" class="form-control" name="fullname" placeholder="Full Name" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <input id="phone" type="number" class="form-control" name="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="col-12">
                            <input id="country" type="text" class="form-control" name="country" placeholder="Country" required>
                        </div>
                        <div class="col-12">
                            <input id="companyName" type="text" class="form-control" name="company_name" placeholder="Company Name" required>
                        </div>
                        <div class="col-12">
                            <input id="companyEmail" type="email" class="form-control" name="company_email" placeholder="Company Email" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn--outline-dark btn-magnetic fill d-flex align-items-center justify-content-center">
                            Submit & Download File
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    async function validateForm(event) {
        event.preventDefault(); // Prevent the default form submission

        var fullName = document.getElementById("fullName").value.trim();
        var phone = document.getElementById("phone").value.trim();
        var companyName = document.getElementById("companyName").value.trim();
        var companyEmail = document.getElementById("companyEmail").value.trim();

        if (fullName === "" || phone === "" || companyName === "" || companyEmail === "") {
            alert("All fields are required!");
            return false;
        }

        const formData = new FormData(event.target);

        try {
            const response = await fetch(event.target.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok && result.downloadUrl) {
                window.open(result.downloadUrl, '_blank');

                event.target.reset();
                closeModal();

                setTimeout(() => {
                    window.location.href = window.location.href;
                }, 500);
            } else {
                alert(result.error || 'An error occurred.');
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }

    function closeModal() {
        const modal = document.getElementById("modalId");
        modal.style.display = "none";
    }
</script>
