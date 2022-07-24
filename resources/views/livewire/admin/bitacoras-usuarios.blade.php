<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Búsqueda">
        </div>
        @if($users->count())
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Segundo nombre</th>
                                <th>Apellido</th>
                                <th>Segundo apellido</th>
                                <th>Área</th>
                                <th>Bloqueado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->user}}</td>
                                <td>{{$user->Nombre}}</td>
                                <td>{{$user->Segundo_nombre}}</td>
                                <td>{{$user->Apellido}}</td>
                                <td>{{$user->Segundo_apellido}}</td>
                                <td>{{$user->ID_Area}}</td>
                                <td>{{$user->Bloqueado}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('admin.bitacoras.ver', [Crypt::encrypt($user->id), Crypt::encrypt($user->ID_Bitacora)])}}">Ver</a>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>
                    No hay ningún usuario en los registros
                </strong>
            </div>      
        @endif
    </div>
</div>
