<section class="border-top">
    <div class="camera_container">
        <div id="camera" class="camera_wrap">
            @foreach ($slider->images as $image)
                <div data-src="{{ asset($image->getPath()) }}">
                    <div class="camera_caption fadeIn">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-offset-5 col-lg-7"><h2>{{ $image->name }}</h2></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
