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