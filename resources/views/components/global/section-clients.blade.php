<section class="clients">
    @if(!empty($data))
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text-center" data-aos="fade-in">CLIENTS WE'VE WORKED WITH</h3>
                </div>
            </div>
            <div class="row justify-content-center" data-aos="fade-in">
                @foreach($data as $client)
                    <div class="col-4 col-md-3 col-lg-2 d-flex align-items-center">
                        <div class="tile--client-logo">
                            <img src="{{ public_url($client->logo_path) }}" alt="{{$client->name}}" class="lazy-load"/>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</section>