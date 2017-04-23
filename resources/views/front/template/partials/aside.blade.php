<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">CATEGORIAS</h3>
    </div>
    <div class="panel-body">
        <ul class="list-group">
            @if($categories->count()>0) @foreach($categories as $category)
            <li class="list-group-item">
                <a href="{{route('store.search.category',$category->slug)}}">
                   {{$category->name}}
                </a>
            </li>
            @endforeach @else
            <div class="text-center">
                <span class="label label-default">No hay Categorias</span>
            </div>

            @endif
        </ul>
    </div>
</div>