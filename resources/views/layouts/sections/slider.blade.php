<section class="slider">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="slider_percentage slider_default">
                    <div class="frame js_frame">
                        <ul class="slides js_slides">
                            @foreach ($slider->images as $image)
                            <li class="js_slide">
                                <img src="{{ asset($image->getPath()) }}" alt="">
                                <div class="text_field">
                                    <div class="text_field-title">
                                        {{ $image->name }}
                                    </div>
                                    <div class="text_field-body">
                                        <a href="{{ $image->link }}" class="btn btn_more">
                                            Подробнее
                                            <svg>
                                                <use xlink:href="../img/sprites/sprite.svg#right-arrow"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <span class="js_prev prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#c6a770" d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg>
                    </span>
                    <span class="js_next next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#c6a770" d="M199.33 410.622l-55.77-55.508L247.425 250.75 143.56 146.384l55.77-55.507L358.44 250.75z"/></g></svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
