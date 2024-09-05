<div class="modal fade" id="modalUserData" tabindex="-1" role="dialog" aria-labelledby="modalUserDataTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please fill in your data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" class="form form-user-data">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input id="fullName" type="text" class="form-control" name="fullName" placeholder="Full Name" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <input id="phone" type="number" class="form-control" name="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="col-12">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="col-12">
                            <input id="companyName" type="text" class="form-control" name="companyName" placeholder="Company Name" required>
                        </div>
                        <div class="col-12">
                            <input id="companyEmail" type="email" class="form-control" name="companyEmail" placeholder="Company Email Address" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn--secondary btn-magnetic">Submit & Download File</button>
            </div>
        </div>
    </div>
</div>