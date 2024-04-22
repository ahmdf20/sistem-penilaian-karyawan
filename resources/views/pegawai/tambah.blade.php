@extends('_default.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Tambah Pegawai</h4>
                        <form
                            action="{{ route('pegawai.store') }}"
                            class="forms-sample"
                            method="POST"
                        >
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama"
                                    name="nama"
                                    placeholder="Inputkan Nama Lengkap"
                                    value="{{ old('nama') }}"
                                >
                                @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="contoh@email.contoh.com"
                                    value="{{ old('email') }}"
                                >
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="no_telp"
                                    name="no_telp"
                                    placeholder="628512345612"
                                    value="{{ old('no_telp') }}"
                                >
                                @error('no_telp')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Inputkan Password"
                                >
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ulangi_password">Ulangi Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="ulangi_password"
                                    name="ulangi_password"
                                    placeholder="Ulangi Password"
                                >
                                @error('ulangi_password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="peran">Peran</label>
                                <select
                                    class="form-control"
                                    id="peran"
                                    name="peran"
                                >
                                    <option value="pilih">-- Pilih --</option>
                                    <option value="direktur-produksi">Direktur Produksi</option>
                                    <option value="karyawan">Karyawan Produksi</option>
                                </select>
                                @error('peran')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button
                                type="submit"
                                class="btn btn-success mr-2"
                            >Submit</button>
                            <a
                                href="{{ route('pegawai') }}"
                                class="btn btn-light"
                            >Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    {{-- Footer --}}
    @include('partials._footer-app')
    {{-- End Footer --}}

    <!-- partial -->
</div>

@endsection
