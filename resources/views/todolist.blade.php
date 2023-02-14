<x-layout>
<section class="container">
    @if(session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    @endif
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-center">
            <div class="card-header "><h4 class="text-primary">User Profile</h4></div>
            <div class="card-body">
                <img src='{{asset("/storage/$user->avatar")}}' alt="" class="card-img-top">
                <div class="card-title mt-3">Username - <b>{{$user->username}}</b></div>
                <hr/>
                <p class="card-text">Email - <b>{{$user->email}}</b></p>
                <hr/>
                <div class="d-flex justify-content-around">
                <a href="/users/{{$user->username}}/edit" class="btn btn-primary">Edit Profile</a>
                <form action="/logout" method="POST">
                    @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
            </div>
            <div class="card-footer text-muted">Current Date - {{date('F j, Y')}}</div>
        </div>
        </div>
        <div class="col-md-8">
           <form action="/users/{{$user->username}}/taskinput" method="POST">
            @csrf
            <div class="d-flex justify-content-between">
            <input type="text" name="body" class="form-control border border-primary" placeholder="Enter Your Task...." autofocus="on">
            <button type="submit" class="input-group-text bg-primary">Submit</button>
            </div>
        </form>
            <div class="mt-4">
            <ul class="list-group">
                @foreach ($taskinputs as $taskinput)
                <form action="/users/{{$user->username}}/taskinputs/{{$taskinput->body}}/delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <li class="list-group-item d-flex justify-content-between">{{$taskinput->body}} <button type="submit" class="btn btn-warning ">Mark As Done</button></li>  
                 </form>  
                @endforeach
            </ul>
            </div>
            </div>
    
    </div>
</section>

</x-layout>