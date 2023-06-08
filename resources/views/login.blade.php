<x-homepage>
    <div class="main-container min-h-screen text-black dark:text-white-dark">
        <!-- start main content section -->
        <div class="flex min-h-screen items-center justify-center bg-[url('../images/map.svg')] bg-cover bg-center dark:bg-[url('../images/map-dark.svg')]">
            <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                <h2 class="mb-3 text-2xl font-bold">Login</h2>
                <p class="mb-7">Enter your email and password to register</p>
                <form class="space-y-5" method="POST">
                    @csrf
                    <div>
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-input" placeholder="Enter Email" />
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-input" placeholder="Enter Password" />
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
            </div>
        </div>
        <!-- end main content section -->
    </div>
</x-homepage>