<section class="maps pb-5">
    @if(@$data)
        <div class="container px-4 px-lg-0">
            <div class="row">
                <div class="col-12 col-lg-8 pl-0">
                    {{-- "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1328.2803796507471!2d110.71430371934889!3d-6.540174947424431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7123dde697c459%3A0x43913a6fc8cca4a6!2sOSV%20Indonesia!5e0!3m2!1sen!2sid!4v1725967356547!5m2!1sen!2sid" --}}
                    <iframe src="{{ @$data->maps_link }}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-12 col-lg-4 pl-0 pl-lg-4">
                    <div class="top mb-5">
                        <h3 class="mb-4">{{ @$data->maps_title }}</h3>
                        {!! @$data->maps_desc !!}
                    </div>
                    <div class="bottom">
                        {!! @$data->maps_bottom_text !!}
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>