<div>
    <div class="card">
        @if($entradas->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Hora</th>       
                                <th>Frecuencia</th>  
                                <th>Nombre actividad</th>  
                                <th>Descripción actividad</th>        
                                <th></th>  
                                <th></th>                 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entradas as $entrada)
                                <tr>
                                <td>{{$entrada->Hora}}</td>
                                <td>{{$entrada->Frecuencia}}</td>
                                <td>{{$entrada->Nombre_actividad}}</td>
                                <td>{{$entrada->Descripcion_actividad}}</td>
                                
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('usuario.entradas.show', Crypt::encrypt($entrada->ID_Entrada))}}">Editar</a>
                                </td>
                                <td width="10px">
                                    <form action="{{route('usuario.entradas.destroy', $entrada)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger" type="submit">Borrar</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $entradas->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>
                    No hay entradas en los registros
                </strong>
            </div>      
        @endif
    </div>
</div>
