@extends('app')

@section('content')
    <div class="card">
        <div class="card-header">
            Yeni Ekle
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            <form class="needs-validation" method="post" action="/categories" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Kategori Adı</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Örn: Süt Ürünleri"
                           required/>
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </form>
        </div>
    </div>
@endsection
