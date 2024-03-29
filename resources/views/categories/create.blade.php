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
            <form class="needs-validation" method="post" action="/categories" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="parent_id">Üst Kategori</label>
                    <select class="form-control select2" name="parent_id" id="parent_id" required>
                        <option value="0">Lütfen seçim yapınız</option>
                        @foreach($rootCategories as $item)
                            <option value="{{$item->id}}">
                                {{$item->name}}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Kategori Adı</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Örn: Süt Ürünleri"
                           required/>
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">İkon Yükle</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
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
