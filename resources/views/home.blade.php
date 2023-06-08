<x-homepage>

    <div class="main-container min-h-screen text-black dark:text-white-dark">
        <!-- start main content section -->
        <div class="flex min-h-screen items-center justify-center bg-[url('../images/map.svg')] bg-cover bg-center dark:bg-[url('../images/map-dark.svg')]">
            <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                <h2 class="mb-3 text-2xl font-bold">Welcome to TASKER</h2>
                <p class="mb-7">A modern web application that helps you manage your daily activities efficiently</p>

                <div class="" style="display: flex; justify-content: space-evenly; flex-wrap:wrap;">
                    <div x-data="modal">
                        <!-- button -->    
                        <button type="button" class="btn btn-primary mt-6" @click="toggle">Task Manager</button>
                        
                        <!-- modal --> 
                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8">
                                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <h5 class="font-bold text-lg">Task Manager</h5>
                                    </div>
                                    <div class="p-5">
                                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                            <p>Streamline your workflow, prioritize with precision, and conquer deadlines with ease. Experience a new level of control and organization as you conquer your to-do list effortlessly. Revolutionize your productivity with our task management website and unlock your true potential.</p>
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger" @click="toggle">Back</button>
                                            <a href="/signup" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Proceed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- large -->
                    <div x-data="modal">
                        <!-- button -->
                        <button type="button" class="btn btn-primary mt-6" @click="toggle">URL Shortener</button>
                        
                        <!-- modal --> 
                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8">
                                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <h5 class="font-bold text-lg">URL Shortener</h5>
                                    </div>
                                    <div class="p-5">
                                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                            <p>Say goodbye to long and cumbersome URLs and hello to sleek and shareable links. Our platform provides you with a hassle-free way to shorten your URLs, making them more manageable and easier to share across various platforms. Whether you're sharing links on social media, sending them via email, or just want a cleaner URL for your website, our URL shortener offers convenience and efficiency.</p>
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger" @click="toggle">Back</button>
                                            <a href="/comingsoon" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Proceed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- small -->
                    <div x-data="modal">
                        <!-- button -->
                        <button type="button" class="btn btn-primary mt-6" @click="toggle">File Saver</button>
                            
                        <!-- modal --> 
                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8">
                                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                        <h5 class="font-bold text-lg">File Saver</h5>
                                    </div>
                                    <div class="p-5">
                                        <div class="dark:text-white-dark/70 text-base font-medium text-[#1f2937]">
                                            <p>With our intuitive platform, you can effortlessly upload, store, and access your files from anywhere, anytime. Whether it's documents, images, videos, or any other file type, our robust file saver ensures your data is protected and readily available.</p>
                                        </div>
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger" @click="toggle">Back</button>
                                            <a href="/comingsoon" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Proceed</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- script -->
                    <script>
                        document.addEventListener("alpine:init", () => {
                            Alpine.data("modal", (initialOpenState = false) => ({
                                open: initialOpenState,
                    
                                toggle() {
                                    this.open = !this.open;
                                },
                            }));
                        });
                    </script>
                </div>

                <br>
                <br>
                <hr>
                <br>
                <p class="text-center"> Already have an account ? <a href="/login" class="font-bold text-primary hover:underline">Sign in</a>
                </p>
            </div>

            
        </div>

    </div>

</x-homepage>