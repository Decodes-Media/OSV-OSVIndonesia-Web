<section class="highlights">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <section>
                    <video src="{{ public_url(@$data->video) }}" autoplay playsinline muted loop preload="auto"></video>
                    <div class="section__content" data-aos="fade-in">
                        <p data-splitting>
                            <span>{{@$data->highlight_text1}}</span><br/>
                            <span>{{@$data->highlight_text2}}</span><br/>
                            <span>{{@$data->highlight_text3}}</span><br/>
                            <span>{{@$data->highlight_text4}}</span>
                        </p>
                    </div>
                </section>
                <section>
                    <div class="section__content">
                        <h2>
                            MANUFACTURING <br/> 
                            FURNITURE PRODUCTS <br/>
                            GLOBALLY
                        </h2>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>