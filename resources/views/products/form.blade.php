@extends('template')

@section('title', 'Form Produk')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <h3>Form {{ $title }} Produk</h3>

            <form action="{{ $route }}"
                  method="POST">

                @csrf

                @if($method == 'PUT')

                    @method('PUT')

                @endif

                <div class="mb-3">

                    <label>Nama Produk</label>

                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $product->name) }}">

                    @error('name')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <div class="mb-3">

                    <label>Harga</label>

                    <input type="number"
                           name="price"
                           class="form-control @error('price') is-invalid @enderror"
                           value="{{ old('price', $product->price) }}">

                    @error('price')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                    @enderror

                </div>

                <button class="btn btn-success">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection