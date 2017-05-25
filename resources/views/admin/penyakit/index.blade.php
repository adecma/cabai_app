@extends('layouts.app')

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            Penyakit : {{ $penyakits->total() }}
            <div class="pull-right">
                <a href="{{ route('penyakit.create') }}" class="btn btn-primary btn-xs">Tambah</a>
                <a target="_blank" href="{{ route('penyakit.cetak') }}" class="btn btn-warning btn-xs">Cetak</a>
            </div>
        </div>

        <div class="panel-body">
            @if(count($penyakits) > 0)
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="{{ route('penyakit.index') }}" method="get" class="form-inline">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    Search :
                                </div>
                                <input type="text" class="form-control" name="q" placeholder="Keyword..." value="{{ isset($q) ? $q : '' }}">
                            </div>

                            <div class="input-group">
                                <div class="btn-group">
                                    <button class="btn btn-primary" type="submit">Process</button>
                                </div>
                            </div>
                        </form>
                        <hr>    
                    </div>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Penyakit</th>
                            <th>Keterangan</th>
                            <th>Pengendalian</th>
                            <th colspan="2" width="25%">Probabilitas</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($penyakits as $penyakit)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $penyakit->name }}</td>
                                <td>{{ $penyakit->keterangan }}</td>
                                <td>{{ $penyakit->pengendalian }}</td>
                                <td>{{ $penyakit->probabilitas }}</td>
                                <td>
                                    <a href="{{ route('penyakit.edit', $penyakit->id) }}" class="btn btn-info btn-xs">Edit</a>

                                    <button type="button" class="btn btn-danger btn-xs btn-delete" value="{{ $penyakit->id }}">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $penyakits->appends(['q' => $q])->links() }}

                <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Konfirmasi</h4>
                            </div>

                            <form action="" method="post" id="form-delete">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Yakin akan menghapus data ini?</label>
                                    </div>                                  
                                    {{ csrf_field() }}

                                    {{ method_field('delete') }}
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button class="btn btn-danger" type="submit" id="btn-submit">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-center">
                    Tidak ada data.
                </p>
            @endif
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                //build deleting url
                var url = '{{ route('penyakit.index') }}' + '/' + $(this).val();
                //set action form url
                $('#form-delete').attr('action', url);
                //show modal
                $('#modal-delete').modal();
                //hide modal after click submit button
                $('#btn-submit').click(function() {
                    $('#modal-delete').modal('hide');
                });
            });         
        });
    </script>
@endpush