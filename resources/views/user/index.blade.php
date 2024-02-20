@extends('layout.template_ad')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Buku</h3>
                    <p class="text-subtitle text-muted">A sortable, searchable, paginated table without dependencies thanks
                        to simple-datatables.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Buku</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Data Petugas</h5>
                    <a class="btn btn-primary btn-sm mb-3" title="Create" href="{{ url('register') }}" role="button"><i
                            class="bi bi-plus-lg"></i>Create</a>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $data->firstItem(); ?>
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->role }}</td>

                                    <td>
                                        
                                        <form action="" class="d-inline" method=""
                                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @csrf
                                            <button type="submit" title="Delete" name="submit"
                                                class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            @endforeach

                        </tbody>
                    </table>
`                   {{ $data->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assetsadmin/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assetsadmin/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


    <script src="{{ asset('assetsadmin/compiled/js/app.js') }}"></script>



    <script src="{{ asset('assetsadmin/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assetsadmin/static/js/pages/simple-datatables.js') }}"></script>
@endsection
