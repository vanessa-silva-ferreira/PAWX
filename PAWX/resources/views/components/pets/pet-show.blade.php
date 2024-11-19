<div class="container mt-5">
    <h2 class="mb-4"><i class="bi bi-door-closed"></i> Showing information of '{{$pet->name}}'</h2>

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text">Category</span>
        </div>
        <input type="text" class="form-control" readonly value="{{$pet->name}}">
    </div>

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text">Created</span>
        </div>
        <input type="text" class="form-control" readonly value="{{$pet->created_at->format('Y-m-d')}}">
    </div>

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text">Updated</span>
        </div>
        <input type="text" class="form-control" readonly value="{{$pet->updated_at->format('Y-m-d')}}">
    </div>

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text">Deleted</span>
        </div>
        <input type="text" class="form-control" readonly
               value="{{ isset($pet->deleted_at) ? $pet->deleted_at->format('Y-m-d') : 'Not deleted anytime' }}">
    </div>

    <div class="d-flex mt-3">
        <a type="button" class="btn btn-primary flex-grow-1 mr-3" href="{{ url('/pets') }}">
            <i class="bi bi-arrow-return-left"></i> Exit to List
        </a>
        <form action="{{ url('pets/' . $pet->id . '/soft-delete') }}" method="POST" class="flex-grow-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100">
                <i class="bi bi-trash3"></i> Delete
            </button>
        </form>
    </div>
</div>
