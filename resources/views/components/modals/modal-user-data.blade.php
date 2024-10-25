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
                <form method="POST" onsubmit="return validateForm()" class="form form-user-data">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input id="fullName" type="text" class="form-control" name="fullName" placeholder="Full Name" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <input id="phone" type="number" class="form-control" name="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="col-12">
                            <input id="companyName" type="text" class="form-control" name="companyName" placeholder="Country" required>
                        </div>
                        <div class="col-12">
                            <input id="companyEmail" type="email" class="form-control" name="companyEmail" placeholder="Company Name" required>
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
    function validateForm() {
        var fullName = document.getElementById("fullName").value.trim();
        var phone = document.getElementById("phone").value.trim();
        var companyName = document.getElementById("companyName").value.trim();
        var companyEmail = document.getElementById("companyEmail").value.trim();

        if (fullName === "" || phone === "" || companyName === "" || companyEmail === "") {
            alert("All fields are required!");
            return false;
        }

        window.location.href = "/files/OSV Company Profile-2024 (Digital).pdf";
        return false;
    }
</script>
