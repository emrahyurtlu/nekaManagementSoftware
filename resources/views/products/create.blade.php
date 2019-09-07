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
            <form class="needs-validation" method="post" action="/products" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Ürün Adı</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Örn: Çaykur" required />
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>

                <div class="form-group">
                    <label for="barcode">Barkod</label>
                    <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Lütfen barkod giriniz" required />
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>

                <div class="form-group">
                    <label for="brand_id">Marka Seçiniz</label>
                    <select class="form-control" name="brand_id" id="brand_id" required>
                        <option>Lütfen seçim yapınız</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">
                                {{$brand->name}}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_id">Kategori Seçiniz</label>
                    <select class="form-control" name="category_id" id="category_id" required>
                        <option>Lütfen seçim yapınız</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>

                <div class="form-group">
                    <label for="mass">Ürün Ağırlığı</label>
                    <input type="number" class="form-control" id="mass" name="mass" placeholder="Örn: 1000" required />
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>

                <div class="form-group">
                    <label for="mass_unit_id">Ağırlık Birimi Seçiniz</label>
                    <select class="form-control" name="mass_unit_id" id="mass_unit_id" required>
                        <option>Lütfen seçim yapınız</option>
                        @foreach($massUnits as $massUnit)
                            <option value="{{$massUnit->id}}">
                                {{$massUnit->name}}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Fotoğraf Yükle</label>
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
