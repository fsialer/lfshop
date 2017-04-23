@extends('front.account.index') @section('content2')


    <div class="col-md-8 well bs-component center-block no-float">
        {!!Form::open(['route'=>'address.store','method'=>'POST','class'=>'form-horizontal'])!!}
        <fieldset>
            <legend>DIRECCIONES [AGREGAR DIRECCION]</legend>
            <div class="form-group {{ $errors->has('region_id') ? ' has-error' : '' }}">
                {!!Form::label('region_id', 'DEPARTMENTO', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::select('region_id',$regions,null,['class'=>'form-control chosen-region','id'=>'region_id'])!!} @if ($errors->has('region_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('region_id') }}</strong>
                    </span> @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('municipality_id') ? ' has-error' : '' }}">
                {!!Form::label('municipality_id', 'PROVINCIA', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::select('municipality_id',[],null,['class'=>'form-control chosen-municipality','id'=>'municipality_id'])!!} @if ($errors->has('municipality_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('municipality_id') }}</strong>
                    </span> @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }}">
                {!!Form::label('city_id', 'DISTRITO', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::select('city_id',[],null,['class'=>'form-control chosen-city','id'=>'city_id'])!!} @if ($errors->has('city_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('city_id') }}</strong>
                    </span> @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('movil') ? ' has-error' : '' }}">
                {!!Form::label('movil', 'Celular', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::text('movil','',['class' => 'form-control','id'=>'movil','placeholder'=>'Celular'])!!} @if ($errors->has('movil'))
                    <span class="help-block">
                        <strong>{{ $errors->first('movil') }}</strong>
                    </span> @endif
                </div>

            </div>
            <div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }}">
                {!!Form::label('telephone', 'Telefono', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::text('telephone','',['class' => 'form-control','id'=>'telephone','placeholder'=>'Nombre'])!!} @if ($errors->has('telephone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('telephone') }}</strong>
                    </span> @endif
                </div>

            </div>
            <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                {!!Form::label('type', 'Tipo de direccion', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::select('type',['','casa'=>'Casa','departamento'=>'Departamento','condominio'=>'condominio','residencial'=>'residencial','oficina'=>'Oficina','local'=>'Local','otro'=>'Otro'],null,['class'=>'form-control chosen-type','id'=>'type'])!!} @if ($errors->has('type'))
                    <span class="help-block">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span> @endif
                </div>
            </div>
            
            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                {!!Form::label('address', 'Direccion', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::text('address','',['class' => 'form-control','id'=>'address','placeholder'=>'Nombre'])!!} @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span> @endif
                </div>

            </div>
             <div class="form-group {{ $errors->has('lot') ? ' has-error' : '' }}">
                {!!Form::label('lot', 'lote', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::text('lot','',['class' => 'form-control','id'=>'lot','placeholder'=>'Nombre'])!!} @if ($errors->has('lot'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lot') }}</strong>
                    </span> @endif
                </div>

            </div>
             <div class="form-group {{ $errors->has('departament') ? ' has-error' : '' }}">
                {!!Form::label('departament', 'N. Dept.', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::text('departament','',['class' => 'form-control','id'=>'departament','placeholder'=>'Nombre'])!!} @if ($errors->has('departament'))
                    <span class="help-block">
                        <strong>{{ $errors->first('departament') }}</strong>
                    </span> @endif
                </div>

            </div>
            <div class="form-group {{ $errors->has('urbanization') ? ' has-error' : '' }}">
                {!!Form::label('urbanization', 'Urbanizacion.', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::text('urbanization','',['class' => 'form-control','id'=>'urbanization','placeholder'=>'Nombre'])!!} @if ($errors->has('urbanization'))
                    <span class="help-block">
                        <strong>{{ $errors->first('urbanization') }}</strong>
                    </span> @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('reference') ? ' has-error' : '' }}">
                {!!Form::label('reference', 'Referencia', ['class' => 'control-label col-md-2'])!!}
                <div class="col-md-10">
                    {!!Form::textarea ('reference','',['class'=>'form-control txt-area-content','placeholder'=>'Ingrese un descripcion'])!!} @if ($errors->has('reference'))
                    <span class="help-block">
                        <strong>{{ $errors->first('reference') }}</strong>
                    </span> @endif
                </div>

            </div>
            <div class="form-group text-center">
                {!! Form::submit('Registrar',['class'=>'btn btn-success']) !!}
                <a href="{{route('address.index')}}" class="btn btn-default">Cancelar</a>
            </div>
        </fieldset>


        {!!Form::close()!!}
    </div>

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {        
        $(".chosen-region").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije una region',
            width: "100%"
        });
        $(".chosen-municipality").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije una Provincia',
            width: "100%"
        });
        $(".chosen-city").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije una Provincia',
            width: "100%"
        });
        $(".chosen-type").chosen({
            allow_single_deselect: true,
            placeholder_text_single: 'Elije un tipo de direccion',
            width: "100%"
        });

        $(".chosen-region").on('change', function (evt, params) {
            $('.chosen-municipality option').empty();
            $.get("{{route('ajax2.municipality')}}", {
                    region_id: params.selected
                },
                function (data) {                
                    console.log(data);
                    for (var i in data) {
                        $(".chosen-municipality").append("<option  value=" + i + ">" + data[i] + "</option>");
                         
                    }
                   console.log('paso');
                    $('.chosen-municipality').trigger('chosen:updated');
                });

            
        });
        $(".chosen-municipality").on('change', function (evt, params) {
            $('.chosen-city option').empty();
            $.get("{{route('ajax2.city')}}", {
                    municipality_id: params.selected
                },
                function (data) {                
                    console.log(data);
                    for (var i in data) {
                        $(".chosen-city").append("<option  value=" + i + ">" + data[i] + "</option>");
                         
                    }
                   console.log('paso');
                    $('.chosen-city').trigger('chosen:updated');
                });

            
        });
    });
</script>
@endsection