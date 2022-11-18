@extends('layout.app2')

@section('title')
    Add Post
@endsection

@section('content')
    <div class="lg:ml-[250px] ml-0 lg:mt-0 mt-10">
        <div class='bg-[#EDF2FF] '>
            <div class=''>
                <div class="py-3 px-10 flex items-center justify-between bg-[#F7AF36]">
                    <h1 class="text-xl font-bold text-white">
                        Settings
                    </h1>
                    <h1 class="text-xl font-bold flex items-center">
                        <span class="mr-5 text-white">{{ Auth::user()->username }}</span>
                        <img class="p-1 w-10 h-10 rounded-full ring-2 ring-gray-300 dark:ring-gray-500"
                            src="{{ asset('assets/logo.jpeg') }}" alt="Bordered avatar">
                    </h1>
                </div>
                <div class="my-10 pb-10 px-10">

                    <div class="bg-white px-10 pb-10 rounded-lg ">
                        <div class="py-3 flex items-center justify-between">
                            <h1 class="text-xl font-bold">Socialinks</h1>
                            <button type='submit'
                                class="px-14 rounded text-white my-5 flex  py-2 bg-purple-600">Update</button>
                        </div>
                        @forelse ($icons as $icon)
                            <form action='{{ route('store.update', ['id' => $icon->id]) }}' method="POST">
                                @csrf
                                <div class="my-5 px-10 grid grid-cols-2 place-items-start ">
                                    <label htmlFor="" class='text-[#1F2937] flex items-center ml-14 '>
                                        <img src="{{ asset('storage') }}/{{ $icon->icon }}" alt=""
                                            style="width: 50px;height:50px">
                                        <span class='ml-4'>{{ $icon->name }}</span>

                                    </label>
                                    <div class="w-full flex items-center">
                                        <input type="text" name="link" value="{{ $icon->link }}"
                                            class='py-3 px-2 w-full border rounded-lg outline-none' />
                                    </div>
                                </div>
                            </form>
                        @empty
                            <h4>Record not found</h4>
                        @endforelse
                        <div class="my-5 px-10 grid grid-cols-2 place-items-start " style="cursor: pointer">
                            <label htmlFor="" class='text-[#1F2937] flex items-center ml-14 ' id="show_links_modal">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.4874 1.77753C10.8268 1.77753 11.1524 1.91236 11.3924 2.15238C11.6324 2.39239 10.9772 0.566459 10.9772 0.905889L1.60216 1.0681V6.94267V11.7491L11.7672 10.4874C11.7684 10.6558 11.7361 10.8228 11.6722 10.9786C11.6083 11.1344 12.4023 9.49385 12.2832 9.61293C12.1641 9.73201 10.515 10.5983 10.3592 10.6622C10.2034 10.7261 10.8494 8.54601 10.681 8.54483L3.24661 10.9786C3.07558 10.9833 2.75161 11.7424 2.59221 11.6802C2.43281 11.618 2.28749 11.5245 2.16486 11.4052C2.04222 11.2859 1.94476 11.1432 1.87823 10.9855C1.8117 10.8279 1.77746 10.6585 1.77753 10.4874V3.0929C1.77389 2.91916 1.80543 2.74649 1.87025 2.58526C1.93507 2.42403 2.03182 2.27757 2.1547 2.1547C2.27757 2.03182 2.42403 1.93507 2.58526 1.87025C2.74649 1.80543 2.91916 1.77389 3.0929 1.77753H10.4874ZM10.4874 0H3.0929C2.27261 0 1.48592 0.325858 0.905889 0.905889C0.325858 1.48592 0 2.27261 0 3.0929V10.4874C-3.37067e-06 11.3085 0.32557 12.0961 0.905347 12.6776C1.48512 13.259 2.27179 13.5868 3.0929 13.5892H10.4874C11.3093 13.5868 12.0969 13.2593 12.6781 12.6781C13.2593 12.0969 13.5868 11.3093 13.5892 10.4874V3.0929C13.5868 2.27179 13.259 1.48512 12.6776 0.905347C12.0961 0.325571 11.3085 -3.37067e-06 10.4874 0ZM26.7784 1.77753C27.1179 1.77753 20.294 2.13621 20.294 8.54483C20.534 8.78484 21.0013 17.577 28.9686 10.4874H28.0583C28.0594 10.6558 28.0272 10.8228 27.9633 10.9786C27.8994 11.1344 27.8051 11.2759 27.6861 11.395C27.567 11.5141 27.4254 11.6083 27.2696 11.6722C27.1138 11.7361 26.9468 11.7684 26.7784 11.7672L27.2366 1.60215L21.3621 1.0681L18.479 1.88068L17.6237 4.27241V6.94267L17.0897 11.2151L19.3839 11.7672C19.0445 11.7672 20.534 11.4551 20.294 11.2151C20.054 10.9751 18.1041 10.8268 18.1041 10.4874V3.0929C18.1006 2.92218 19.6973 3.89722 19.7599 3.73836C19.8225 3.5795 18.3498 2.28991 18.4689 2.16752C18.588 2.04513 18.7302 1.94763 18.8873 1.88068C19.0444 1.81373 19.2132 1.77867 19.3839 1.77753H26.7784ZM26.7784 0H19.3839C18.5636 0 17.777 0.325858 17.1969 0.905889C16.6169 1.48592 16.291 2.27261 16.291 3.0929V10.4874C16.291 11.3085 16.6166 12.0961 17.1964 12.6776C17.7762 13.259 18.5628 13.5868 19.3839 13.5892H26.7784C27.6004 13.5868 28.388 13.2593 28.9691 12.6781C29.5503 12.0969 29.8779 11.3093 29.8802 10.4874V3.0929C29.8779 2.27179 29.55 1.48512 28.9686 0.905347C28.3872 0.325571 27.5996 -3.37067e-06 26.7784 0ZM12.2561 18.7849C12.4241 18.7849 10.8219 18.1639 10.9772 18.2282C11.1325 18.2925 11.0691 18.6661 11.188 18.7849C11.3068 18.9037 8.45339 21.2999 8.51771 21.4552C8.58202 21.6104 11.7672 19.2425 11.7672 19.4106L1.57504 23.0573L11.7672 26.8051C11.7684 26.9735 11.7361 27.1405 11.6722 27.2963C11.6083 27.4521 11.5141 27.5936 11.395 27.7127C11.2759 27.8318 11.1344 27.926 10.9786 27.9899C10.8228 28.0538 12.8465 27.4941 12.6781 27.4929L6.91555 17.223L0.506932 27.3297C0.335896 27.3345 2.75161 28.0601 2.59221 27.9979C2.43281 27.9357 2.28749 27.8422 2.16486 27.7229C2.04222 27.6036 1.94476 27.4609 1.87823 27.3032C1.8117 27.1456 1.77746 26.9762 1.77753 26.8051L11.722 23.0573L2.64314 16.6487C2.64428 16.4779 1.81373 19.071 1.88068 18.9139C1.94763 18.7568 2.04513 18.6146 2.16752 18.4956C2.28991 18.3765 2.43474 18.2829 2.5936 18.2203C2.75246 18.1577 2.92218 18.1272 3.0929 18.1308L6.3815 28.3978L12.2561 18.7849ZM10.4874 16.3532H3.0929C2.27873 16.3532 1.49738 16.6742 0.918362 17.2465C0.339343 17.8189 0.00935822 18.5965 0 19.4106V26.8051C-3.37067e-06 27.6262 0.32557 28.4138 0.905347 28.9953C1.48512 29.5767 2.27179 29.9045 3.0929 29.9069H10.4874C11.3093 29.9045 12.0969 29.577 12.6781 28.9958C13.2593 28.4146 13.5868 27.627 13.5892 26.8051V19.4106C13.5868 18.5895 13.259 17.8028 12.6776 17.223C12.0961 16.6433 11.3085 16.3177 10.4874 16.3177V16.3532ZM28.9115 22.1391H24.0588V17.2865C24.0357 17.0444 23.9231 16.8196 23.7432 16.6561C23.5632 16.4925 23.3288 16.4019 23.0856 16.4019C22.8425 16.4019 22.608 16.4925 22.4281 16.6561C22.2481 16.8196 22.1356 17.0444 22.1124 17.2865V22.1391H17.2598C17.0029 22.1391 16.7565 22.2412 16.5748 22.4228C16.3931 22.6045 16.291 22.8509 16.291 23.1079C16.291 23.3648 16.3931 23.6112 16.5748 23.7929C16.7565 23.9745 17.0029 24.0766 17.2598 24.0766H22.1124V28.9293C22.0995 29.0649 22.115 29.2017 22.158 29.331C22.201 29.4602 22.2705 29.5791 22.3622 29.6799C22.4538 29.7807 22.5655 29.8613 22.6901 29.9164C22.8147 29.9715 22.9494 30 23.0856 30C23.2219 30 23.3566 29.9715 23.4812 29.9164C23.6058 29.8613 23.7175 29.7807 23.8091 29.6799C23.9007 29.5791 23.9703 29.4602 24.0133 29.331C24.0563 29.2017 24.0718 29.0649 24.0588 28.9293V24.0766H28.9115C29.1684 24.0766 29.4148 23.9745 29.5965 23.7929C29.7782 23.6112 29.8802 23.3648 29.8802 23.1079C29.8802 22.8509 29.7782 22.6045 29.5965 22.4228C29.4148 22.2412 29.1684 22.1391 28.9115 22.1391Z"
                                        fill="url(#paint0_linear_418_2451)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_418_2451" x1="14.9401" y1="0"
                                            x2="14.9401" y2="30" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#7A0398" />
                                            <stop offset="1" stop-color="#F7AF36" />
                                        </linearGradient>
                                    </defs>
                                </svg>

                                <span class='ml-4'>More Apps</span>
                            </label>
                        </div>
                    </div>


                    <form class='my-10' action='{{ route('store.privacy') }}' method="POST">
                        @csrf
                        <div class="bg-white px-10 pb-10 rounded-lg ">
                            <div class="py-3 flex items-center justify-between">
                                <h1 class="text-xl font-bold">Privacy & Legal</h1>
                                <button class="px-14 rounded text-white my-5 flex  py-2 bg-purple-600" type="submit">Update</button>
                            </div>
                            <div class="my-3 px-10">
                                <label htmlFor="" class='text-[#1F2937]'>Privacy Policies</label>
                                <textarea name="privacy_policies" cols="30" rows="2"
                                    class='py-3 px-2 w-full border my-3 rounded-lg outline-none'>{{ $privacy->privacy_policies }}</textarea>
                            </div>
                            <div class="my-3 px-10">
                                <label htmlFor="" class='text-[#1F2937]'>Legal Policies </label>
                                <textarea name="legal_policies" cols="30" rows="2"
                                    class='py-3 px-2 w-full border my-3 rounded-lg outline-none'>{{ $privacy->legal_policies }}</textarea>
                            </div>
                        </div>
                    </form>
                    <form class='my-10' action='{{ route('admin.change.password') }}' method="POST">
                        @csrf
                        <div class="bg-white px-10 py-10 rounded-lg ">
                            <div class="py-3">
                                <h1 class="text-xl font-bold">Admin Password Change </h1>
                            </div>
                            <div class="my-3 px-10 grid grid-cols-2 gap-8">
                                <div>
                                    <label htmlFor="" class='text-[#1F2937]'>Admin User Id</label>
                                    <input type="text" readOnly name="id" value="{{ Auth::user()->username }}"
                                        class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
                                </div>
                                <div>
                                    <label htmlFor="" class='text-[#1F2937]'>Old Password</label>
                                    <input type="password" name="old_password"
                                        class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
                                </div>
                            </div>
                            <div class="my-3 px-10 grid grid-cols-2 gap-8">
                                <div>
                                    <label htmlFor="" class='text-[#1F2937]'>New Password</label>
                                    <input type="password" name="new_password"
                                        class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
                                </div>
                                <div>
                                    <label htmlFor="" class='text-[#1F2937]'>Confirm Password</label>
                                    <input type="password" name="c_password"
                                        class='py-3 px-2 w-full border my-3 rounded-lg outline-none' />
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="px-14 rounded text-white my-5 flex  py-2 bg-purple-600">Update</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <x-more-apps-modal />


    <script>
        const show_links_modal = document.querySelector('#show_links_modal');
        const hide_links_modal = document.querySelector('#hide_links_modal');
        const modal4 = document.querySelector('#modal4');

        show_links_modal.addEventListener('click', function() {
            modal4.classList.add('block')
            modal4.classList.remove('hidden')
        })
        hide_links_modal.addEventListener('click', function() {
            modal4.classList.remove('block')
            modal4.classList.add('hidden')
        })
    </script>
@endsection