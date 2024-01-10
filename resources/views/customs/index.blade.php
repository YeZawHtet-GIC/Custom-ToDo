@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if (isset($editData))
                <div class="col-6 bg-warning rounded p-3">
                    <form action="{{ route('customs.update', $editData->id) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="text" name="title" class="form-control mt-3 @error('title') is-invalid @enderror"
                            placeholder="Enter Note Title" value="{{ old('title', $editData->title) }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <textarea name="description" cols="30" rows="3"
                            class="form-control mt-3 @error('description') is-invalid @enderror" placeholder="Enter Note Description"> {{ old('description', $editData->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" name="importantlv"
                            class="form-control mt-3 @error('importantlv') is-invalid @enderror"
                            placeholder="Enter Note Important Level"
                            value="{{ old('importantlv', $editData->importantlv) }}">
                        @error('importantlv')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="status" class="form-control mt-3 @error('status') is-invalid @enderror"
                            placeholder="Enter Note Status" value="{{ old('status', $editData->status) }}">
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-outline-success mt-3">Update</button>
                    </form>
                </div>
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
                        <button class="btn btn-outline-success mt-3">Add</button>
                    </form>
                </div>
            @endif

            @if (isset($showData))
                <div class="col-6">
                    <div class="card p-4 bg-dark text-warning">
                        <div class="card-title h2">Title -> {{ $showData->title }}</div>
                        <hr>
                        <span class="badge badge-danger text-danger border rounded position-absolute top-0 end-0">Level
                            -> {{ $showData->importantlv }}
                        </span>
                        <div class="card-body">

                            <h3 class="position-relative">
                                Description -> {{ $showData->description }}
                            </h3>
                            <span class="h5">{{ $showData->status }}</span>
                        </div>
                        <div class=" d-flex justify-content-between">
                            <a href="{{ route('customs.index') }}" class="btn mt-3 btn-outline-info">Back</a>
                            <a href="{{ route('customs.edit', $showData->id) }}"
                                class="btn mt-3 btn-outline-warning">Edit</a>
                            <form action="{{ route('customs.delete', $showData->id) }}">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger mt-3">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            @if (!isset($showData))
                <div class="col-6">
                    <?php $i = 1; ?>
                    @foreach ($showAllData as $sdata)
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
                    @endforeach
                </div>

            @endif

        </div>
    </div>
@stop
