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
            <form class="needs-validation" method="post" action="/brands" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Marka Adı</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Örn: Çaykur" required/>
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Logo Yükle</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" required>
                        <label class="custom-file-label" for="image">Dosya seçiniz</label>
                        <div class="invalid-feedback">
                            Bu alan boş bırakılamaz.
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Kaydet</button>
            </form>
        </div>
    </div>
@endsection
