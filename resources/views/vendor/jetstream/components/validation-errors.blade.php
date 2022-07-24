@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-300">{{ __('Ups! Algo salió mal.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-300">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
