@extends('layout.main')

@section('container')
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Welcome to EXChick.id - {{ $setting->title }}</h4>
            </div>
            <div class="card-body" style="text-align: justify;">
                <?php echo $setting->description ?>
            </div>
        </div>
    </section>
</div>
@endsection