@extends('frontend.layouts.app')

@section('styles')

<link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">

@endsection

@section('content')
           <!--Page Title-->
           <section class="page-title-two bg-color-1 centred mt-5">
            <div class="pattern-layer">
                <div class="pattern" style="background-image: url(frontend/images/shape/shape-9.png);"></div>
             </div>
            <div class="auto-container">
                <div class="content-box clearfix">
                <br>
                    <br>      
                    <br>
                    <br>
                    <br>      
                    <br>
                    <h1>العقارات</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="{{route('home')}}">الرئيسية</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title-->
        
        <section class="property-page-section property-list">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="default-sidebar property-sidebar">
                            <div class="filter-widget sidebar-widget">
                                <div class="widget-title">
                                    <h5 class="text-center font-weight-bold">قائمة المدن </h5>
                                </div>
                                <form class="sidebar-search" action="{{ route('search')}}" method="GET">
        
                                <div class="widget-content pb-5">

                                    @foreach($cities as $city)
                                    <div class="buy-btn pull-right text-center"><a class="category" href="{{ route('property.city',$city->city_slug) }}"><h4 class="category">{{ $city->city }}</h4></a></div>
                                    <br>
                                @endforeach
            
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="property-content-side">
                            <div class="wrapper list">
                                <div class="deals-list-content list-item">
                                    @foreach($properties as $property)
                                    <div class="deals-block-one">
                                        <div class="inner-box">
        
                                            @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                                            <div class="image-box img-fluid" style="height: 100%">
                                                <a href="{{ route('property.show',$property->slug) }}"><img style="height: 100%" class="img-fluid" src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}"></a>
                                                <div class="batch"><i class="icon-11"></i></div>
                                            </div>
                                            @else
                                            <div class="image-box">
                                                <a href="{{ route('property.show',$property->slug) }}"><img style="height: 100%" class="img-fluid" src="{{$property->image}}" alt="{{$property->title}}"></a>
                                                <div class="batch"><i class="icon-11"></i></div>
                                            </div>
        
                                            @endif
        
        
                                            <div class="lower-content">
                                                <div class="title-text"><h4><a href="{{ route('property.show',$property->slug) }}">{{$property->title}}</a></h4></div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <h6>{{ $property->type }} - {{ $property->purpose }}</h6>
                                                        <h4>{{ $property->price }} ريال</h4>
                                                    </div>
                                                    <div class="author-box pull-right">
                                                            <span>{{ ucfirst($property->city) }} - {{ ucfirst($property->address) }}</span>
                                                    </div>
                                                </div>
                                                <ul class="more-details clearfix">
                                                    <li><i class="icon-14"></i>غرف نوم: <strong>{{ $property->bedroom}}</strong></li>
                                                    <li><i class="icon-15"></i>دورات مياه: <strong>{{ $property->bathroom}}</strong></li>
                                                    <li><i class="icon-16"></i>مساحة أرضية: <strong>{{ $property->area}}</strong></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
        
                                </div>
                            </div>

                            <div class="pagination-wrapper">
                                {{ $properties->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
@endsection

@section('scripts')

<script>

    $(function(){
        var js_properties = <?php echo json_encode($properties);?>;
        js_properties.data.forEach(element => {
            if(element.rating){
                var elmt = element.rating;
                var sum = 0;
                for( var i = 0; i < elmt.length; i++ ){
                    sum += parseFloat( elmt[i].rating ); 
                }
                var avg = sum/elmt.length;
                if(isNaN(avg) == false){
                    $("#propertyrating-"+element.id).rateYo({
                        rating: avg,
                        starWidth: "20px",
                        readOnly: true
                    });
                }else{
                    $("#propertyrating-"+element.id).rateYo({
                        rating: 0,
                        starWidth: "20px",
                        readOnly: true
                    });
                }
            }
        });
    })
</script>
@endsection