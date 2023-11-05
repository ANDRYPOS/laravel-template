@extends('layouts.main')
@section('content')
    <style>
        .file-upload {
            position: relative;
            display: inline-block;
            background-color: rgb(229, 229, 235);
            width: 100%;
            border-radius: 5px
        }

        .file-upload input[type="file"] {
            display: none;
        }

        .file-upload-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: auto;
            width: 73px;
            height: 73px;
            border: 2px #ccc;
            border-radius: 50%;
            cursor: pointer;
        }

        .cloud-icon,
        .check-icon {
            font-size: 40px;
        }

        .check-icon {
            display: none;
        }

        .file-upload-text {
            text-align: center;
            margin: auto;
            margin-top: 8px;
        }
    </style>
    <div class="w-full px-6 mx-auto mb-4">
        <a
            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Update User</h5>
            @foreach ($users as $dataUser)
                <form class="w-full max-w-lg" method="post" action="{{ url('update-user') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    {{-- fullname --}}
                    <div class="flex flex-wrap -mx-3 mb-3 mt-2">
                        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-first-name">
                                Fullname
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                type="text" placeholder="John Doe" name="name" value="{{ $dataUser->name }}">
                        </div>
                    </div>


                    {{-- email and password --}}
                    <div class="flex flex-wrap -mx-3 mb-3 mt-2" x-data="{ show: true }">
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Email
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="email" placeholder="johndoe@example.com" name="email"
                                value="{{ $dataUser->email }}">
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-password">
                                Password
                            </label>
                            <div class="relative">
                                <input placeholder="" :type="show ? 'password' : 'text'" name="password"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                    <div class="cursor-pointer">
                                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                            :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                            </path>
                                        </svg>

                                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                            :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 640 512">
                                            <path fill="currentColor"
                                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- phone - role --}}
                    <div class="flex flex-wrap -mx-3 mb-3 mt-2">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-first-name">
                                Phone
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-first-name" type="text" placeholder="+16502515321" name="phone"
                                value="{{ $dataUser->phone }}">

                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-state">
                                Role
                            </label>
                            <div class="relative">
                                <select
                                    class="cursor-pointer block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state" name="role">
                                    <option class="cursor-pointer" disabled selected>Select Role</option>
                                    <option class="cursor-pointer" value="admin"
                                        {{ $dataUser->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option class="cursor-pointer" value="staff"
                                        {{ $dataUser->role == 'staff' ? 'selected' : '' }}>Staff</option>
                                    <option class="cursor-pointer" value="mahasiswa"
                                        {{ $dataUser->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- address - avatar --}}
                    <div class="flex flex-wrap -mx-3 mb-3 mt-2">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-first-name">
                                Address
                            </label>
                            <textarea id="message" rows="4" name="address"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                placeholder="Write your thoughts here...">{{ $dataUser->address }}</textarea>

                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold"
                                for="grid-first-name">
                                Avatar
                            </label>
                            <div class="flex items-center justify-center mt-2">
                                <label for="dropzone-file" class="file-upload">
                                    <input id="dropzone-file" type="file" name="avatar"
                                        onchange="fileSelected(event)" />
                                    <div class="file-upload-icon">
                                        <i class="cloud-icon fas fa-cloud-upload-alt"></i>
                                        <i class="check-icon fas fa-thumbs-up" style="color:#0d5de7"></i>
                                    </div>
                                    <p class="file-upload-text" id="blmupload">Click to upload or drag and drop</p>
                                    <p class="file-upload-text" style="display: none; color:#0d5de7" id="sdhupload">
                                        <span class="file-name-display"></span>
                                        Uploaded successfully!
                                    </p>
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Update"
                        class="text-xs font-semibold leading-tight text-slate-400 bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                </form>
            @endforeach
        </a>
    </div>
    <!-- component -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script>
        function fileSelected(event) {
            const cloudIcon = document.querySelector(".cloud-icon");
            const checkIcon = document.querySelector(".check-icon");
            const textBefore = document.getElementById("blmupload");
            const textAfter = document.getElementById("sdhupload");
            const fileNameDisplay = document.querySelector(".file-name-display");

            if (event.target.files && event.target.files.length > 0) {
                const selectedFile = event.target.files[0];
                cloudIcon.style.display = "none";
                checkIcon.style.display = "block";
                textBefore.style.display = "none";
                textAfter.style.display = "block";
                fileNameDisplay.textContent = selectedFile.name;
                fileNameDisplay.style.fontWeight = "bold";
            } else {
                cloudIcon.style.display = "block";
                checkIcon.style.display = "none";
                fileNameDisplay.textContent = "";
            }
        }
    </script>
@endsection
