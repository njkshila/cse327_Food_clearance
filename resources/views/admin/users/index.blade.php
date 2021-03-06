@extends("layouts.admin")

@section("content")
    <div class="is-box">
        <h1 class="title">List of Users</h1>
    
        <a href="{{ url("admin/users/create") }}" class="button is-outlined">Create</a>
    
        <hr>
    
        <table class="table is-striped is-fullwidth">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Type</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
                @foreach($entries as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->type }}</td>
                        <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                        <td>{{ Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}</td>
                        <td>
                            <form action="{{ url("admin/users/" . $user->id) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                
                                <div class="field is-grouped">
                                    <p class="control">
                                        <a class="button is-outlined" href="{{ url("admin/users/" . $user->id . "/edit") }}">Edit</a>
                                    </p>
                                    <p class="control">
                                        <input type="submit" class="button is-outlined is-danger" }} value="Delete" onclick="return confirm('Are you sure?')"/>
                                    </p>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection