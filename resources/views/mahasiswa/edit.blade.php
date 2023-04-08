@extends('layout.index')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form tambah item</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="/mahasiswa/edit/{{ $mahasiswa->id }}" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Mahasiswa</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ $mahasiswa->name }}" required />
                                </div>
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <select class="form-control select2" style="width: 100%" name="jurusan" required>
                                        <option selected="selected">Pilih Jurusan</option>
                                        @foreach ($jurusan as $j)
                                            <option value="{{ $j }}"
                                                {{ $j == $mahasiswa->jurusan ? 'selected' : '' }}>
                                                {{ $j }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="number">Nomer Hape</label>
                                    <input type="text" name="phone_number" class="form-control" id="phone_number"
                                        value="{{ $mahasiswa->phone_number }}" required />
                                </div>
                                <div class="form-group">
                                    <label for="name">Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status"
                                            value="1" {{ $mahasiswa->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="name">
                                            Lulus
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status"
                                            value="0" {{ $mahasiswa->status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status">
                                            Tidak Lulus
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
