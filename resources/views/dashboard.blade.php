<x-dashboard_frame>
    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <!-- start sidebar section -->
        @include('components/dashboard_sidebar')
        <!-- end sidebar section -->

        <div class="main-content">
            <!-- start header section -->
            @include('components/dashboard_topbar')
            <!-- end header section -->



            <div class="animate__animated p-6" :class="[$store.app.animation]">
                <!-- start main content section -->
                <div>
                    <ul class="flex space-x-2 rtl:space-x-reverse">
                        <li>
                            <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
                        </li>
                        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                            <span>Home</span>
                        </li>
                    </ul>

                    <div class="mb-5">
                        <div class="mx-auto mt-20 max-w-[1140px] dark:text-white-dark">
                            <div class="justify-between space-y-14 rtl:space-x-reverse md:flex md:space-y-0 md:space-x-4">
                                
                                <div class="group rounded border border-[#e0e6ed] transition-all duration-300 dark:border-[#1b2e4b]">
                                    <div class="border-b border-[#e0e6ed] p-5 pt-0 dark:border-[#1b2e4b]">
                                        <span
                                            class="-mt-[30px] flex h-[70px] w-[70px] items-center justify-center rounded border-2 border-primary bg-white text-xl font-bold text-[#3b3f5c] shadow-[0_0_15px_1px_rgba(113,106,202,0.20)] transition-all duration-300 group-hover:-translate-y-[10px] dark:bg-[#0e1726] dark:text-white-light lg:h-[100px] lg:w-[100px] lg:text-3xl"
                                            >{{ $noteCount }}</span
                                        >
                                        <h3 class="mt-4 mb-2.5 text-xl lg:text-2xl">Saved Notes</h3>
                                        <p class="text-[15px]">Empower your ideas, unleash your productivity.</p>
                                        <a href="/savednotes" class="btn btn-outline-primary btn-sm" style="float: right;">view notes</a>
                                        <br>
                                    </div>
                                    <div class="p-5">
                                        <div x-data="modal">
                                            <!-- button -->    
                                            <button type="button" class="btn btn-primary w-full" @click="toggle">Add New Note</button>
                                            
                                            <!-- modal --> 
                                            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'" style="padding-top: 10%">
                                                <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8">
                                                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                            <h5 class="font-bold text-lg">New Note</h5>
                                                        </div>

                                                        <div class="p-5">
                                                            <form method="POST" action="{{ route('saveNoteFunction') }}">
                                                                @csrf

                                                                <div class="mb-5">
                                                                    <label for="title">Title</label>
                                                                    <input id="title" name="title" type="text" placeholder="Enter Title" class="form-input" x-model="params.title" />
                                                                </div>
                                                                
                                                                <div class="mb-5">
                                                                    <label for="desc">Description</label>
                                                                    <textarea name="description"  id="desc"  rows="3" class="form-textarea min-h-[130px] resize-none" placeholder="Enter Description" x-model="params.description" ></textarea>
                                                                </div>
                                                                
                                                                <div class="flex justify-end items-center mt-8">
                                                                    <button type="button" class="btn btn-outline-danger" @click="toggle">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Proceed</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="group rounded border border-[#e0e6ed] transition-all duration-300 dark:border-[#1b2e4b]">
                                    <div class="border-b border-[#e0e6ed] p-5 pt-0 dark:border-[#1b2e4b]">
                                        <span
                                            class="-mt-[30px] flex h-[70px] w-[70px] items-center justify-center rounded border-2 border-primary bg-white text-xl font-bold text-[#3b3f5c] shadow-[0_0_15px_1px_rgba(113,106,202,0.20)] transition-all duration-300 group-hover:-translate-y-[10px] dark:bg-[#0e1726] dark:text-white-light lg:h-[100px] lg:w-[100px] lg:text-3xl"
                                            >{{ $urlCount }}</span
                                        >
                                        <h3 class="mt-4 mb-2.5 text-xl lg:text-2xl">Shortened URLs</h3>
                                        <p class="text-[15px]">Shorten, share, succeed: Unlock the potential of compact links.</p>
                                        <a href="#" class="btn btn-outline-primary btn-sm" style="float: right;">view links</a>
                                        <br>
                                    </div>

                                    <div class="p-5">
                                        <div x-data="modal">
                                            <!-- button -->    
                                            <button type="button" class="btn btn-primary w-full" @click="toggle">Create new URL</button>
                                            
                                            <!-- modal --> 
                                            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'" style="padding-top: 10%">
                                                <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8">
                                                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                            <h5 class="font-bold text-lg">New URL</h5>
                                                        </div>
    
                                                        <div class="p-5">
                                                            <form method="POST" action="{{ route('saveurl') }}">

                                                                @csrf

                                                                <div class="mb-5">
                                                                    <label for="desc">Tag</label>
                                                                    <input id="title" name="tag" type="text" placeholder="Enter a tag" class="form-input" x-model="params.title" />
                                                                </div>

                                                                <div class="mb-5">
                                                                    <label for="title">Paste Long URL</label>
                                                                    <input id="title" name="main_url" type="text" placeholder="Enter Long URL" class="form-input" x-model="params.title" />
                                                                </div>
                                                                
                                                                <div class="flex justify-end items-center mt-8">
                                                                    <button type="button" class="btn btn-outline-danger" @click="toggle">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Proceed</button>
                                                                </div>
                                                            </form>
                                                        </div>
    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="group rounded border border-[#e0e6ed] transition-all duration-300 dark:border-[#1b2e4b]">
                                    <div class="border-b border-[#e0e6ed] p-5 pt-0 dark:border-[#1b2e4b]">
                                        <span
                                            class="-mt-[30px] flex h-[70px] w-[70px] items-center justify-center rounded border-2 border-primary bg-white text-xl font-bold text-[#3b3f5c] shadow-[0_0_15px_1px_rgba(113,106,202,0.20)] transition-all duration-300 group-hover:-translate-y-[10px] dark:bg-[#0e1726] dark:text-white-light lg:h-[100px] lg:w-[100px] lg:text-3xl"
                                            >0</span
                                        >
                                        <h3 class="mt-4 mb-2.5 text-xl lg:text-2xl">Uploaded Files</h3>
                                        <p class="text-[15px]">Secure your files, elevate your digital storage.</p>
                                        <a href="/savednotes" class="btn btn-outline-primary btn-sm" style="float: right;">view files</a>
                                        <br>
                                    </div>

                                    <div class="p-5">
                                        <div x-data="modal">
                                            <!-- button -->    
                                            <button type="button" class="btn btn-primary w-full" @click="toggle">Upload a file</button>
                                            
                                            <!-- modal --> 
                                            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'" style="padding-top: 10%">
                                                <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8">
                                                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                            <h5 class="font-bold text-lg">File Upload</h5>
                                                        </div>
    
                                                        <div class="p-5">
                                                            <form method="POST" action="" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="mb-5">
                                                                    <label for="title">Tag</label>
                                                                    <input id="title" name="title" type="text" placeholder="Enter tag" class="form-input" x-model="params.title" />
                                                                </div>
                                                                
                                                                <div class="mb-5">
                                                                    <label for="desc">Description</label>
                                                                    <input type="file" name="user-image" class="form-input custom-file-container" required>
                                                                    {{-- <input type="text"  class="form-input" required /> --}}
                                                                </div>
                                                                
                                                                <div class="flex justify-end items-center mt-8">
                                                                    <button type="button" class="btn btn-outline-danger" @click="toggle">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Proceed</button>
                                                                </div>
                                                            </form>
                                                        </div>
    
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
                        </div>
                    </div>
                    <template x-if="codeArr.includes('code3')">
                        <pre class="code overflow-auto rounded-md !bg-[#191e3a] p-4 text-white">
                            &lt;!-- animated --&gt;
                            &lt;div class=&quot;max-w-[1140px] mx-auto mt-20 dark:text-white-dark&quot;&gt;
                                &lt;!-- freelancer --&gt;
                                &lt;div class=&quot;md:flex justify-between space-y-14 md:space-y-0 md:space-x-4 rtl:space-x-reverse&quot;&gt;
                                    &lt;div class=&quot;border border-[#e0e6ed] dark:border-[#1b2e4b] rounded transition-all duration-300 group&quot;&gt;
                                        &lt;div class=&quot;border-b border-[#e0e6ed] dark:border-[#1b2e4b] p-5 pt-0&quot;&gt;
                                            &lt;span class=&quot;bg-white dark:bg-[#0e1726] text-[#3b3f5c] dark:text-white-light border-2 border-primary w-[70px] h-[70px] lg:w-[100px] lg:h-[100px] rounded flex justify-center items-center text-xl lg:text-3xl font-bold -mt-[30px] shadow-[0_0_15px_1px_rgba(113,106,202,0.20)] transition-all duration-300 group-hover:-translate-y-[10px]&quot;&gt;$49&lt;/span&gt;
                                            &lt;h3 class=&quot;text-xl lg:text-2xl mt-4 mb-2.5&quot;&gt;Freelancer&lt;/h3&gt;
                                            &lt;p class=&quot;text-[15px] &quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit.&lt;/p&gt;
                                        &lt;/div&gt;
                                        &lt;div class=&quot;p-5&quot;&gt;
                                            &lt;ul class=&quot;space-y-2.5 mb-5 font-semibold&quot;&gt;
                                                &lt;li&gt;Support forum&lt;/li&gt;
                                                &lt;li&gt;Free hosting&lt;/li&gt;
                                                &lt;li&gt;2 hours of support&lt;/li&gt;
                                                &lt;li&gt;5GB of storage space&lt;/li&gt;
                                            &lt;/ul&gt;
                                            &lt;a href=&quot;#&quot; target=&quot;_self&quot; class=&quot;btn btn-primary block&quot;&gt;Buy Now&lt;/a&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;

                                    &lt;!-- small business --&gt;
                                    &lt;div class=&quot;border border-[#e0e6ed] dark:border-[#1b2e4b] rounded transition-all duration-300 group&quot;&gt;
                                        &lt;div class=&quot;border-b border-[#e0e6ed] dark:border-[#1b2e4b] p-5 pt-0&quot;&gt;
                                            &lt;span class=&quot;bg-white dark:bg-[#0e1726] text-[#3b3f5c] dark:text-white-light border-2 border-primary w-[70px] h-[70px] lg:w-[100px] lg:h-[100px] rounded flex justify-center items-center text-xl lg:text-3xl font-bold -mt-[30px] shadow-[0_0_15px_1px_rgba(113,106,202,0.20)] transition-all duration-300 group-hover:-translate-y-[10px]&quot;&gt;$89&lt;/span&gt;
                                            &lt;h3 class=&quot;text-xl lg:text-2xl mt-4 mb-2.5&quot;&gt;Small business&lt;/h3&gt;
                                            &lt;p class=&quot;text-[15px] &quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit.&lt;/p&gt;
                                        &lt;/div&gt;
                                        &lt;div class=&quot;p-5&quot;&gt;
                                            &lt;ul class=&quot;space-y-2.5 mb-5 font-semibold&quot;&gt;
                                                &lt;li&gt;Unlimited calls&lt;/li&gt;
                                                &lt;li&gt;Free hosting&lt;/li&gt;
                                                &lt;li&gt;10 hours of support&lt;/li&gt;
                                                &lt;li&gt;10GB of storage space&lt;/li&gt;
                                            &lt;/ul&gt;
                                            &lt;a href=&quot;#&quot; target=&quot;_self&quot; class=&quot;btn btn-primary block&quot;&gt;Buy Now&lt;/a&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;

                                    &lt;!-- larger business --&gt;
                                    &lt;div class=&quot;border border-[#e0e6ed] dark:border-[#1b2e4b] rounded transition-all duration-300 group&quot;&gt;
                                        &lt;div class=&quot;border-b border-[#e0e6ed] dark:border-[#1b2e4b] p-5 pt-0&quot;&gt;
                                            &lt;span class=&quot;bg-white dark:bg-[#0e1726] text-[#3b3f5c] dark:text-white-light border-2 border-primary w-[70px] h-[70px] lg:w-[100px] lg:h-[100px] rounded flex justify-center items-center text-xl lg:text-3xl font-bold -mt-[30px] shadow-[0_0_15px_1px_rgba(113,106,202,0.20)] transition-all duration-300 group-hover:-translate-y-[10px]&quot;&gt;$129&lt;/span&gt;
                                            &lt;h3 class=&quot;text-xl lg:text-2xl mt-4 mb-2.5&quot;&gt;Larger business&lt;/h3&gt;
                                            &lt;p class=&quot;text-[15px]&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit.&lt;/p&gt;
                                        &lt;/div&gt;
                                        &lt;div class=&quot;p-5&quot;&gt;
                                            &lt;ul class=&quot;space-y-2.5 mb-5 font-semibold&quot;&gt;
                                                &lt;li&gt;Unlimited calls&lt;/li&gt;
                                                &lt;li&gt;Free hosting&lt;/li&gt;
                                                &lt;li&gt;Unlimited hours of support&lt;/li&gt;
                                                &lt;li&gt;1TB of storage space&lt;/li&gt;
                                            &lt;/ul&gt;
                                            &lt;a href=&quot;#&quot; target=&quot;_self&quot; class=&quot;btn btn-primary block&quot;&gt;Buy Now&lt;/a&gt;
                                        &lt;/div&gt;
                                    &lt;/div&gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                            </pre>
                    </template>
                </div>
                <!-- end main content section -->

                <!-- start footer section -->
                {{-- @include('components/dashboard_footer') --}}
                <!-- end footer section -->
            </div>



        </div>
    </div>
</x-dashboard_frame>