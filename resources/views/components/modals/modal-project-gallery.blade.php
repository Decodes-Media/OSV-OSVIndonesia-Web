<div class="modal modal-project-gallery fade" id="project" tabindex="-1" role="dialog" aria-labelledby="modalProjectGalleryTitle"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-carousel-project-gallery owl-theme">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Jquery script must not be here --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
        // Listen for the show event on the modal
        $('#project').on('show.bs.modal', function (event) {
            // Get the button that triggered the modal
            var button = $(event.relatedTarget);
            // Extract the data-id attribute
            var projectData = button.data('project');
            // Set the modal title before showing the modal
            $('.modal-title').html(
                projectData.name+'<br>' +
                '<span>' +
                '<i class="fa fa-map-pin mr-1"></i>' +
                projectData.location +
                '</span>'
            );

            var projectGallery = '';
            for (let index = 0; index < projectData.image.length; index++) {
                if(projectData.image[index] != null) {
                    projectGallery += '<div class="item">'+
                        '<img src="'+projectData.image[index]+'" alt="'+projectData.name+' '+ (index+1) +'" class="img-fluid w-100">'+
                        '</div>';
                }
            }
            
            $('.owl-carousel-project-gallery').html(projectGallery);
        });
    });
</script>