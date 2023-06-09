<x-dashboard>
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
                <div x-data="todolist">
                    <div class="relative flex h-full gap-5 sm:h-[calc(100vh_-_150px)]">
                        <div
                            class="panel absolute z-10 hidden h-full w-[240px] max-w-full flex-none space-y-4 p-4 ltr:rounded-r-none rtl:rounded-l-none xl:relative xl:block xl:h-auto ltr:xl:rounded-r-md rtl:xl:rounded-l-md"
                            :class="{'!block':isShowTaskMenu}"
                        >
                            <div class="flex h-full flex-col pb-16">
                                <div class="pb-5">
                                    <div class="flex items-center text-center">
                                        <div class="shrink-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                <path
                                                    opacity="0.5"
                                                    d="M16 4.00195C18.175 4.01406 19.3529 4.11051 20.1213 4.87889C21 5.75757 21 7.17179 21 10.0002V16.0002C21 18.8286 21 20.2429 20.1213 21.1215C19.2426 22.0002 17.8284 22.0002 15 22.0002H9C6.17157 22.0002 4.75736 22.0002 3.87868 21.1215C3 20.2429 3 18.8286 3 16.0002V10.0002C3 7.17179 3 5.75757 3.87868 4.87889C4.64706 4.11051 5.82497 4.01406 8 4.00195"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                />
                                                <path d="M8 14H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M7 10.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9 17.5H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                <path
                                                    d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                />
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-semibold ltr:ml-3 rtl:mr-3">Todo list</h3>
                                    </div>
                                </div>
                                <div class="mb-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                                <div class="perfect-scrollbar relative -mr-3.5 h-full grow pr-3.5">
                                    <div class="space-y-1">
                                        <button
                                            type="button"
                                            class="flex h-10 w-full items-center justify-between rounded-md p-2 font-medium hover:bg-white-dark/10 hover:text-primary dark:hover:bg-[#181F32] dark:hover:text-primary"
                                            :class="{ 'bg-gray-100 dark:text-primary text-primary dark:bg-[#181F32]': selectedTab === '' }"
                                            @click="tabChanged('')"
                                        >
                                            <div class="flex items-center">
                                                <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4.5 w-4.5 shrink-0"
                                                >
                                                    <path
                                                        d="M2 5.5L3.21429 7L7.5 3"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                    <path
                                                        opacity="0.5"
                                                        d="M2 12.5L3.21429 14L7.5 10"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                    <path
                                                        d="M2 19.5L3.21429 21L7.5 17"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                    <path d="M22 19L12 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path opacity="0.5" d="M22 12L12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M22 5L12 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <div class="ltr:ml-3 rtl:mr-3">Inbox</div>
                                            </div>
                                            <div
                                                class="whitespace-nowrap rounded-md bg-primary-light py-0.5 px-2 font-semibold dark:bg-[#060818]"
                                                x-text="allTasks && allTasks.filter((d) => d.status != 'trash').length"
                                            ></div>
                                        </button>
                                        <button
                                            type="button"
                                            class="flex h-10 w-full items-center justify-between rounded-md p-2 font-medium hover:bg-white-dark/10 hover:text-primary dark:hover:bg-[#181F32] dark:hover:text-primary"
                                            :class="{ 'bg-gray-100 dark:text-primary text-primary dark:bg-[#181F32]': selectedTab === 'complete' }"
                                            @click="tabChanged('complete')"
                                        >
                                            <div class="flex items-center">
                                                <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 shrink-0"
                                                >
                                                    <path
                                                        d="M20.9751 12.1852L20.2361 12.0574L20.9751 12.1852ZM20.2696 16.265L19.5306 16.1371L20.2696 16.265ZM6.93776 20.4771L6.19055 20.5417H6.19055L6.93776 20.4771ZM6.1256 11.0844L6.87281 11.0198L6.1256 11.0844ZM13.9949 5.22142L14.7351 5.34269V5.34269L13.9949 5.22142ZM13.3323 9.26598L14.0724 9.38725V9.38725L13.3323 9.26598ZM6.69813 9.67749L6.20854 9.10933H6.20854L6.69813 9.67749ZM8.13687 8.43769L8.62646 9.00585H8.62646L8.13687 8.43769ZM10.518 4.78374L9.79207 4.59542L10.518 4.78374ZM10.9938 2.94989L11.7197 3.13821L11.7197 3.13821L10.9938 2.94989ZM12.6676 2.06435L12.4382 2.77841L12.4382 2.77841L12.6676 2.06435ZM12.8126 2.11093L13.0419 1.39687L13.0419 1.39687L12.8126 2.11093ZM9.86194 6.46262L10.5235 6.81599V6.81599L9.86194 6.46262ZM13.9047 3.24752L13.1787 3.43584V3.43584L13.9047 3.24752ZM11.6742 2.13239L11.3486 1.45675L11.3486 1.45675L11.6742 2.13239ZM20.2361 12.0574L19.5306 16.1371L21.0086 16.3928L21.7142 12.313L20.2361 12.0574ZM13.245 21.25H8.59634V22.75H13.245V21.25ZM7.68497 20.4125L6.87281 11.0198L5.37839 11.149L6.19055 20.5417L7.68497 20.4125ZM19.5306 16.1371C19.0238 19.0677 16.3813 21.25 13.245 21.25V22.75C17.0712 22.75 20.3708 20.081 21.0086 16.3928L19.5306 16.1371ZM13.2548 5.10015L12.5921 9.14472L14.0724 9.38725L14.7351 5.34269L13.2548 5.10015ZM7.18772 10.2456L8.62646 9.00585L7.64728 7.86954L6.20854 9.10933L7.18772 10.2456ZM11.244 4.97206L11.7197 3.13821L10.2678 2.76157L9.79207 4.59542L11.244 4.97206ZM12.4382 2.77841L12.5832 2.82498L13.0419 1.39687L12.897 1.3503L12.4382 2.77841ZM10.5235 6.81599C10.8354 6.23198 11.0777 5.61339 11.244 4.97206L9.79207 4.59542C9.65572 5.12107 9.45698 5.62893 9.20041 6.10924L10.5235 6.81599ZM12.5832 2.82498C12.8896 2.92342 13.1072 3.16009 13.1787 3.43584L14.6306 3.05921C14.4252 2.26719 13.819 1.64648 13.0419 1.39687L12.5832 2.82498ZM11.7197 3.13821C11.7547 3.0032 11.8522 2.87913 11.9998 2.80804L11.3486 1.45675C10.8166 1.71309 10.417 2.18627 10.2678 2.76157L11.7197 3.13821ZM11.9998 2.80804C12.1345 2.74311 12.2931 2.73181 12.4382 2.77841L12.897 1.3503C12.3872 1.18655 11.8312 1.2242 11.3486 1.45675L11.9998 2.80804ZM14.1537 10.9842H19.3348V9.4842H14.1537V10.9842ZM14.7351 5.34269C14.8596 4.58256 14.824 3.80477 14.6306 3.0592L13.1787 3.43584C13.3197 3.97923 13.3456 4.54613 13.2548 5.10016L14.7351 5.34269ZM8.59634 21.25C8.12243 21.25 7.726 20.887 7.68497 20.4125L6.19055 20.5417C6.29851 21.7902 7.34269 22.75 8.59634 22.75V21.25ZM8.62646 9.00585C9.30632 8.42 10.0391 7.72267 10.5235 6.81599L9.20041 6.10924C8.85403 6.75767 8.30249 7.30493 7.64728 7.86954L8.62646 9.00585ZM21.7142 12.313C21.9695 10.8365 20.8341 9.4842 19.3348 9.4842V10.9842C19.9014 10.9842 20.3332 11.4959 20.2361 12.0574L21.7142 12.313ZM12.5921 9.14471C12.4344 10.1076 13.1766 10.9842 14.1537 10.9842V9.4842C14.1038 9.4842 14.0639 9.43901 14.0724 9.38725L12.5921 9.14471ZM6.87281 11.0198C6.84739 10.7258 6.96474 10.4378 7.18772 10.2456L6.20854 9.10933C5.62021 9.61631 5.31148 10.3753 5.37839 11.149L6.87281 11.0198Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        opacity="0.5"
                                                        d="M3.9716 21.4709L3.22439 21.5355L3.9716 21.4709ZM3 10.2344L3.74721 10.1698C3.71261 9.76962 3.36893 9.46776 2.96767 9.48507C2.5664 9.50239 2.25 9.83274 2.25 10.2344L3 10.2344ZM4.71881 21.4063L3.74721 10.1698L2.25279 10.299L3.22439 21.5355L4.71881 21.4063ZM3.75 21.5129V10.2344H2.25V21.5129H3.75ZM3.22439 21.5355C3.2112 21.383 3.33146 21.2502 3.48671 21.2502V22.7502C4.21268 22.7502 4.78122 22.1281 4.71881 21.4063L3.22439 21.5355ZM3.48671 21.2502C3.63292 21.2502 3.75 21.3686 3.75 21.5129H2.25C2.25 22.1954 2.80289 22.7502 3.48671 22.7502V21.2502Z"
                                                        fill="currentColor"
                                                    />
                                                </svg>
                                                <div class="ltr:ml-3 rtl:mr-3">Done</div>
                                            </div>
                                            <div
                                                class="whitespace-nowrap rounded-md bg-primary-light py-0.5 px-2 font-semibold dark:bg-[#060818]"
                                                x-text="allTasks && allTasks.filter((d) => d.status === 'complete').length"
                                            >
                                                2
                                            </div>
                                        </button>
                                        <button
                                            type="button"
                                            class="flex h-10 w-full items-center justify-between rounded-md p-2 font-medium hover:bg-white-dark/10 hover:text-primary dark:hover:bg-[#181F32] dark:hover:text-primary"
                                            :class="{ 'bg-gray-100 dark:text-primary text-primary dark:bg-[#181F32]': selectedTab === 'important' }"
                                            @click="tabChanged('important')"
                                        >
                                            <div class="flex items-center">
                                                <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 shrink-0"
                                                >
                                                    <path
                                                        d="M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                    />
                                                </svg>
                                                <div class="ltr:ml-3 rtl:mr-3">Important</div>
                                            </div>
                                            <div
                                                class="whitespace-nowrap rounded-md bg-primary-light py-0.5 px-2 font-semibold dark:bg-[#060818]"
                                                x-text="allTasks && allTasks.filter((d) => d.status === 'important').length"
                                            ></div>
                                        </button>
                                        <button
                                            type="button"
                                            class="flex h-10 w-full items-center justify-between rounded-md p-2 font-medium hover:bg-white-dark/10 hover:text-primary dark:hover:bg-[#181F32] dark:hover:text-primary"
                                            :class="{ 'bg-gray-100 dark:text-primary text-primary dark:bg-[#181F32]': selectedTab === 'trash' }"
                                            @click="tabChanged('trash')"
                                        >
                                            <div class="flex items-center">
                                                <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 shrink-0"
                                                >
                                                    <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path
                                                        d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                    />
                                                    <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                    <path
                                                        opacity="0.5"
                                                        d="M14.5 11L14 16"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                    />
                                                    <path
                                                        opacity="0.5"
                                                        d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                    />
                                                </svg>
                                                <div class="ltr:ml-3 rtl:mr-3">Trash</div>
                                            </div>
                                        </button>
                                        <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                                        <div class="px-1 py-3 text-white-dark">Tags</div>
                                        <button
                                            type="button"
                                            class="flex h-10 w-full items-center rounded-md p-1 font-medium text-success duration-300 hover:bg-white-dark/10 ltr:hover:pl-3 rtl:hover:pr-3 dark:hover:bg-[#181F32]"
                                            :class="{ 'ltr:pl-3 rtl:pr-3 bg-gray-100 dark:bg-[#181F32]': selectedTab === 'team' }"
                                            @click="tabChanged('team')"
                                        >
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3 w-3 shrink-0 rotate-45 fill-success"
                                            >
                                                <path
                                                    d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                />
                                            </svg>
                                            <div class="ltr:ml-3 rtl:mr-3">Team</div>
                                        </button>

                                        <button
                                            type="button"
                                            class="flex h-10 w-full items-center rounded-md p-1 font-medium text-warning duration-300 hover:bg-white-dark/10 ltr:hover:pl-3 rtl:hover:pr-3 dark:hover:bg-[#181F32]"
                                            :class="{ 'ltr:pl-3 rtl:pr-3 bg-gray-100 dark:bg-[#181F32]': selectedTab === 'low' }"
                                            @click="tabChanged('low')"
                                        >
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3 w-3 shrink-0 rotate-45 fill-warning"
                                            >
                                                <path
                                                    d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                />
                                            </svg>
                                            <div class="ltr:ml-3 rtl:mr-3">Low</div>
                                        </button>

                                        <button
                                            type="button"
                                            class="flex h-10 w-full items-center rounded-md p-1 font-medium text-primary duration-300 hover:bg-white-dark/10 ltr:hover:pl-3 rtl:hover:pr-3 dark:hover:bg-[#181F32]"
                                            :class="{ 'ltr:pl-3 rtl:pr-3 bg-gray-100 dark:bg-[#181F32]': selectedTab === 'medium' }"
                                            @click="tabChanged('medium')"
                                        >
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3 w-3 shrink-0 rotate-45 fill-primary"
                                            >
                                                <path
                                                    d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                />
                                            </svg>
                                            <div class="ltr:ml-3 rtl:mr-3">Medium</div>
                                        </button>

                                        <button
                                            type="button"
                                            class="flex h-10 w-full items-center rounded-md p-1 font-medium text-danger duration-300 hover:bg-white-dark/10 ltr:hover:pl-3 rtl:hover:pr-3 dark:hover:bg-[#181F32]"
                                            :class="{ 'ltr:pl-3 rtl:pr-3 bg-gray-100 dark:bg-[#181F32]': selectedTab === 'high' }"
                                            @click="tabChanged('high')"
                                        >
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3 w-3 shrink-0 rotate-45 fill-danger"
                                            >
                                                <path
                                                    d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                />
                                            </svg>
                                            <div class="ltr:ml-3 rtl:mr-3">High</div>
                                        </button>

                                        <button
                                            type="button"
                                            class="flex h-10 w-full items-center rounded-md p-1 font-medium text-info duration-300 hover:bg-white-dark/10 ltr:hover:pl-3 rtl:hover:pr-3 dark:hover:bg-[#181F32]"
                                            :class="{ 'ltr:pl-3 rtl:pr-3 bg-gray-100 dark:bg-[#181F32]': selectedTab === 'update' }"
                                            @click="tabChanged('update')"
                                        >
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-3 w-3 shrink-0 rotate-45 fill-info"
                                            >
                                                <path
                                                    d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                />
                                            </svg>
                                            <div class="ltr:ml-3 rtl:mr-3">Update</div>
                                        </button>
                                    </div>
                                </div>
                                <div class="absolute bottom-0 w-full p-4 ltr:left-0 rtl:right-0">
                                    <button class="btn btn-primary w-full" type="button" @click="addEditTask()">
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
                                            class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                                        >
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add New Task
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="overlay absolute z-[5] hidden h-full w-full rounded-md bg-black/60"
                            :class="{ '!block xl:!hidden': isShowTaskMenu }"
                            @click="isShowTaskMenu = !isShowTaskMenu"
                        ></div>
                        <div class="panel h-full flex-1 overflow-auto p-0">
                            <div class="flex h-full flex-col">
                                <div class="flex w-full flex-col gap-4 p-4 sm:flex-row sm:items-center">
                                    <div class="flex items-center ltr:mr-3 rtl:ml-3">
                                        <button
                                            type="button"
                                            class="block hover:text-primary ltr:mr-3 rtl:ml-3 xl:hidden"
                                            @click="isShowTaskMenu = !isShowTaskMenu"
                                        >
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                                                <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            </svg>
                                        </button>
                                        <div class="group relative flex-1">
                                            <input
                                                type="text"
                                                class="peer form-input ltr:!pr-10 rtl:!pl-10"
                                                placeholder="Search Task..."
                                                x-model="searchTask"
                                                @keyup="searchTasks()"
                                            />
                                            <div class="absolute top-1/2 -translate-y-1/2 peer-focus:text-primary ltr:right-[11px] rtl:left-[11px]">
                                                <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4"
                                                >
                                                    <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5"></circle>
                                                    <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-1 items-center justify-center sm:flex-auto sm:justify-end">
                                        <p
                                            class="ltr:mr-3 rtl:ml-3"
                                            x-text="pager.startIndex+1 + '-' +( pager.endIndex+1) + ' of ' + filteredTasks.length"
                                        ></p>
                                        <button
                                            type="button"
                                            :disabled="pager.currentPage == 1"
                                            class="rounded-md bg-[#f4f4f4] p-1 enabled:hover:bg-primary-light disabled:cursor-not-allowed disabled:opacity-60 ltr:mr-3 rtl:ml-3 dark:bg-white-dark/20 enabled:dark:hover:bg-white-dark/30"
                                            @click="pager.currentPage--,searchTasks(false)"
                                        >
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 rtl:rotate-180"
                                            >
                                                <path
                                                    d="M15 5L9 12L15 19"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                ></path>
                                            </svg>
                                        </button>
                                        <button
                                            type="button"
                                            :disabled="pager.currentPage == pager.totalPages"
                                            class="rounded-md bg-[#f4f4f4] p-1 enabled:hover:bg-primary-light disabled:cursor-not-allowed disabled:opacity-60 dark:bg-white-dark/20 enabled:dark:hover:bg-white-dark/30"
                                            @click="pager.currentPage++,searchTasks(false)"
                                        >
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 ltr:rotate-180"
                                            >
                                                <path
                                                    d="M15 5L9 12L15 19"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                ></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                                <template x-if="pagedTasks.length">
                                    <div class="table-responsive min-h-[400px] grow overflow-y-auto sm:min-h-[300px]">
                                        <table class="table-hover">
                                            <tbody>
                                                <template x-for="task in pagedTasks">
                                                    <tr
                                                        :key="task.id"
                                                        class="group cursor-pointer"
                                                        :class="{ 'bg-white-light/30 dark:bg-[#1a2941]' : task.status === 'complete' }"
                                                    >
                                                        <td class="w-1">
                                                            <input
                                                                type="checkbox"
                                                                :id="`chk-${task.id}`"
                                                                class="form-checkbox"
                                                                :checked="task.status === 'complete'"
                                                                @click.stop="taskComplete(task)"
                                                            />
                                                        </td>
                                                        <td>
                                                            <div @click="viewTask(task)">
                                                                <div
                                                                    class="whitespace-nowrap text-base font-semibold group-hover:text-primary"
                                                                    :class="{ 'line-through': task.status === 'complete' }"
                                                                    x-text="task.title"
                                                                ></div>
                                                                <div
                                                                    class="min-w-[300px] overflow-hidden text-white-dark line-clamp-1"
                                                                    :class="{ 'line-through': task.status === 'complete' }"
                                                                    x-text="task.descriptionText"
                                                                ></div>
                                                            </div>
                                                        </td>
                                                        <td class="w-1">
                                                            <div class="flex items-center space-x-2 ltr:justify-end rtl:justify-start rtl:space-x-reverse">
                                                                <template x-if="task.priority">
                                                                    <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                                        <button
                                                                            type="button"
                                                                            class="badge rounded-full capitalize hover:top-0 hover:text-white"
                                                                            x-text="task.priority"
                                                                            :class="{
                                                                    'badge-outline-primary hover:bg-primary': task.priority === 'medium',
                                                                    'badge-outline-warning hover:bg-warning': task.priority === 'low',
                                                                    'badge-outline-danger hover:bg-danger': task.priority === 'high',
                                                                    'text-white bg-primary': task.priority === 'medium' && open,
                                                                    'text-white bg-warning': task.priority === 'low' && open,
                                                                    'text-white bg-danger': task.priority === 'high' && open,
                                                                }"
                                                                            @click="toggle"
                                                                        ></button>
                                                                        <ul
                                                                            x-cloak
                                                                            x-show="open"
                                                                            x-transition
                                                                            x-transition.duration.300ms
                                                                            class="text-medium text-sm ltr:right-0 rtl:left-0"
                                                                        >
                                                                            <li>
                                                                                <button
                                                                                    class="w-full text-danger ltr:text-left rtl:text-right"
                                                                                    @click="toggle,setPriority(task, 'high')"
                                                                                >
                                                                                    High
                                                                                </button>
                                                                            </li>
                                                                            <li>
                                                                                <button
                                                                                    class="w-full text-primary ltr:text-left rtl:text-right"
                                                                                    @click="toggle,setPriority(task, 'medium')"
                                                                                >
                                                                                    Medium
                                                                                </button>
                                                                            </li>
                                                                            <li>
                                                                                <button
                                                                                    class="w-full text-warning ltr:text-left rtl:text-right"
                                                                                    @click="toggle,setPriority(task, 'low')"
                                                                                >
                                                                                    Low
                                                                                </button>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </template>
                                                                <template x-if="task.tag">
                                                                    <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                                        <button
                                                                            type="button"
                                                                            class="badge rounded-full capitalize hover:top-0 hover:text-white"
                                                                            x-text="task.tag"
                                                                            :class="{
                                                                        'badge-outline-success hover:bg-success': task.tag === 'team',
                                                                        'badge-outline-info hover:bg-info': task.tag === 'update',
                                                                        'text-white bg-success ': task.tag === 'team' && open,
                                                                        'text-white bg-info ': task.tag === 'update' && open,
                                                                    }"
                                                                            @click="toggle"
                                                                        ></button>
                                                                        <ul
                                                                            x-cloak
                                                                            x-show="open"
                                                                            x-transition
                                                                            x-transition.duration.300ms
                                                                            class="text-sm font-medium ltr:right-0 rtl:left-0"
                                                                        >
                                                                            <li>
                                                                                <button class="w-full text-success" @click="toggle,setTag(task, 'team')">
                                                                                    Team
                                                                                </button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="w-full text-info" @click="toggle,setTag(task, 'update')">
                                                                                    Update
                                                                                </button>
                                                                            </li>
                                                                            <li>
                                                                                <button class="w-full" @click="toggle,setTag(task, '')">None</button>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </template>
                                                            </div>
                                                        </td>
                                                        <td class="w-1">
                                                            <p
                                                                class="whitespace-nowrap font-medium text-white-dark"
                                                                :class="{ 'line-through': task.status === 'complete' }"
                                                                x-text="task.date"
                                                            ></p>
                                                        </td>
                                                        <td class="w-1">
                                                            <div class="flex w-max items-center justify-between">
                                                                <div class="flex-shrink-0 ltr:mr-2.5 rtl:ml-2.5">
                                                                    <template x-if="task.path">
                                                                        <img
                                                                            :src="`assets/images/${task.path}`"
                                                                            class="h-8 w-8 rounded-full object-cover"
                                                                            alt="avatar"
                                                                        />
                                                                    </template>
                                                                    <template x-if="!task.path && task.assignee">
                                                                        <div
                                                                            class="grid h-8 w-8 place-content-center rounded-full bg-primary text-sm font-semibold text-white"
                                                                            x-text="task.assignee.charAt(0) + '' + task.assignee.charAt(task.assignee.indexOf(' ') + 1)"
                                                                        ></div>
                                                                    </template>
                                                                    <template x-if="!task.path && !task.assignee">
                                                                        <div class="rounded-full border border-gray-300 p-2 dark:border-gray-800">
                                                                            <svg
                                                                                width="24"
                                                                                height="24"
                                                                                viewBox="0 0 24 24"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-4.5 w-4.5"
                                                                            >
                                                                                <circle
                                                                                    cx="12"
                                                                                    cy="6"
                                                                                    r="4"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="1.5"
                                                                                ></circle>
                                                                                <ellipse
                                                                                    opacity="0.5"
                                                                                    cx="12"
                                                                                    cy="17"
                                                                                    rx="7"
                                                                                    ry="4"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="1.5"
                                                                                ></ellipse>
                                                                            </svg>
                                                                        </div>
                                                                    </template>
                                                                </div>
                                                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                                    <button type="button" @click="toggle">
                                                                        <svg
                                                                            width="24"
                                                                            height="24"
                                                                            viewBox="0 0 24 24"
                                                                            fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-5 w-5 rotate-90 opacity-70"
                                                                        >
                                                                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                                            <circle
                                                                                opacity="0.5"
                                                                                cx="12"
                                                                                cy="12"
                                                                                r="2"
                                                                                stroke="currentColor"
                                                                                stroke-width="1.5"
                                                                            ></circle>
                                                                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                                        </svg>
                                                                    </button>
                                                                    <template x-if="selectedTab !== 'trash'">
                                                                        <ul
                                                                            x-cloak
                                                                            x-show="open"
                                                                            x-transition
                                                                            x-transition.duration.300ms
                                                                            class="whitespace-nowrap ltr:right-0 rtl:left-0"
                                                                        >
                                                                            <li>
                                                                                <a href="javascript:;" @click="toggle, addEditTask(task)">
                                                                                    <svg
                                                                                        width="24"
                                                                                        height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2"
                                                                                    >
                                                                                        <path
                                                                                            opacity="0.5"
                                                                                            d="M4 22H20"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="1.5"
                                                                                            stroke-linecap="round"
                                                                                        />
                                                                                        <path
                                                                                            d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="1.5"
                                                                                        />
                                                                                        <path
                                                                                            opacity="0.5"
                                                                                            d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="1.5"
                                                                                        />
                                                                                    </svg>
                                                                                    Edit
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;" @click="toggle,  deleteTask(task, 'delete' )">
                                                                                    <svg
                                                                                        width="24"
                                                                                        height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                                                                                    >
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
                                                                                        <path
                                                                                            opacity="0.5"
                                                                                            d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="1.5"
                                                                                        ></path>
                                                                                    </svg>
                                                                                    Delete</a
                                                                                >
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;" @click="toggle, setImportant(task)">
                                                                                    <svg
                                                                                        width="24"
                                                                                        height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2"
                                                                                    >
                                                                                        <path
                                                                                            d="M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="1.5"
                                                                                        ></path>
                                                                                    </svg>
                                                                                    <span
                                                                                        x-text="task.status === 'important' ? 'Not Important' : 'Important'"
                                                                                    ></span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </template>
                                                                    <template x-if="selectedTab === 'trash'">
                                                                        <ul
                                                                            x-cloak
                                                                            x-show="open"
                                                                            x-transition
                                                                            x-transition.duration.300ms
                                                                            class="w-44 ltr:right-0 rtl:left-0"
                                                                        >
                                                                            <li>
                                                                                <a
                                                                                    href="javascript:;"
                                                                                    @click="toggle, deleteTask(task, 'deletePermanent' )"
                                                                                >
                                                                                    <svg
                                                                                        width="24"
                                                                                        height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                                                                                    >
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
                                                                                        <path
                                                                                            opacity="0.5"
                                                                                            d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                                                                            stroke="currentColor"
                                                                                            stroke-width="1.5"
                                                                                        ></path>
                                                                                    </svg>
                                                                                    Permanent Delete
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:;" @click="toggle, deleteTask(task, 'restore')">
                                                                                    <svg
                                                                                        width="24"
                                                                                        height="24"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                                                                                    >
                                                                                        <g clip-path="url(#clip0_1276_6232)">
                                                                                            <path
                                                                                                d="M19.7285 10.9288C20.4413 13.5978 19.7507 16.5635 17.6569 18.6573C14.5327 21.7815 9.46736 21.7815 6.34316 18.6573C3.21897 15.5331 3.21897 10.4678 6.34316 7.3436C9.46736 4.21941 14.5327 4.21941 17.6569 7.3436L18.364 8.05071M18.364 8.05071H14.1213M18.364 8.05071V3.80807"
                                                                                                stroke="currentColor"
                                                                                                stroke-width="1.5"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round"
                                                                                            ></path>
                                                                                        </g>
                                                                                        <defs>
                                                                                            <clipPath id="clip0_1276_6232">
                                                                                                <rect width="24" height="24" fill="white"></rect>
                                                                                            </clipPath>
                                                                                        </defs>
                                                                                    </svg>
                                                                                    Restore Task
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </template>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </template>
                                <template x-if="!pagedTasks.length">
                                    <div class="flex h-full min-h-[400px] items-center justify-center text-lg font-semibold sm:min-h-[300px]">
                                        No data available
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60 px-4" :class="{'!block':addTaskModal}">
                            <div class="flex min-h-screen items-center justify-center">
                                <div
                                    x-show="addTaskModal"
                                    x-transition
                                    x-transition.duration.300
                                    @click.outside="addTaskModal = false"
                                    class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full"
                                >
                                    <button
                                        type="button"
                                        class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                        @click="addTaskModal = false"
                                    >
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
                                            class="h-6 w-6"
                                        >
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <div
                                        class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]"
                                        x-text="params.id ? 'Edit Task' : 'Add Task'"
                                    ></div>
                                    <div class="p-5">
                                        <form @submit.prevent="saveTask">
                                            <div class="mb-5">
                                                <label for="title">Title</label>
                                                <input id="title" type="text" placeholder="Enter Task Title" class="form-input" x-model="params.title" />
                                            </div>
                                            <div class="mb-5">
                                                <label for="assignee">Assignee</label>
                                                <select id="assignee" class="form-select" x-model="params.assignee">
                                                    <option value="">Select Assignee</option>
                                                    <option value="John Smith">John Smith</option>
                                                    <option value="Kia Vega">Kia Vega</option>
                                                    <option value="Sandy Doe">Sandy Doe</option>
                                                    <option value="Jane Foster">Jane Foster</option>
                                                    <option value="Donna Frank">Donna Frank</option>
                                                </select>
                                            </div>
                                            <div class="mb-5 flex justify-between gap-4">
                                                <div class="flex-1">
                                                    <label for="tag">Tag</label>
                                                    <select id="tag" class="form-select" x-model="params.tag">
                                                        <option value="">Select Tag</option>
                                                        <option value="team">Team</option>
                                                        <option value="update">Update</option>
                                                    </select>
                                                </div>
                                                <div class="flex-1">
                                                    <label for="priority">Priority</label>
                                                    <select id="priority" class="form-select" x-model="params.priority">
                                                        <option value="">Select Priority</option>
                                                        <option value="low">Low</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="high">High</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <label>Description</label>
                                                <div x-ref="editor"></div>
                                            </div>
                                            <div class="mt-8 flex items-center justify-end ltr:text-right rtl:text-left">
                                                <button type="button" class="btn btn-outline-danger" @click="addTaskModal = false">Cancel</button>
                                                <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" x-text="params.id ? 'Update' : 'Add'">
                                                    Add
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="{'!block':viewTaskModal}">
                            <div class="flex min-h-screen items-center justify-center px-4" @click.self="viewTaskModal = false">
                                <div
                                    x-show="viewTaskModal"
                                    x-transition
                                    x-transition.duration.300
                                    class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full"
                                >
                                    <button
                                        type="button"
                                        class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                        @click="viewTaskModal = false"
                                    >
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
                                            class="h-6 w-6"
                                        >
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <div
                                        class="flex flex-wrap items-center gap-2 bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]"
                                    >
                                        <div x-text="selectedTask.title"></div>
                                        <div
                                            x-show="selectedTask.priority"
                                            x-text="selectedTask.priority"
                                            class="badge rounded-3xl capitalize"
                                            :class="{
                                        'badge-outline-primary': selectedTask.priority === 'medium',
                                        'badge-outline-warning ': selectedTask.priority === 'low',
                                        'badge-outline-danger ': selectedTask.priority === 'high',
                                    }"
                                        ></div>

                                        <div
                                            x-show="selectedTask.tag"
                                            x-text="selectedTask.tag"
                                            class="badge rounded-3xl capitalize"
                                            :class="{
                                        'badge-outline-success ': selectedTask.tag === 'team',
                                        'badge-outline-info ': selectedTask.tag === 'update',
                                    }"
                                        ></div>
                                    </div>
                                    <div class="p-5">
                                        <div class="text-base" x-html="selectedTask.description"></div>

                                        <div class="mt-8 flex items-center justify-end">
                                            <button type="button" class="btn btn-outline-danger" @click="viewTaskModal = false">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end main content section -->

                <!-- start footer section -->
                <p class="pt-6 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2022</span>. Vristo All rights reserved.
                </p>
                <!-- end footer section -->
            </div>
        </div>
    </div>
</x-dashboard>