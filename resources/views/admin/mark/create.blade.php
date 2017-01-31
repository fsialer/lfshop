@extends('admin.template.main')
@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>Marcas <smal>[Agregar Marca]</smal></h1>
    </div>(
    <div class="row">
       <div class="col-md-offset-3 col-md-6">
           <div class="page">
               @if(count($errors)>0)
                   @include('admin.template.partials.error')
               @endif
               {!!Form::open(['route'=>'mark.store','method'=>'POST'])!!}
	    		<div class="form-group">	
	    			{!!Form::label('name', 'Nombre', ['class' => ''])!!}			   
				    {!!Form::text('name','',['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!}				   		   
	  			</div>
	  			<div class="form-group">
	  			 	{!!Form::label('description', 'Descripcion', ['class' => ''])!!}	
	  				{!!Form::textarea ('description','',['class' => 'form-control','id'=>'description','placeholder'=>'Descripción'])!!}
	  			</div>
	  			<div class="form-group texto-derecha">
	  				{!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
	  				<a href="{{route('mark.index')}}" class="btn btn-default">Cancelar</a>
	  			</div>
	  			
	    		{!!Form::close()!!}
           </div>
       </div>
        
    </div>
</div>



@endsection