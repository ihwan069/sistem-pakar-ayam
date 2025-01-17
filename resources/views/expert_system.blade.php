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
                <form class="form form-vertical" method="post" action="{{ route('expert-system-post')}}">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Complite Name" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                </div>
                            </div>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Code</th>
                                        <th>Evidence</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evidences as $evidence)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $evidence->code }}</td>
                                        <td>
                                            {{ $evidence->name }}
                                            <input type="hidden" id="in_id_evidence-{{ $evidence->id }}" name="id_evidence[]" value="{{ $evidence->id }}">
                                        </td>
                                        <td class="align-middle" style="width: 30%">
                                            @if ($setting_type_input->input_type == 'range')
                                            <input class="w-100" type="range" type="range" id="rng-{{ $evidence->id }}" min="0" max="{{ $values->count() - 1 }}" value="0">
                                            <input type="hidden" id="in_val_evidence-{{ $evidence->id }}" name="evidance_value[]" value="">
                                            <div class="d-flex justify-content-between">
                                                <span>{{ $min->name }}</span>
                                                <span id="rngOutput-{{ $evidence->id }}">{{ $evidence->value }}</span>
                                                <span>{{ $max->name }}</span>
                                            </div>
                                            @elseif ($setting_type_input->input_type == 'select')
                                            <select class="form-select" name="evidance_value[]" id="basicSelect">
                                                @foreach ($values as $value)
                                                <option value="{{ $value->value }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                                        <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z" />
                                    </svg> Proses
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@foreach ($evidences as $evidence)
<script>
    var rng_ {
        {
            $evidence - > id
        }
    } = document.getElementById("rng-{{ $evidence->id }}");
    var ro_ {
        {
            $evidence - > id
        }
    } = document.getElementById("rngOutput-{{ $evidence->id }}");
    var in_val_evidence_ {
        {
            $evidence - > id
        }
    } = document.getElementById("in_val_evidence-{{ $evidence->id }}");
    var myRange_ {
        {
            $evidence - > id
        }
    } = [
        @foreach($values as $value) {
            {
                $value - > value
            }
        },
        @endforeach
    ];

    function updateRange() {
        ro_ {
            {
                $evidence - > id
            }
        }.textContent = myRange_ {
            {
                $evidence - > id
            }
        } [parseInt(rng_ {
            {
                $evidence - > id
            }
        }.value, 10)].toFixed(2) * 100 + '%';
        in_val_evidence_ {
            {
                $evidence - > id
            }
        }.value = myRange_ {
            {
                $evidence - > id
            }
        } [parseInt(rng_ {
            {
                $evidence - > id
            }
        }.value, 10)].toFixed(2);
    };
    window.addEventListener("DOMContentLoaded", updateRange);
    rng_ {
        {
            $evidence - > id
        }
    }.addEventListener("input", updateRange);
</script>
@endforeach
@endsection