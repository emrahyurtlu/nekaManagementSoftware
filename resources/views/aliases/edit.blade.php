@extends('app')

@section('content')
    <div class="card">
        <div class="card-header">
            Güncelle
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form class="needs-validation" method="post" action="/aliases/{{$alias->id}}" novalidate>
                @csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Alias</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Örn: Çay" required
                           value="{{$alias->name}}"/>
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </form>
        </div>
    </div>
@endsection
