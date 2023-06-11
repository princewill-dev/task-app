<x-homepage>
    <div class="main-container min-h-screen text-black dark:text-white-dark">
        <!-- start main content section -->

        <div class="flex min-h-screen items-center justify-center bg-[url('../images/map.svg')] bg-cover bg-center dark:bg-[url('../images/map-dark.svg')]">
            
            <div class="panel m-6 w-full max-w-lg sm:w-[480px]">

                <center>
                    @if (session()->has('success'))
                    <span class="mb-2 alert alert-success shadow-sm" style="color: green;">{{session('success')}}</span>
                    @endif
              
                    @if (session()->has('faliure'))
                    <span class="mb-2 alert alert-danger shadow-sm" style="color: red;">{{session('faliure')}}</span>
                    @endif
                </center>

                <h2 class="mb-3 text-2xl font-bold">Login</h2>
                <p class="mb-7">Enter your email and password to register</p>
                <form class="space-y-5" method="POST" action="loginFunction">
                    @csrf
                    <div>
                        <label for="email">Email</label>
                        <input name="email" id="email" type="email" class="form-input" placeholder="Enter Email" value="{{ old('email') }}" />
                        @error('email')
                            <span class="mb-0 small alert alert-danger shadow-dm" style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input name="password" id="password" type="password" class="form-input" placeholder="Enter Password" />
                        @error('password')
                            <span class="mb-0 small alert alert-danger shadow-dm" style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-full">Login</button>
                </form>
                <div
                    class="relative my-7 h-5 text-center before:absolute before:inset-0 before:m-auto before:h-[1px] before:w-full before:bg-[#ebedf2] dark:before:bg-[#253b5c]"
                >
                    <div class="relative z-[1] inline-block bg-white px-2 font-bold text-white-dark dark:bg-[#0e1726]"><span>OR</span></div>
                </div>
                
                <p class="text-center">
                    Don't have an account ? <a href="/signup" class="font-bold text-primary hover:underline">Sign up</a>
                </p>
                <br>
                <div class="text-center">
                    <a href="/" class="font-bold text-primary hover:underline">Home</a>
                </div>
            </div>
        </div>
        <!-- end main content section -->
    </div>
</x-homepage>