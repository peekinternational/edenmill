@if(!$slides->isEmpty())
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6" style="padding: 0px 0px ;">
        <div class="intro_section page_mainslider">
            <div class="flexslider">
               <ul class="slides">
                 @foreach($slides as $key=>$slide)
                <li>
                    <figure class="flexslider__img"><a href="{{ $slide->link }}"><img src="{{ asset('assets/images/slider/'.$slide->background)  }}" alt="{{ $slide->title }}"></a></figure>
                <div class="flexslider__content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 text-{{ $slide->text_align }}">
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
    @endif
        </div>
        </div>
        <div class="col-lg-6" style="padding: 0px 0px;">
            <div style="height: 316px; overflow: hidden;">
                <img src="{{ asset('assets/images/Abc.png') }}" alt="" style="width: 100%;">
            </div>       
         
        </div>
            
    </div>
</div>
