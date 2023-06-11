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

                <div x-data="scrumboard">
                    <div>
                        
                        <div x-data="modal">
                            <button type="button" class="btn btn-primary flex" @click="toggle">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24px"
                                    height="24px"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="h-5 w-5 ltr:mr-3 rtl:ml-3"
                                >
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Create a new note
                            </button>
                            
                            <!-- modal --> 
                            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'" style="padding-top: 10%">
                                <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8">
                                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                            <h5 class="font-bold text-lg">New Note</h5>
                                        </div>

                                        <div class="p-5">
                                            <form method="POST" action="saveNoteFunction">
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

                    <br>

                    <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
                        <div class="py-7 px-6">
                            <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">CLI Based</h5>
                            <p class="text-white-dark">Etiam sed augue ac justo tincidunt posuere. Vivamus euismod eros, nec risus malesuada.</p>
                            {{-- <button type="button" class="btn btn-primary mt-6">Explore More</button> --}}
                            <br>
                            <div class="flex items-center justify-between">
                                
                                <div class="flex items-center">
                                    

                                    <div x-data="modal">

                                        <button type="button" class="hover:text-info" @click="toggle">
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 ltr:mr-3 rtl:ml-3" >
                                                <path
                                                    opacity="0.5"
                                                    d="M22 10.5V12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2H13.5"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                />
                                                <path
                                                    d="M17.3009 2.80624L16.652 3.45506L10.6872 9.41993C10.2832 9.82394 10.0812 10.0259 9.90743 10.2487C9.70249 10.5114 9.52679 10.7957 9.38344 11.0965C9.26191 11.3515 9.17157 11.6225 8.99089 12.1646L8.41242 13.9L8.03811 15.0229C7.9492 15.2897 8.01862 15.5837 8.21744 15.7826C8.41626 15.9814 8.71035 16.0508 8.97709 15.9619L10.1 15.5876L11.8354 15.0091C12.3775 14.8284 12.6485 14.7381 12.9035 14.6166C13.2043 14.4732 13.4886 14.2975 13.7513 14.0926C13.9741 13.9188 14.1761 13.7168 14.5801 13.3128L20.5449 7.34795L21.1938 6.69914C22.2687 5.62415 22.2687 3.88124 21.1938 2.80624C20.1188 1.73125 18.3759 1.73125 17.3009 2.80624Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                />
                                                <path
                                                    opacity="0.5"
                                                    d="M16.6522 3.45508C16.6522 3.45508 16.7333 4.83381 17.9499 6.05034C19.1664 7.26687 20.5451 7.34797 20.5451 7.34797M10.1002 15.5876L8.4126 13.9"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                />
                                            </svg>
                                        </button>
                                        
                                        
                                        <!-- modal --> 
                                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'" style="padding-top: 10%">
                                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                                <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8">
                                                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                        <h5 class="font-bold text-lg">Edit Note</h5>
                                                    </div>
            
                                                    <div class="p-5">
                                                        <form method="POST" action="saveNoteFunction">
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
                                    


                                    <div x-data="modal">
                                        
                                        <button type="button" class="hover:text-danger" @click="toggle"">
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5">
                                                <path
                                                    opacity="0.5"
                                                    d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                ></path>
                                                <path
                                                    d="M20.5001 6H3.5"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                ></path>
                                                <path
                                                    d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                ></path>
                                                <path
                                                    opacity="0.5"
                                                    d="M9.5 11L10 16"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                ></path>
                                                <path
                                                    opacity="0.5"
                                                    d="M14.5 11L14 16"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                ></path>
                                            </svg>
                                        </button>
                                        
                                        <!-- modal --> 
                                        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'" style="padding-top: 10%">
                                            <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                                <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8">
                                                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                                        <h5 class="font-bold text-lg">Delete Note</h5>
                                                    </div>
            
                                                    <div class="p-5">
                                                        <form method="POST" action="saveNoteFunction">
                                                            @csrf
                                                            <p>Are you sure you want to delete this note?</p>
                                                            
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
                <!-- end main content section -->
            </div>

        </div>
    </div>
</x-dashboard_frame>