@extends('app')

@section('content')
    <script type="text/javascript" src="{{'lib/DataTables/datatables.min.js'}}"></script>
    <script type="text/javascript" src="{{'js/data-table.js'}}"></script>
    <div class="card">
        <div class="card-header">
            Marka Yönetimi
        </div>
        <div class="card-body">
            <a href="/brands/create" class="btn btn-primary"><i class="fas fa-plus"></i> Yeni Ekle</a>
            <hr>
            <table  class="data-table">
                <thead>
                <tr>
                    <th>Logo</th>
                    <th>Marka</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>
                            <img src="{{env('AWS_URL')}}/{{$brand->image}}" alt="{{$brand->name}}" width="100" class="img-thumbnail">
                        </td>
                        <td>{{$brand->name}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    İşlemler
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/brands/{{$brand->id}}/edit"><i class="fas fa-edit"></i> Düzenle</a>
                                    <a class="dropdown-item delete" href="/brands/{{$brand->id}}"><i class="fas fa-trash"></i> Sil</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Logo</th>
                    <th>Marka</th>
                    <th>İşlemler</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
