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