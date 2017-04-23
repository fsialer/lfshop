@extends('front.template.main') @section('content')
<div class="container-fluid">
    <div class="col-md-3">
        @include('front.template.partials.aside')
    </div>
    <div class="col-md-9">
        <div class="row">
            @if($subcategories->total()>0)
            <h1>{{$subcategories->first()->category->name}}</h1> @foreach($subcategories as $subcategory)
            <div class="col-md-3 text-center">
                <div class="thumbnail">
                    <div class="img-container">
                        <img class="img-responsive img-thumbnail" alt="Responsive image" src="{{asset('images/subcategories/'.$subcategory->image)}}">
                    </div>
                    <div class="caption">
                        <p>
                            <a class="link" href="{{route('store.search.subcategory',[$subcategory->category->slug,$subcategory->slug])}}">
                                <h4>{{$subcategory->name}}</h4>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach @else
            <div class="text-center">
                <span class="label label-default">No hay Subcategorias</span>
            </div>
            @endif
        </div>
        <div class="row text-center">
            {!! $subcategories->render() !!}
        </div>
    </div>

</div>


@endsection