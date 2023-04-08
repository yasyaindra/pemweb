@extends('layout.index')

@section('content')
    <!-- Main content -->
    <div class="row">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <a href="/mahasiswa/create" class="btn btn-primary">
                                        <i class="nav-icon far fa-plus-square"></i>
                                        Tambah Mahasiswa
                                    </a>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Jurusan</th>
                                            <th>Nomer Hape</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswa as $m)
                                            <tr>
                                                <td>{{ $m->name }}</td>
                                                <td>{{ $m->jurusan }}</td>
                                                <td>{{ $m->phone_number }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $m->status ? 'success' : 'danger' }}">
                                                        {{ $m->status ? 'Lulus' : 'Tidak Lulus' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <form action="/mahasiswa/delete/{{ $m->id }}?_method=DELETE"
                                                        method="POST">
                                                        <a href="/mahasiswa/edit/{{ $m->id }}"
                                                            class="btn btn-info btn-sm mb-2 mb-md-0">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            Edit
                                                        </a>
                                                        <button class="btn btn-danger btn-sm mb-2 mb-md-0">
                                                            <i class="fas fa-trash"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
