<div class="form-group">   
    {!!Form::select('region_id',$regions,null,['class'=>'form-control chosen-region','id'=>'region_id'])!!}
    {!!Form::select('municipality_id',[],null,['class'=>'form-control chosen-municipality','id'=>'municipality_id'])!!} 
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar Distrito..']) !!}
</div>
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

        $(".chosen-region").on('change', function (evt, params) {
            $('.chosen-municipality option').empty();
            $.get("{{route('ajax.municipality')}}", {
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
    });
</script>
@endsection