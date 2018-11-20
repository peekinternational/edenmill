<!--===============About Us=================-->
<div id="about-us" class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }}">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <figure class="content-block-03__img">
                    <img src="{{ asset('assets/images/'.$about_section['about-photo']['value']) }}" alt="{{ $about_section['about-photo']['title'] }}">
                    <!--<iframe width="898" height="602" src="https://www.youtube.com/embed/W3tSqhOtzag" frameborder="0" allowfullscreen></iframe>-->
                </figure>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="content-block-03">
                    <h2 class="title-t3 text-sm-center a-about">About</h2>
                    <h2 class="title-t2 title-t2--padding text-sm-center a-us">Us</h2>
                    <p class="content-block-03__text text-sm-center">
                       {{ $about_section['about-text']['title'] }}
                        <br/>
                        {{ $about_section['about-text']['value'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>