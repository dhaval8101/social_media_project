
    <main class="main-content  mt-0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Register Form </h5>
                        </div>
                  
                        <div class="card-body">
                            <form method="POST" action="/update">
                                @csrf
                                
                                        <input type="hidden" name="id" value={{$user['id']}}>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="name" aria-label="Name"  value={{$user['name']}} >
                                    @error('name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value={{$user['email']}} >
                                    @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" value={{$user['password']}}>
                                    @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                 <div class="flex flex-col mb-3">
                                    <input type="text" name="address" class="form-control" placeholder="Address" aria-label="Address" value={{$user['address']}}>
                                </div>
                                     <div class="flex flex-col mb-3">
                                    <input type="number" name="phone" class="form-control" placeholder="Phone Number" aria-label="Phone" value={{$user['phone']}} >
                                </div>
                                     <div class="flex flex-col mb-3">
                                    <input type="text" name="city" class="form-control" placeholder="city" aria-label="City" value={{$user['city']}} >
                                </div>
                                      <div class="flex flex-col mb-3">
                                    <input type="number" name="pin_code" class="form-control" placeholder="pin code" aria-label="Pin_code" value={{$user['pin_c']}}>
                                </div>
                                <div class="form-check form-check-info text-start">
                                    <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault" >
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and
                                            Conditions</a>
                                    </label>
                                    @error('terms') <p class='text-danger text-xs'> {{ $message }} </p> @enderror
                                </div>
                                <div class="text-center">
                              <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}"
                                        class="text-dark font-weight-bolder">Sign in</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
