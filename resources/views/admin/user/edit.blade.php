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
               {!!Form::open(['route'=>['user.update',$user],'method'=>'PUT'])!!}
	    		<div class="form-group">	
	    			{!!Form::label('name', 'Nombre', ['class' => ''])!!}			   
				    {!!Form::text('name',$user->name,['class' => 'form-control','id'=>'name','placeholder'=>'Nombre'])!!}				   		   
	  			</div>
	  			<div class="form-group">	
	    			{!!Form::label('last_name', 'Apellido', ['class' => ''])!!}			   
				    {!!Form::text('last_name',$user->last_name,['class' => 'form-control','id'=>'last_name','placeholder'=>'Apellido'])!!}				   		   
	  			</div>
	  			<div class="form-group">	
	    			{!!Form::label('email', 'Email', ['class' => ''])!!}			   
				    {!!Form::email('email',$user->email,['class' => 'form-control','id'=>'email','placeholder'=>'Email'])!!}				   		   
	  			</div>
              <div class="form-group">				   
				    {!!Form::radio('type','admin',$user->type=='admin'?true:false,['id'=>'type'])!!}Admin	
				    {!!Form::radio('type','customer',$user->type=='customer'?true:false,['id'=>'type'])!!}Customer				   		   
	  			</div>
	  	        <div class="form-group">	
	    			{!!Form::label('address', 'Direccion', ['class' => ''])!!}			   
				    {!!Form::text('address',$user->address,['class' => 'form-control','id'=>'address','placeholder'=>'Direccion'])!!}				   		   
	  			</div>
	  			<div class="form-group">	
	    			{!!Form::label('active', 'Activo', ['class' => ''])!!}			   
				    {!!Form::checkbox('active',null,$user->active==1?true:false)!!}				   		   
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