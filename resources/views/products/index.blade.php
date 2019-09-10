@extends('app')

@section('content')
    <script type="text/javascript" src="{{'lib/DataTables/datatables.min.js'}}"></script>
    <script type="text/javascript" src="{{'js/data-table.js'}}"></script>
    <div class="card">
        <div class="card-header">
            Ürün Yönetimi
        </div>
        <div class="card-body">
            <a href="/products/create" class="btn btn-primary"><i class="fas fa-plus"></i> Yeni Ekle</a>
            <hr>
            <table id="dataTable">
                <thead>
                <tr>
                    <th>Fotoğraf</th>
                    <th>Ürün Adı</th>
                    <th>Marka</th>
                    <th>Kategori</th>
                    <th>Ağırlık</th>
                    <th>Barkod</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $item)
                    <tr>
                        <td>
                            <img src="{{env('AWS_URL')}}/{{$item->image}}" alt="{{$item->name}}" width="100" class="img-thumbnail">
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->brand->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->mass}} {{$item->massUnit->name}}</td>
                        <td>{{$item->barcode}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    İşlemler
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/products/{{$item->id}}/edit">
                                        <i class="fas fa-edit"></i> Düzenle</a>
                                    <a class="dropdown-item delete" href="/products/{{$item->id}}">
                                        <i class="fas fa-trash"></i> Sil</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Fotoğraf</th>
                    <th>Ürün Adı</th>
                    <th>Marka</th>
                    <th>Kategori</th>
                    <th>Ağırlık</th>
                    <th>Barkod</th>
                    <th>İşlemler</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
