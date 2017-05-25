@extends('layouts.app')

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            Hubungan : {{ $hubungans->total() }}
            <div class="pull-right">
                <a target="_blank" href="{{ route('hubungan.cetak') }}" class="btn btn-warning btn-xs">Cetak</a>
            </div>
        </div>

        <div class="panel-body">
            @if(count($hubungans) > 0)
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <form action="{{ route('hubungan.index') }}" method="get" class="form-inline">
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

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <form action="{{ route('hubungan.create') }}" method="get">
                            <div class="form-group col-sm-8">
                                <select name="penyakit" id="input" class="form-control" required="required">
                                    <option value="">--pilih--</option>
                                    @foreach($penyakits as $penyakit)
                                        <option value="{{ $penyakit->id }}">{{ $penyakit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>                            
                        </form>
                    </div>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Penyakit</th>
                            <th>Gejala</th>
                            <th colspan="2" width="25%">Bobot</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($hubungans as $hubungan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $hubungan->penyakit->name }}</td>
                                <td>{{ $hubungan->gejala->name }}</td>
                                <td>{{ $hubungan->bobot }}</td>
                                <td>
                                    <a href="{{ route('hubungan.edit', $hubungan->id) }}" class="btn btn-info btn-xs">Edit</a>

                                    <button type="button" class="btn btn-danger btn-xs btn-delete" value="{{ $hubungan->id }}">Hapus</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $hubungans->appends(['q' => $q])->links() }}

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
                var url = '{{ route('hubungan.index') }}' + '/' + $(this).val();
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