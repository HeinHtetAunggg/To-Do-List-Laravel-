<x-layout>
    <section class="container">
        <div class="row">
            <h2 class="text-center text-primary fw-bold mt-3">Edit Form</h2>
            <div class="col-md-10 mx-auto mt-4">
                  <x-card-wrapper>
    <form action="/users/{{$user->username}}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
       <x-form.input name="username" value="{{$user->username}}"/>
       <x-form.input name="email" type="email" value="{{$user->email}}"/>
        <x-form.input name="thumbnail" type="file"/>
        <img src="/storage/{{$user->avatar}}" width="100" height="100" alt="">
        <div class="mt-4">
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/" class="btn btn-danger">Go Back</a>
        </div>
      </form>
    </x-card-wrapper>
    </div>
    </div>
</div>
    </section>

</x-layout>