<h2>Hasil Pencarian: {{ $keyword }}</h2>

@foreach($novels as $novel)
    <div>
        <h3>{{ $novel->title }}</h3>
        <p>{{ $novel->user->name }}</p>
    </div>
@endforeach