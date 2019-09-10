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
            <form class="needs-validation" method="post" action="/products/{{$product->id}}"
                  enctype="multipart/form-data" novalidate>
                @csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Ürün Adı</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Örn: Çaykur" required
                           value="{{$product->name}}"/>
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>

                <div class="form-group">
                    <label for="barcode">Barkod</label>
                    <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Lütfen barkod giriniz" required
                           value="{{$product->barcode}}"/>
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>

                <div class="form-group">
                    <label for="brand_id">Marka Seçiniz</label>
                    <select class="custom-select" name="brand_id" id="brand_id" required>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : '' }}>
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
                    <select class="custom-select" name="category_id" id="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : '' }}>
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
                    <input type="number" class="form-control" id="mass" name="mass" placeholder="Örn: 1000" required
                           value="{{$product->mass}}"/>
                    <div class="invalid-feedback">
                        Bu alan boş bırakılamaz.
                    </div>
                </div>

                <div class="form-group">
                    <label for="mass_unit_id">Ağırlık Birimi Seçiniz</label>
                    <select class="custom-select" name="mass_unit_id" id="mass_unit_id" required>
                        @foreach($massUnits as $massUnit)
                            <option value="{{$massUnit->id}}" {{$product->mass_unit_id == $massUnit->id ? 'selected' : '' }}>
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
                    <div class="mb-2">
                        <img src="{{env('AWS_URL')}}/{{$product->image}}" alt="{{$product->name}}" width="100"
                             class="img-thumbnail">
                    </div>
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
