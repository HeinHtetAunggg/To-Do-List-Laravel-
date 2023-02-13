<x-layout>
    <section class="container">
        <div class="row">
            <h2 class="text-center text-primary fw-bold mt-3">Register Form</h2>
            <div class="col-md-10 mx-auto mt-4">
                  <x-card-wrapper>
    <form action="/register" method="POST" enctype="multipart/form-data">
        @csrf
       <x-form.input name="username"/>
       <x-form.input name="email" type="email"/>
       <x-form.input name="password" type="password"/>
        <x-form.input name="thumbnail" type="file"/>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="checking" required>
          <label class="form-check-label" for="checking">I have read and agree to the terms and conditions </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/" class="btn btn-danger">Go Back</a>
      </form>
                  </x-card-wrapper>
    </div>
    </div>
</div>
    </section>

</x-layout>