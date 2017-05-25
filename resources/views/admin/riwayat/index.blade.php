@extends('layouts.app')

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            Riwayat : {{ $riwayats->total() }}
            <div class="pull-right">
                <a target="_blank" href="{{ route('riwayat.cetak') }}" class="btn btn-warning btn-xs">Cetak</a>
            </div>
        </div>

        <div class="panel-body">
            @if(count($riwayats) > 0)
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="{{ route('riwayat.index') }}" method="get" class="form-inline">
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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Pekerjaan</th>
                            <th colspan="2">Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($riwayats as $riwayat)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $riwayat->nama }}</td>
                                <td>{{ $riwayat->alamat }}</td>
                                <td>{{ $riwayat->pekerjaan }}</td>
                                <td>{{ $riwayat->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a href="{{ route('riwayat.show', $riwayat->id) }}" class="btn btn-info btn-xs">Detail</a>
                                    <button type="button" class="btn btn-danger btn-xs btn-delete" value="{{ $riwayat->id }}">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $riwayats->appends(['q' => $q])->links() }}

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
                var url = '{{ route('riwayat.index') }}' + '/' + $(this).val();
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