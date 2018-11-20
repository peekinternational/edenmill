@if(!$slides->isEmpty())
<div class="intro_section page_mainslider">
    <div class="flexslider">
        <ul class="slides">
            @foreach($slides as $key=>$slide)
            <li>
                <figure class="flexslider__img"><a href="{{ $slide->link }}"><img src="{{ asset('assets/images/slider/'.$slide->background)  }}" alt="{{ $slide->title }}"></a></figure>
                <div class="flexslider__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-{{ $slide->text_align }}">
                                <h3 class="flexslider__title ">
                                    <span>{{ $slide->title }}</span>
                                    {{ $slide->description }}
                                </h3>
                                @if(!empty($slide->link))
                                    <a href="{{ $slide->link }}" class="button-t1__parallax2">{{ $slide->link_text }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- eof flexslider -->
</div>
@endif

