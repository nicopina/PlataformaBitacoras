<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Búsqueda">
        </div>
        @if($bitacoras->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>Fecha (Año-Mes-Día)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bitacoras as $bitacora)
                                <tr>
                                <td>{{$bitacora->Fecha}}</td>
                                
                                <td width="10px">
                                    <form action="{{route('admin.users.bitacora.ver',Crypt::encrypt($bitacora->ID_Bitacora))}}" method="get">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Ver</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $bitacoras->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>
                    No hay bitácoras en los registros
                </strong>
            </div>      
        @endif
    </div>
</div>
