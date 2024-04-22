@extends('_default.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Proyek</h4>

                        <a
                            href="{{ route('proyek.tambah') }}"
                            class="btn btn-sm btn-success"
                        >Tambah Data</a>

                        <div class="table-responsive pt-3">
                            <table
                                class="table table-bordered"
                                id="tabel_proyek"
                            >
                                <thead>
                                    <tr>
                                        <th>
                                            Nama Proyek
                                        </th>
                                        <th>
                                            Tanggal Mulai
                                        </th>
                                        <th>
                                            Deadline
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proyeks as $key => $proyek)
                                    <tr>
                                        <td>
                                            {{ $proyek->nama_proyek }}
                                        </td>
                                        <td>
                                            {{ $proyek->tanggal_mulai }}
                                        </td>
                                        <td>
                                            {{ $proyek->deadline }}
                                        </td>
                                        <td>
                                            {{ $proyek->status }}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-sm btn-light"
                                                    type="button"
                                                    data-bs-toggle="dropdown"
                                                    aria-expanded="false"
                                                >
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a
                                                            class="dropdown-item"
                                                            href="{{ route('pegawai.detail', ['uuid' => $proyek->uuid]) }}"
                                                        >Detail</a></li>
                                                    <li><a
                                                            class="dropdown-item"
                                                            href="{{ route('pegawai.edit', ['uuid' => $proyek->uuid]) }}"
                                                        >Edit</a></li>
                                                    <li><a
                                                            class="dropdown-item"
                                                            onclick="handleHapus('{{ $proyek->uuid }}')"
                                                        >Hapus</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- content-wrapper ends -->

    <script>
        new DataTable('#tabel_proyek');

        function handleHapus(uuid)
        {
            Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda mungkin tidak dapat mengembalikan data yang telah dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus"
            }).then((res) => {
                if (res.isConfirmed) {
                    $.ajax({
                        url: `{{ config('app.url') }}/proyek/hapus/${uuid}`,
                        method: 'POST',
                        data: {
                            _token: `{{ csrf_token() }}`,
                            _method: 'DELETE'
                        },
                        success: function(result) {
                            Swal.fire({
                                title: result.title,
                                text: result.text,
                                icon: result.icon
                            }).then((res1) => {
                                if (res1.isConfirmed) {
                                    window.location.reload()
                                }
                            });
                        },
                        error: function(error) {
                            console.error(error)
                        }
                    })
                }
            });
        }
    </script>

    {{-- Footer --}}
    @include('partials._footer-app')
    {{-- End Footer --}}

    <!-- partial -->
</div>

@endsection
