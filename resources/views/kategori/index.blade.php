@extends('layout.dashboard')

@section('content')
    <div class="container">
        <h2>Daftar Kategori</h2>
        

        <div class="container">
            <div class="row">
                <div class="col-md-6 bg-light text-left">
                <a href="{{ route('kategori.create') }}" class="btn btn-md btn-success btn-sm pull-right">TAMBAH</a>
                </div>
                <div class="col-md-6 bg-light text-right">
                    
                    <form action="/kategori" method="GET"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('Gagal'))
            <div class="alert alert-danger">
                {{ session('Gagal') }}
            </div>
        @endif
            
        <div class="table-responsive">
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Keterangan Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rsetKategori as $kategori)
                        <tr>
                            <td>{{ $kategori->id }}</td>
                            <td>{{ $kategori->deskripsi }}</td>
                            <td>{{ $kategori->kategori }}</td>
                            <td>{{ $kategori->ketkategori }}</td>
                            <td>
                                <a href="{{ route('kategori.show', $kategori->id) }}" class="btn btn-info">
                                    <i class="bi bi-eye"></i> Show
                                </a>
                                <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
