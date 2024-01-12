@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if (isset($editData))
                @include('customs.edit')
            @endif
            @if (!isset($editData))
                @include('customs.create')
            @endif
            @if (isset($showData))
                @include('customs.detail')
            @endif
            @if (!isset($showData))
                <div class="col-6">
                    <?php $i = 1; ?>
                    @forelse ($showAllData as $sdata)
                        <div class="card mb-2 p-4 bg-dark text-warning position-relative">
                            <div class="card-title h2">Title -> {{ $sdata->title }} <span
                                    class="position-absolute bottom-0 end-50">{{ $i }}</span></div>
                            <hr>
                            <div class="card-footer">
                                <a href="{{ route('customs.show', $sdata->id) }}" class="btn mt-3 btn-outline-primary">See
                                    More</a>
                            </div>
                        </div>
                        <?php $i++; ?>
                    @empty
                        <div class="card mb-2 p-4 bg-dark text-warning position-relative">
                            <h2>There is no Note Now....</h2><br>
                            <h2><i class="fa-solid fa-hand-point-left"></i> Add New Notes...</h2>
                        </div>
                    @endforelse
                </div>
            @endif
        </div>
    </div>
@stop
