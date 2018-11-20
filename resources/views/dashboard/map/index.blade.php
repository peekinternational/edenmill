@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Home page Map</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div>
                    {!! Form::open(['action'=>['SettingsController@update_map'],'method'=>'post','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-sm-3 control-label">Map Title <span>*</span></label>
                            <div class="col-sm-6">
                                {!! Form::text('title',(isset($map['title']['value'])?$map['title']['value']:null), $attributes = ['class'=>'form-control','placeholder'=>'Map Title','required'=>true])  !!}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('lat') ? ' has-error' : '' }}">
                            <label for="lat" class="col-sm-3 control-label">Map Latitude <span>*</span></label>
                            <div class="col-sm-6">
                                {!! Form::text('lat',(isset($map['lat']['value'])?$map['lat']['value']:null), $attributes = ['class'=>'form-control','placeholder'=>'Map Latitude','required'=>true])  !!}
                                @if ($errors->has('lat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('lng') ? ' has-error' : '' }}">
                            <label for="lng" class="col-sm-3 control-label">Map Longitude  <span>*</span></label>
                            <div class="col-sm-6">
                                {!! Form::text('lng',(isset($map['lng']['value'])?$map['lng']['value']:null), $attributes = ['class'=>'form-control','placeholder'=>'Map Latitude','required'=>true])  !!}
                                @if ($errors->has('lng'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('lng') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('zoom') ? ' has-error' : '' }}">
                            <label for="zoom" class="col-sm-3 control-label">Map Zoom</label>
                            <div class="col-sm-6">
                                {!! Form::number('zoom',(isset($map['zoom']['value'])?$map['zoom']['value']:null), $attributes = ['class'=>'form-control','placeholder'=>'Map Zoom'])  !!}
                                @if ($errors->has('zoom'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('zoom') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('water-color') ? ' has-error' : '' }}">
                            <label for="water-color" class="col-sm-3 control-label">Water color</label>
                            <div class="col-sm-6">
                                {!! Form::color('water-color',(isset($map['water-color']['value'])?$map['water-color']['value']:null), $attributes = ['class'=>'form-control','placeholder'=>'Water color'])  !!}
                                @if ($errors->has('water-color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('water-color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('man-made-color') ? ' has-error' : '' }}">
                            <label for="man-made-color" class="col-sm-3 control-label">Building color</label>
                            <div class="col-sm-6">
                                {!! Form::color('man-made-color',(isset($map['man-made-color']['value'])?$map['man-made-color']['value']:null), $attributes = ['class'=>'form-control','placeholder'=>'Building color'])  !!}
                                @if ($errors->has('man-made-color'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('man-made-color') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('park-color') ? ' has-error' : '' }}">
                            <label for="park-color" class="col-sm-3 control-label">Park color</label>
                            <div class="col-sm-6">
                                {!! Form::color('park-color',(isset($map['park-color']['value'])?$map['park-color']['value']:null), $attributes = ['class'=>'form-control','placeholder'=>'Park color'])  !!}
                                @if ($errors->has('park-color'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('park-color') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('highway-color') ? ' has-error' : '' }}">
                            <label for="highway-color" class="col-sm-3 control-label">Highway color</label>
                            <div class="col-sm-6">
                                {!! Form::color('highway-color',(isset($map['highway-color']['value'])?$map['highway-color']['value']:null), $attributes = ['class'=>'form-control','placeholder'=>'Highway color'])  !!}
                                @if ($errors->has('highway-color'))
                                    <span class="help-block">
                                                    <strong>{{ $errors->first('highway-color') }}</strong>
                                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('road-color') ? ' has-error' : '' }}">
                            <label for="road-color" class="col-sm-3 control-label">Highway color</label>
                            <div class="col-sm-6">
                                {!! Form::color('road-color',(isset($map['road-color']['value'])?$map['road-color']['value']:null), $attributes = ['class'=>'form-control','placeholder'=>'Roads color'])  !!}
                                @if ($errors->has('road-color'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('road-color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Draggable</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    {!! Form::radio('draggable','true', (isset($map['draggable']['value']) && $map['draggable']['value']=='true') ,$attributes = ['class'=>'minimal'])  !!}
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    {!! Form::radio('draggable','false', ((isset($map['draggable']['value']) && $map['draggable']['value']=='false') || (!isset($map['draggable']['value']))) ,$attributes = ['class'=>'minimal'])  !!}
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Mouse Scroll wheel</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    {!! Form::radio('scrollwheel','true', (isset($map['scrollwheel']['value']) && $map['scrollwheel']['value']=='true') ,$attributes = ['class'=>'minimal'])  !!}
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    {!! Form::radio('scrollwheel','false', ((isset($map['scrollwheel']['value']) && $map['scrollwheel']['value']=='false') || (!isset($map['scrollwheel']['value']))) ,$attributes = ['class'=>'minimal'])  !!}
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Map Marker</label>
                            <div class="col-sm-6" style="padding-top: 5px;">
                                <input type="file" name="marker" class="form-control input-photo">
                                <div>
                                    <img id="image_upload_preview" src="{{ asset('assets/images/settings/'.(isset($map['marker']['value'])?$map['marker']['value']:null)) }}" class="img-responsive img-thumbnail" alt="Map Marker">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3" style="padding-top: 5px;">
                                <hr>
                                <span class="pull-right">
                                        <button type="submit" class="btn btn-success">Save</button>
                                </span>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <h3>Preview</h3>
                <hr>
                <div class="page_map">
                    <div id="map" class="contact-map" style="width: 100%; height: 400px"></div>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
@stop
@section('footer')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_upload_preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".input-photo").change(function () {
            readURL(this);
        });
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrT56LiDBI0VCdsWn1x-jsKTHc4NNEoVs"></script>
    <script type="text/javascript">
        var lat;
        var lng;
        var map;
        var styles = [
            {
                "featureType": "landscape.man_made",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "{{ (isset($map['man-made-color']['value']) && !empty($map['man-made-color']['value']) && strlen(trim($map['man-made-color']['value'])) == 7)?trim($map['man-made-color']['value']):'#f7f1df' }}"
                    }]
            },
            {
                "featureType": "landscape.natural",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#d0e3b4"
                    }]
            },
            {
                "featureType": "landscape.natural.terrain",
                "elementType": "geometry",
                "stylers": [
                    {
                        "visibility": "off"
                    }]
            },
            {
                "featureType": "poi",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "off"
                    }]
            },
            {
                "featureType": "poi.business",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }]
            },
            {
                "featureType": "poi.medical",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "#fbd3da"
                    }]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "{{ (isset($map['park-color']['value']) && !empty($map['park-color']['value']) && strlen(trim($map['park-color']['value'])) == 7)?trim($map['park-color']['value']):'#bde6ab' }}"
                    }]
            },
            {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "visibility": "off"
                    }]
            },
            {
                "featureType": "road",
                "elementType": "labels",
                "stylers": [
                    {
                        "visibility": "off"
                    }]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#ffe15f"
                    }]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [
                    {
                        "color": "{{ (isset($map['highway-color']['value']) && !empty($map['highway-color']['value']) && strlen(trim($map['highway-color']['value'])) == 7)?trim($map['highway-color']['value']):'#ffe15f' }}"
                    }]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "{{ (isset($map['road-color']['value']) && !empty($map['road-color']['value']) && strlen(trim($map['road-color']['value'])) == 7)?trim($map['road-color']['value']):'#ffffff' }}"
                    }]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "black"
                    }]
            },
            {
                "featureType": "transit.station.airport",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#cfb2db"
                    }]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "color": "{{ (isset($map['water-color']['value']) && !empty($map['water-color']['value']) && strlen(trim($map['water-color']['value'])) == 7)?trim($map['water-color']['value']):'#a2daf2' }}"
                    }]
            }];
        <?php
            $map_lat = "40.714224";
            $map_lng = "-73.961452";

            if(isset($map['lat']['value']) && !empty($map['lat']['value'])){
                $map_lat = $map['lat']['value'];
            }
            if(isset($map['lng']['value']) && !empty($map['lng']['value'])){
                $map_lng = $map['lng']['value'];
            }
        ?>
        jQuery.getJSON('http://maps.googleapis.com/maps/api/geocode/json?latlng={{ $map_lat }},{{ $map_lng }}', function (data)
        {
            lat = data.results[0].geometry.location.lat;
            lng = data.results[0].geometry.location.lng;
        }).complete(function ()
        {
            dxmapLoadMap();
        });
        function attachSecretMessage(marker, message)
        {
            var infowindow = new google.maps.InfoWindow(
                    {
                        content: message
                    });
            google.maps.event.addListener(marker, 'click', function ()
            {
                infowindow.open(map, marker);
            });
        }
        window.dxmapLoadMap = function ()
        {
            var center = new google.maps.LatLng(lat, lng);
            var settings = {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoom: {{ (isset($map['zoom']['value']) && !empty($map['zoom']['value'])?$map['zoom']['value']:15)  }},
                draggable: {{ (isset($map['scrollwheel']['value']) && !empty($map['scrollwheel']['value'])?$map['scrollwheel']['value']:'false')  }},
                scrollwheel: {{ (isset($map['scrollwheel']['value']) && !empty($map['scrollwheel']['value'])?$map['scrollwheel']['value']:'false')  }},
                center: center,
                styles: styles
            };
            map = new google.maps.Map(document.getElementById('map'), settings);
            var image = '{{ asset('assets/images/settings/'.(isset($map['marker']['value']) && !empty($map['marker']['value'])?$map['marker']['value']:'google_marker.png')) }}';
            var marker = new google.maps.Marker(
                    {
                        position: center,
                        title: '{{ (isset($map['title']['value']) && !empty($map['title']['value'])?$map['title']['value']:'Map Title')  }}',
                        map: map,
                        icon: image
                    });
            marker.setTitle('Map title'.toString());
            //type your map title and description here
            attachSecretMessage(marker, '<h3>Map title</h3><p>Map HTML description</p>');
        }
    </script>
@stop
