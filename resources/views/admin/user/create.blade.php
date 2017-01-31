@extends('admin.template.main')
@section('content')
<div class="container text-center">
    <div class="page-header">
        <h1>Usuarios <smal>[Agregar usuario]</smal></h1>
    </div>
    <div class="row">
       <div class="col-md-offset-3 col-md-6">
           <div class="page">
               @if(count($errors)>0)
                   @include('admin.template.partials.error')
               @endif
               {!!Form::open(['route'=>'user.store','method'=>'POST'])!!}
	    		<div class="form-group">	
	    			{!!Form::label('name', 'Nombre', ['class' => ''])!!}			   
				    {!!Form::text('name','',['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!}				   		   
	  			</div>
	  			<div class="form-group">	
	    			{!!Form::label('last_name', 'Apellido', ['class' => ''])!!}			   
				    {!!Form::text('last_name','',['class' => 'form-control','id'=>'last_name','placeholder'=>'Apellido'])!!}				   		   
	  			</div>
	  			<div class="form-group">	
	    			{!!Form::label('email', 'Email', ['class' => ''])!!}			   
				    {!!Form::email('email','',['class' => 'form-control','id'=>'email','placeholder'=>'Email'])!!}				   		   
	  			</div>
	  			<div class="form-group">
	  				 {!!Form::label('password', 'Contraseña', ['class' => ''])!!}
	  				{!!Form::password('password',['class' => 'form-control','id'=>'password','placeholder'=>'*************'])!!}	   
	  			</div>
              <div class="form-group">				   
				    {!!Form::radio('type','admin',true,['id'=>'type'])!!}Admin	
				    {!!Form::radio('type','customer',false,['id'=>'type'])!!}Customer				   		   
	  			</div>
	  	        <div class="form-group">	
	    			{!!Form::label('address', 'Direccion', ['class' => ''])!!}			   
				    {!!Form::text('address','',['class' => 'form-control','id'=>'address','placeholder'=>'Direccion'])!!}				   		   
	  			</div>
	  			<div class="form-group texto-derecha">
	  				{!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
	  				<a href="{{route('user.index')}}" class="btn btn-default">Cancelar</a>
	  			</div>
	  			
	    		{!!Form::close()!!}
           </div>
       </div>
        
    </div>
</div>



@endsection