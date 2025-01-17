@extends('layout.main')

@section('container')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $title }}</h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-danger alert-dismissible show fade">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>   
                @endif
                <h1>Sistem Pakar Penyakit Ayam</h1>

                <form method="POST" action="{{ route('diagnosa') }}" class="mt-4">
                    @csrf
                    @if(isset($errorMessage))
                        <p class="text-danger">{{ $errorMessage }}</p>
                    @endif
                    @foreach($evidences as $evidence)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="evidence[]" value="{{ $evidence->id }}" id="{{ $evidence->id }}">
                            <label class="form-check-label" for="{{ $evidence->id }}">
                                {{ $evidence->code }} {{ $evidence->name }}
                            </label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary mt-3">Diagnosa</button>
                </form>
        </div>
    </div>
</section>
</div>
@endsection