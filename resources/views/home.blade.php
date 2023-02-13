<x-layout>
   <div class="main-page">
    @if(session('success'))
     <div class="alert alert-success text-center">{{session('success')}}</div>
    @endif
    <section class="container">
        <div class="row">
            <div class="main-card">
        <div class="col-md-8 mx-auto ">
           <x-card-wrapper class="border border-rounded">
                <h3 class="text-center text-primary my-3 pb-3">To-Do-List-App</h3>
                    <a href="/register" class="btn btn-primary">Sign Up</a>              
                 <h6 class="text-secondary mt-3">Already Have An Account ?</h6>
             <a href='/login' class="btn btn-outline-primary">Log in</a>
           </x-card-wrapper>         
        </div>
    </div>
    </div>
    </section>
   </div>
</x-layout>
 