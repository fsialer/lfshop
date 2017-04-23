<table class="table table-striped table-hover ">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Usuario</th>
            <th>Subtotal</th>
            <th>Envio</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->created_at}}</td>
            <td>{{$order->user->name}}</td>
            <td>${{number_format($order->subtotal,2)}}</td>
            <td>${{number_format($order->shipping,2)}}</td>
            <td>${{number_format($order->subtotal+$order->shipping,2)}}</td>
            <td>
               <a href="{{route('pdf.order',$order->id)}}" class="btn btn-info" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                <a href="{{route('order.show',$order->id)}}" class="btn btn-info"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                <a href="{{route('order.destroy',$order->id)}}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>