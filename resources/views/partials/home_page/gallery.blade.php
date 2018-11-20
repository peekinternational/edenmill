@if($gallery->count()>0)
    <div id="play" class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="filters isotope_filters-t2 text-center">
                        <a href="#" data-filter="*" class="selected">All</a>
                        @if(isset($GalleryCategory) && $GalleryCategory->count()>0)
                            @foreach($GalleryCategory as $category)
                                <a href="#" data-filter=".gallery-category-{{ $category['id'] }}">{{ $category['value'] }}</a>
                            @endforeach
                        @endif
                        {{--  <a href="#" data-filter=".kidsplay">Kids Corner</a>
                          <a href="#" data-filter=".B-parties">Birthday Parties</a>
                          <a href="#" data-filter=".farming">Farming</a>--}}
                    </div>
                </div>
            </div>
            <div class="row isotope_container isotope  masonry-layout" data-filters=".isotope_filters-t2" >
                <!--=============kids corner=============-->
                @foreach($gallery as $gallery_item)
                    <?php $category_classes = '';  ?>
                    @if(isset($GalleryCategory) && $GalleryCategory->count()>0)
                        @foreach($GalleryCategory as $category)
                            @if(in_array($category['id'],explode(',',$gallery_item->categories)))
                                <?php $category_classes .= 'gallery-category-'.$category['id'].' '; ?>
                            @endif
                        @endforeach
                    @endif
                    <div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 {{ $category_classes }}">
                        <div class="vertical-item gallery-title-item content-absolute">
                            <div class="item-media" style="padding:4px">
                                <img src="{{asset('assets/images/gallery/'.$gallery_item->image) }}" alt="{{ $gallery_item->title }}">
                                <div class="media-links">
                                    <div class="links-wrap">
                                        <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="{{asset('assets/images/'.$gallery_item->image) }}"></a>
                                        @if($gallery_item->downloadable)
                                            <a class="p-link" title="" href="{{asset('assets/images/gallery/'.$gallery_item->image)  }}" download="" style="color: #fff;"><i class="fa fa-download"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="item-content">
                                    <h4 class="item-content__title">
                                        <a href="{{ $gallery_item->link }}">{{ $gallery_item->title }}</a>
                                    </h4>
                                    <div class="item-content__text">{{ $gallery_item->description }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--<div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 kidsplay gallery-category-57">
                    <div class="vertical-item gallery-title-item content-absolute">
                        <div class="item-media">
                            <img src="{{ asset('assets/images/kids/img-19.jpg') }}" alt="">
                            <div class="media-links">
                                <div class="links-wrap">
                                    <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="{{ asset('assets/images/kids/img-19.jpg') }}"></a>

                                    <a class="p-link" title="" href="#"></a>

                                </div>

                            </div>

                            <div class="item-content">

                                <h4 class="item-content__title">

                                    <a href="#">Consetetur sadipscing elitr</a>

                                </h4>

                                <div class="item-content__text">3904 North Avenue, Wilber, NE 68465</div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 kidsplay">

                    <div class="vertical-item gallery-title-item content-absolute">

                        <div class="item-media">

                            <img src="{{ route('images',['image'=>'kids.img-21.jpg']) }}" alt="">

                            <div class="media-links">

                                <div class="links-wrap">

                                    <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="{{ asset('assets/images/kids/img-21.jpg') }}"></a>

                                    <a class="p-link" title="" href="#"></a>

                                </div>

                            </div>

                            <div class="item-content">

                                <h4 class="item-content__title">

                                    <a href="#">Consetetur sadipscing elitr</a>

                                </h4>

                                <div class="item-content__text">3904 North Avenue, Wilber, NE 68465</div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 kidsplay ">

                    <div class="vertical-item gallery-title-item content-absolute">

                        <div class="item-media">

                            <img src="{{ route('images',['image'=>'kids.img-22.jpg']) }}" alt="">

                            <div class="media-links">

                                <div class="links-wrap">

                                    <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="{{ asset('assets/images/kids/img-22.jpg') }} "></a>

                                    <a class="p-link" title="" href="#"></a>

                                </div>

                            </div>

                            <div class="item-content">

                                <h4 class="item-content__title">

                                    <a href="#">Consetetur sadipscing elitr</a>

                                </h4>

                                <div class="item-content__text">3904 North Avenue, Wilber, NE 68465</div>

                            </div>

                        </div>

                    </div>

                </div>



                <!--=============birthday parties=============-->

                <div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 B-parties">

                    <div class="vertical-item gallery-title-item content-absolute">

                        <div class="item-media">

                            <img src="{{ asset('assets/images/edenmillfarm/b11.jpg') }}" alt="">

                            <div class="media-links">

                                <div class="links-wrap">

                                    <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="{{ asset('assets/images/edenmillfarm/b11.jpg') }}"></a>

                                    <a class="p-link" title="" href="#"></a>

                                </div>

                            </div>

                            <div class="item-content">

                                <h4 class="item-content__title">

                                    <a href="#">Consetetur sadipscing elitr</a>

                                </h4>

                                <div class="item-content__text">3904 North Avenue, Wilber, NE 68465</div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 B-parties">

                    <div class="vertical-item gallery-title-item content-absolute">

                        <div class="item-media">

                            <img src="{{ asset('assets/images/edenmillfarm/b8.jpg') }}" alt="">

                            <div class="media-links">

                                <div class="links-wrap">

                                    <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="{{ asset('assets/images/edenmillfarm/b8.jpg') }}"></a>

                                    <a class="p-link" title="" href="#"></a>

                                </div>

                            </div>

                            <div class="item-content">

                                <h4 class="item-content__title">

                                    <a href="#">Consetetur sadipscing elitr</a>

                                </h4>

                                <div class="item-content__text">3904 North Avenue, Wilber, NE 68465</div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 B-parties">

                    <div class="vertical-item gallery-title-item content-absolute">

                        <div class="item-media">

                            <img src="{{ asset('assets/images/edenmillfarm/b4.jpg') }}" alt="">

                            <div class="media-links">

                                <div class="links-wrap">

                                    <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="{{ asset('assets/images/edenmillfarm/b4.jpg') }}"></a>

                                    <a class="p-link" title="" href="#"></a>

                                </div>

                            </div>

                            <div class="item-content">

                                <h4 class="item-content__title">

                                    <a href="#">Consetetur sadipscing elitr</a>

                                </h4>

                                <div class="item-content__text">3904 North Avenue, Wilber, NE 68465</div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 B-parties">

                    <div class="vertical-item gallery-title-item content-absolute">

                        <div class="item-media">

                            <img src="{{ asset('assets/images/edenmillfarm/b6.jpg') }}" alt="">

                            <div class="media-links">

                                <div class="links-wrap">

                                    <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="{{ asset('assets/images/edenmillfarm/b6.jpg') }}"></a>

                                    <a class="p-link" title="" href="#"></a>

                                </div>

                            </div>

                            <div class="item-content">

                                <h4 class="item-content__title">

                                    <a href="#">Consetetur sadipscing elitr</a>

                                </h4>

                                <div class="item-content__text">3904 North Avenue, Wilber, NE 68465</div>

                            </div>

                        </div>

                    </div>

                </div>

                <!--=============farming=============-->

                <div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 farming">

                    <div class="vertical-item gallery-title-item content-absolute">

                        <div class="item-media">

                            <img src="{{ asset('assets/images/edenmillfarm/f2.jpg') }}" alt="">

                            <div class="media-links">

                                <div class="links-wrap">

                                    <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="{{ asset('assets/images/edenmillfarm/f2.jpg') }} "></a>

                                    <a class="p-link" title="" href="#"></a>

                                </div>

                            </div>

                            <div class="item-content">

                                <h4 class="item-content__title">

                                    <a href="#">Consetetur sadipscing elitr</a>

                                </h4>

                                <div class="item-content__text">3904 North Avenue, Wilber, NE 68465</div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 farming">

                    <div class="vertical-item gallery-title-item content-absolute">

                        <div class="item-media">

                            <img src="{{ asset('assets/images/edenmillfarm/f6.jpg') }}" alt="">

                            <div class="media-links">

                                <div class="links-wrap">

                                    <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="{{ asset('assets/images/edenmillfarm/f6.jpg') }} "></a>

                                    <a class="p-link" title="" href="#"></a>

                                </div>

                            </div>

                            <div class="item-content">

                                <h4 class="item-content__title">

                                    <a href="#">Consetetur sadipscing elitr</a>

                                </h4>

                                <div class="item-content__text">3904 North Avenue, Wilber, NE 68465</div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 farming">

                    <div class="vertical-item gallery-title-item content-absolute">

                        <div class="item-media">

                            <img src="{{ asset('assets/images/edenmillfarm/f3.jpg') }}" alt="">

                            <div class="media-links">

                                <div class="links-wrap">

                                    <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="{{ asset('assets/images/edenmillfarm/f3.jpg') }} "></a>

                                    <a class="p-link" title="" href="#"></a>

                                </div>

                            </div>

                            <div class="item-content">

                                <h4 class="item-content__title">

                                    <a href="#">Consetetur sadipscing elitr</a>

                                </h4>

                                <div class="item-content__text">3904 North Avenue, Wilber, NE 68465</div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="fullwidth_isotope isotope-item isotope-item-t2 col-lg-3 col-md-6 col-sm-12 farming">

                    <div class="vertical-item gallery-title-item content-absolute">

                        <div class="item-media">

                            <img src="{{ asset('assets/images/edenmillfarm/f1.jpg') }}" alt="">

                            <div class="media-links">

                                <div class="links-wrap">

                                    <a class="p-view prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="{{ asset('assets/images/edenmillfarm/f1.jpg') }}"></a>

                                    <a class="p-link" title="" href="#"></a>

                                </div>

                            </div>

                            <div class="item-content">

                                <h4 class="item-content__title">

                                    <a href="#">Consetetur sadipscing elitr</a>

                                </h4>

                                <div class="item-content__text">3904 North Avenue, Wilber, NE 68465</div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
--}}
            <!-- eof .isotope_container.row -->

        </div>

    </div>
@endif