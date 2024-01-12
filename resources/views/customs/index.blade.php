@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if (isset($editData))
            @include('customs.edit')
            @endif
            @if (!isset($editData))
                <div class="col-6 bg-dark p-4 rounded">
                    <form action="{{ route('customs.store') }}" method="post">
                        @csrf
                        <input type="text" name="title" class="form-control mt-3 @error('title') is-invalid @enderror"
                            placeholder="Enter Note Title" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <textarea name="description" cols="30" rows="3"
                            class="form-control mt-3 @error('description') is-invalid @enderror" placeholder="Enter Note Description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" name="importantlv"
                            class="form-control mt-3 @error('importantlv') is-invalid @enderror"
                            placeholder="Enter Note Important Level" value="{{ old('importantlv') }}">
                        @error('importantlv')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="status" class="form-control mt-3 @error('status') is-invalid @enderror"
                            placeholder="Enter Note Status" value="{{ old('status') }}">
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-outline-success mt-3">Submit</button>
                    </form>
                </div>
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
                       <h2>There is no Note Now....</h2><br><h2><i class="fa-solid fa-hand-point-left"></i> Add New Notes...</h2>
                    </div>
                    @endforelse
                </div>
            @endif

        </div>
    </div>
@stop
