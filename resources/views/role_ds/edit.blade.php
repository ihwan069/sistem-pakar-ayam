@extends('layout.main')

@section('container')
<div class="page-content">
    <section class="section col-9">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $title }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('role_ds.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="id_problem">Problem ID</label>
                                <select id="id_problem" class="form-control @error('id_problem') is-invalid @enderror" name="id_problem" required>
                                    <option value="">Select Problem ID</option>
                                    @foreach($problems as $problem)
                                        <option value="{{ $problem->id }}" {{ $role->id_problem == $problem->id ? 'selected' : '' }}>{{ $problem->code }} - {{ $problem->name }}</option>
                                    @endforeach
                                </select>
                                @error('id_problem')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="id_evidence">Evidence ID</label>
                                <select id="id_evidence" class="form-control @error('id_evidence') is-invalid @enderror" name="id_evidence" required>
                                    <option value="">Select Evidence ID</option>
                                    @foreach($evidences as $evidence)
                                        <option value="{{ $evidence->id }}" {{ $role->id_evidence == $evidence->id ? 'selected' : '' }}>{{ $evidence->code }} - {{ $evidence->name }}</option>
                                    @endforeach
                                </select>
                                @error('id_evidence')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" id="cf" class="form-control @error('cf') is-invalid @enderror" value="{{ old('cf', $role->cf) }}" name="cf" required>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                    <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                                </svg> Save
                            </button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg> Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection