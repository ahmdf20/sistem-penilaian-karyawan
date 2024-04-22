@extends('_default.app')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Tambah Proyek</h4>
                        <form
                            action="{{ route('proyek.store') }}"
                            class="forms-sample"
                            method="POST"
                        >
                            @csrf
                            <div class="form-group">
                                <label for="nama_proyek">Nama Proyek</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama_proyek"
                                    name="nama_proyek"
                                    placeholder="Inputkan Nama Proyek"
                                    value="{{ old('nama_proyek') }}"
                                >
                                @error('nama_proyek')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Proyek</label>
                                <textarea
                                    class="form-control"
                                    id="deskripsi"
                                    name="deskripsi"
                                    rows="4"
                                    placeholder="Inputkan deskripsi proyek"
                                >{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="tanggal_mulai"
                                    name="tanggal_mulai"
                                    value="{{ old('tanggal_mulai') }}"
                                >
                                @error('tanggal_mulai')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="deadline"
                                    name="deadline"
                                    value="{{ old('deadline') }}"
                                >
                                @error('deadline')
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
