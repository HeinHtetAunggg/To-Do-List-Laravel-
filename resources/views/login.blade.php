<x-layout>
<div class="container">
    @if(session('error'))
<div class="alert alert-danger text-center">{{session('error')}}</div>
    @endif
    <div class="row">
        <div class="mt-4">
        <h3 class="text-primary text-center">Log In Form</h3>
        <div class="col-md-10 mx-auto">
           <x-card-wrapper>
            <form action="/login" method="POST">
            @csrf
            <x-form.input name="email" type="email"/>
            <x-form.input name="password" type="password"/>
            <button type="submit" class="btn btn-primary">Log In</button>
            <h6 class="text-secondary mt-3">Dont' have an account?</h6>
            <a href="/register" class="btn btn-outline-primary">Sign Up</a>
        </form>
           </x-card-wrapper>
        </div>
    </div>
    </div>
</div>

</x-layout>