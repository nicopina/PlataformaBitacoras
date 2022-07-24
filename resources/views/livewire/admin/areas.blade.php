<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Búsqueda">
        </div>
        @if($areas->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($areas as $area)
                                <tr>
                                <td>{{$area->ID_Area}}</td>
                                <td>{{$area->Nombre}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('admin.areas.edit', Crypt::encrypt($area->ID_Area))}}">Editar</a>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $areas->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>
                    No hay ningún área en los registros
                </strong>
            </div>      
        @endif
    </div>
</div>
