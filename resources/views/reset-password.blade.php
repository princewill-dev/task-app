<x-homepage>
    <div class="main-container min-h-screen text-black dark:text-white-dark">
        <!-- start main content section -->
        <div class="flex min-h-screen items-center justify-center bg-[url('../images/map.svg')] bg-cover bg-center dark:bg-[url('../images/map-dark.svg')]">
            <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                <h2 class="mb-3 text-2xl font-bold">Password Reset</h2>
                <p class="mb-7">Enter your email to recover your ID</p>
                <form class="space-y-5" method="POST" action="{{ route('resetPassword') }}">
                    @csrf
                    <div>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" class="form-input" placeholder="Enter Email" />
                    </div>
                    <button type="submit" class="btn btn-primary w-full">RECOVER</button>
                </form>
            </div>
        </div>
        <!-- end main content section -->
    </div>
</x-homepage>