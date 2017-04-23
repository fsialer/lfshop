<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">{{$category->name}} </h3>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            @if($category->count()>0) 
            @foreach($category->subcategories as $subcategory)
            <li class="list-group-item">
                <a href="{{route('store.search.subcategory',[$category->slug,$subcategory->slug])}}">
                   {{$subcategory->name}}                         
                </a>
                <span class="badge">{{$subcategory->products()->count()}}</span>
                <ul>
                    @foreach($subcategory->products as $productd)
                    <li>
                        <a href="{{route('store.search.subcategory',[$category->slug,$productd->typeproduct->slug])}}">{{$productd->typeproduct->name}}</a>
                    </li>
                    @endforeach

                </ul>

            </li>
            @endforeach 
            @else
            <div class="text-center">
                <span class="label label-default">No hay Categorias</span>
            </div>

            @endif
        </ul>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">FILTROS</h3>
    </div>
    <div class="panel-body">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" 
                        aria-expanded="false" aria-controls="collapseOne">
                        MARCAS
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <ul class="list-group">
                            {!! Form::model(Request::all(),['route'=>'user.index','method'=>'GET']) !!} 
                            @foreach($subcategoryd->products as $productd)
                            <li class="list-group-item">
                                {{$productd->mark->name}}
                                <span class="badge"> {!!Form::checkbox('mark_id',$productd->mark->id)!!}</span>
                            </li>
                            @endforeach 
                            {!! Form::close() !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>