<div class="container">
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <h1>Pets list</h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pets as $pet)
                    <tr>
                        <td>{{$pet->id}}</td>
                        <td>{{$pet->name}}</td>
                        <td>{{$pet->created_at}}</td>
                        <td>{{$pet->updated_at}}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a  type="button" class="btn btn-success mx-1" href="{{url('pets/' . $pet->id)}}" role="button">Show</a>
                                <a  type="button" class="btn btn-primary mx-1" href="{{url('pets/' . $pet->id . '/edit')}}" role="button">Edit</a>
                                <form action="{{url('pets/' . $pet->id) .'/soft-delete'}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mx-1">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$pets->links()}}
        </div>
    </div>
</div>

