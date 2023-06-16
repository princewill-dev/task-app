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
                                Create a new link
                            </button>
                            
                            <!-- modal --> 
                            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'" style="padding-top: 10%">
                                <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                                    <div x-show="open" x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden  w-full max-w-sm my-8">
                                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                                            <h5 class="font-bold text-lg">New Link</h5>
                                        </div>

                                        <div class="p-5">
                                            <form method="POST" action="{{ route('saveUrlFromViews') }}">
                                                @csrf

                                                <div class="mb-5">
                                                    <label for="title">Tag</label>
                                                    <input id="title" name="tag" type="text" placeholder="Enter Title" class="form-input" />
                                                </div>
                                                
                                                <div class="mb-5">
                                                    <label for="desc">Paste Long URL</label>
                                                    <textarea name="main_url"  id="desc"  rows="3" class="form-textarea min-h-[130px] resize-none" placeholder="Paste Long URL" ></textarea>
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


                    <div class="" style="display: flex; flex-wrap:wrap;">
                        @foreach ($urls as $url)


                            <div class="max-w-[19rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none" style="margin: 3px;">
                                <div class="py-7 px-6">
                                    <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light">Tag: {{ $url->tag }}</h5>
                                    <hr>
                                    <br>
                                    <label for="desc">Long link: </label>
                                    <textarea disabled name="description"  id="desc"  rows="3" class="form-textarea min-h-[70px] resize-none" placeholder="Long Link">{{ $url->main_url }}</textarea>
                                    <br>
                                    <br>
                                    <p class="text-dark" style="padding: 5px; font-weight: bold;">Short Link: task.princewilldev.com/{{ $url->shortcode }}</p>
                                    <br>
                                    <hr>
                                    <br>
                                    <div class="flex items-center justify-between">
                                        
                                        <div class="flex items-center">                                           
        
        
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
                                                                <form method="POST" action="{{ route('deleteUrl', $url) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <p>Are you sure you want to delete this note?</p>
                                                                    
                                                                    <div class="flex justify-end items-center mt-8">
                                                                        <button type="button" class="btn btn-outline-danger" @click="toggle">Cancel</button>
                                                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" >Yes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <p id="text-to-copy" style="display: none;">task.princewilldev.com/{{ $url->shortcode }}</p>

                                            <span class="copy-button" onclick="copyToClipboard('text-to-copy')" style="cursor: pointer; color: blue; text-decoration: underline; border: 2px solid blue; padding: 0px 10px; margin-left: 15px;">Copy</span>

                                            <script>
                                                function copyToClipboard(elementId) {
                                                    const textElement = document.getElementById(elementId);
                                                    const text = textElement.textContent;
                                        
                                                    const textField = document.createElement('textarea');
                                                    textField.innerText = text;
                                        
                                                    document.body.appendChild(textField);
                                                    textField.select();
                                                    document.execCommand('copy');
                                                    document.body.removeChild(textField);
                                        
                                                    // Optional: Provide visual feedback
                                                    const copyButton = document.querySelector('.copy-button');
                                                    copyButton.textContent = 'Copied!';
                                                    setTimeout(() => {
                                                        copyButton.textContent = 'Copy';
                                                    }, 2000);
                                                }
                                            </script>

                                            

        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        @endforeach
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