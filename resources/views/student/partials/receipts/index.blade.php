@extends('components.layouts.student')

@section('content')
    <h2>Sube tu comprobante de pago</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif

    <form action="{{ route('student.receipt.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="receipt">Selecciona tu comprobante (JPG, PNG o PDF)</label>
            <input type="file" name="receipt" required>
        </div>
        @error('receipt')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary mt-3">Subir comprobante</button>
    </form>
@endsection