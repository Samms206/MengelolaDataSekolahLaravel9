@extends('layouts.navbar')

@section('title','Student Add')

@section('content')
    
    <div class="mt-5  col-6 m-auto">
        {{-- menampilkan notif eror --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="/student" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="">Pilih salah satu</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nis">NIS</label>
                <input type="text" name="nis" id="nis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="class">Kelas</label>
                <select name="class_id" id="class" class="form-control" required>
                    <option value="">Pilih salah satu</option>
                    @foreach ($class as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="photo">Photo</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>

@endsection