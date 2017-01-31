@extends('admin.template.main')
@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>Categorias <smal>[Agregar categoria]</smal></h1>
    </div>(
    <div class="row">
       <div class="col-md-offset-3 col-md-6">
           <div class="page">
               @if(count($errors)>0)
                   @include('admin.template.partials.error')
               @endif
               {!!Form::open(['route'=>['category.update',$category],'method'=>'PUT'])!!}
	    		<div class="form-group">	
	    			{!!Form::label('name', 'Nombre', ['class' => ''])!!}			   
				    {!!Form::text('name',$category->name,['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!}				   		   
	  			</div>
	  			<div class="form-group">
	  			 	{!!Form::label('description', 'Descripcion', ['class' => ''])!!}	
	  				{!!Form::textarea ('description',$category->description,['class' => 'form-control','id'=>'description','placeholder'=>'Descripción'])!!}
	  			</div>
	  			<div class="form-group texto-derecha">
	  				{!! Form::submit('Editar',['class'=>'btn btn-warning']) !!}
	  				<a href="{{route('category.index')}}" class="btn btn-default">Cancelar</a>
	  			</div>
	  			
	    		{!!Form::close()!!}
           </div>
       </div>
        
    </div>
</div>



@endsection