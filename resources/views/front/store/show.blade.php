@extends('front.template.main') @section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>{{$product->name}}</h1>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                <div class='carousel-outer'>
                    <div class='carousel-inner block-center'>
                        @foreach($product->images as $key=>$image)
                        <div class="item {{$key==0?'active':''}}">
                            <img src="{{asset('images/products/'.$image->name)}}" alt=''  data-zoom-image="{{asset('images/products/'.$image->name)}}" width="870" height="auto"/>
                        </div>
                        @endforeach
                    </div>
                    <!-- sag sol -->
                    <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                        <span class='glyphicon glyphicon-chevron-left'></span>
                    </a>
                    <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                        <span class='glyphicon glyphicon-chevron-right'></span>
                    </a>
                </div>

                <!-- thumb -->
                <ol class='carousel-indicators mCustomScrollbar meartlab'>
                    @foreach($product->images as $key=>$image)
                    <li data-target='#carousel-custom' data-slide-to='{{$key}}' class='active'><img src="{{asset('images/products/'.$image->name)}}" alt='' /></li>
                    @endforeach                    
                </ol>
            </div>
        </div>
        <div class="col-md-5">
            <div class="thumbnail">
                <div class="caption">
                    <div class="left">
                        {!! $product->extract !!}
                    </div>
                    <p>
                        <h3><span class="label label-success">$ {{number_format($product->price,2)}}</span></h3>
                    </p>
                    <a href="{{route('cart.add',$product->slug)}}" class="btn btn-warning form-control"><i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i> Lo quiero</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12 left">
            <h2>Descripción del producto</h2> {!! $product->description !!}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('store.index')}}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div id="disqus_thread"></div>
    </div>
</div>

@endsection 
@section('js')
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function () { // DON'T EDIT BELOW THIS LINE
        var d = document,
            s = d.createElement('script');
        s.src = '//shoponline-1.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();

</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection