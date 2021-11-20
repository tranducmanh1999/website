@extends('templates.shoes.master')
@section('title') Sneaker @endsection
@section('content')
    <div class="container margin-res-top" style="margin-top: 150px">
        @if( !empty($arIndex['slide']) )
            <div class="owl-one owl-carousel owl-theme">
                @foreach($arIndex['slide'] as $item)
                    <div class="item slide-item" style="background-image: url('{{$urlStorage}}storage/app/slide/{{$item->img}}')">
                        <div class="slide-item-text" style="float: {{$item->position_text}}">
                            <h2>{{$item->title}}</h2>
                            <p>{!! $item->content !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        {{--col3--}}
        @if( !empty($arIndex['randomPro']) )
            <div class="row margin-top">
                @foreach( $arIndex['randomPro'] as $random)
                    <div class="col-sm-4 ads-product">
                    <div class="ads-product-content">
                        <div class="ads-product-img">
                            <img src="{{ $random->picture_url }}" alt="">
                        </div>
                    </div>
                    <div class="ads-product-button">
                        @php $slug_rand = \Illuminate\Support\Str::slug($random->name_product,'-') @endphp
                        <a href="{{route('shoes.shoes.product',['slug'=>$slug_rand,'id'=>$random->id_product])}}" class="btn btn-primary">Xem sản phẩm</a>
                    </div>
                </div>
                @endforeach
            </div>@endif
        {{--col 4--}}
        <div class="product margin-top">
            <div class="">
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Sản phẩm mới</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Sản phẩm bán chạy</button>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Sản phẩm mới nhất</button>
                </div>
                {{--sản phẩm mới--}}
                @if(!empty($arIndex['productNews']))
                <div id="London" class="tabcontent">
                    <div class="product-new owl-two owl-carousel owl-theme">
                        @foreach($arIndex['productNews'] as $value)
                            <div class=" box-product-new item">
                            <div class="new-product-content">
                                <div class="product-new-content">
                                    <img src="{{$value->picture_url}}" alt="">
                                </div>
                            </div>
                            <div class="info">
                                <p>{{$value->name_product}}</p>
                                <p>{{number_format($value->price)}} đ</p>
                            </div>
                            <div class="new-product-button">
                                @php $slug_new = \Illuminate\Support\Str::slug($value->name_product,'-') @endphp
                                <a href="{{route('shoes.shoes.product',['slug'=>$slug_new,'id'=>$value->id_product] )}}" class="btn btn-primary">Xem sản phẩm</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @if( !empty($arIndex['product_selling']) )
                    <div id="Paris" class="tabcontent">
                    <div class="product-new owl-two owl-carousel owl-theme">
                        @foreach( $arIndex['product_selling'] as $selling )
                            <div class=" box-product-new item">
                            <div class="new-product-content">
                                <div class="product-new-content">
                                    <img src="{{$selling->picture_url}}" alt="">
                                </div>
                            </div>
                            <div class="info">
                                <p>{{$selling->name_product}}</p>
                                <p>{{number_format($selling->price)}} đ</p>
                            </div>
                            <div class="new-product-button">
                                @php $slug_selling = \Illuminate\Support\Str::slug($selling->name_product,'-') @endphp
                                <a href="{{route('shoes.shoes.product',['slug'=>$slug_selling,'id'=>$selling->id_product] )}}" class="btn btn-primary">Xem sản phẩm</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @if( !empty($arIndex['new_produts']) )
                    <div id="Tokyo" class="tabcontent">
                    <div class="product-new owl-two owl-carousel owl-theme">
                        @foreach( $arIndex['new_produts'] as $new_pd )
                            <div class=" box-product-new item">
                                <div class="new-product-content">
                                    <div class="product-new-content">
                                        
                                        <img src="{{$new_pd->picture_url}}" alt="">
                                    </div>
                                </div>
                                <div class="info">
                                    <p>{{$selling->name_product}}</p>
                                    <p>{{number_format($new_pd->price)}} đ</p>
                                </div>
                                <div class="new-product-button">
                                    @php $slug_npd = \Illuminate\Support\Str::slug($new_pd->name_product,'-') @endphp
                                    <a href="{{route('shoes.shoes.product',['slug'=>$slug_npd,'id'=>$new_pd->id_product] )}}" class="btn btn-primary">Xem sản phẩm</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        {{--phụ kiện khác--}}
        <div class="">
            @if($arIndex['accessories'])
                <div class="accessories">
                    <h3>Phụ kiện khác</h3>
                </div>
                <div class="product-new row">
                    @foreach($arIndex['accessories'] as $item)
                        <div class="col-sm-3 box-product-new box-product-new">
                        <div class="new-product-content">
                            <div class="product-new-content">
               
                                <img src="{{$item->picture_url }}" alt="">
                            </div>
                        </div>
                        <div class="info">
                            <p>{{$item->name_product}}</p>
                            <p>{{number_format($item->price)}} đ</p>
                        </div>
                        <div class="new-product-button">
                            @php $slug_item = \Illuminate\Support\Str::slug($new_pd->name_product,'-') @endphp
                            <a href="{{route('shoes.shoes.product',['slug'=>$slug_item,'id'=>$item->id_product])}}" class="btn btn-primary">Xem sản phẩm</a>
                        </div>
                    </div>
                    @endforeach
                    {{--read more--}}
                </div>
                <div class="row button-read-mode">
                    <a href="" class="btn btn-primary button-hover">Xem tất cả</a>
                </div>
            @endif
        </div>
        {{--sản phẩm giảm giá--}}
        <div class=" margin-top">
            <div class="accessories">
                <h3>Sản phẩm giảm giá</h3>
            </div>
            @if(!empty($arIndex['sale']))
                <div class="product-new row">
                    @foreach($arIndex['sale'] as $item_sale)
                        <div class="col-sm-3 box-product-new box-product-new">
                        <div class="new-product-content">
                            <div class="product-new-content">
                               
                                <img src="{{$item_sale->picture_url}}" alt="">
                                <div class="sale-product">
                                    <p>{{$item_sale->sale}}%</p>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>{{$item_sale->name_product}}</p>
                            <del>{{number_format($item_sale->price)}} đ</del>
                            @php $price_sale = $item_sale->price - $item_sale->price*$item_sale->sale/100 @endphp
                            <p>{{number_format($price_sale)}} đ</p>
                        </div>
                        <div class="new-product-button">
                            @php $slug_sale = \Illuminate\Support\Str::slug($item_sale->name_product,'-') @endphp
                            <a href="{{route('shoes.shoes.product',['slug'=>$slug_sale,'id'=>$item_sale->id_product])}}" class="btn btn-primary">Xem sản phẩm</a>
                        </div>
                    </div>
                    @endforeach
                    {{--read more--}}
                </div>
                <div class="row button-read-mode">
                    <a href="" class="btn btn-primary button-hover">Xem tất cả</a>
                </div>
            @endif
        </div>
    </div>
@endsection
