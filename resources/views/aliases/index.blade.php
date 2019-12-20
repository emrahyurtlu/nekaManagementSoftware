@extends('app')

@section('content')
    <script type="text/javascript" src="{{'lib/DataTables/datatables.min.js'}}"></script>
    <script type="text/javascript" src="{{'js/data-table.js'}}"></script>
    <div class="card">
        <div class="card-header">
            Alias Yönetimi
        </div>
        <div class="card-body">
            <a href="/aliases/create" class="btn btn-primary"><i class="fas fa-plus"></i> Yeni Ekle</a>
            <hr>
            <table  class="data-table">
                <thead>
                <tr>
                    <th>Alias</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($aliases as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    İşlemler
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/aliases/{{$item->id}}/edit"><i class="fas fa-edit"></i> Düzenle</a>
                                    <a class="dropdown-item delete" href="/aliases/{{$item->id}}"><i class="fas fa-trash"></i> Sil</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Alias</th>
                    <th>İşlemler</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
