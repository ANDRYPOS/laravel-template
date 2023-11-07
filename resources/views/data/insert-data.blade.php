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
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Insert Data</h5>
            <form class="w-full max-w-lg" method="post" action="{{ url('store-data') }}" enctype="multipart/form-data">
                @csrf
                {{-- categories --}}
                <div class="flex
                flex-wrap -mx-3 mb-3 mt-2">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                            Categories
                        </label>
                        <div class="relative">
                            <select
                                class="cursor-pointer block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-state" name="category_id">
                                <option class="cursor-pointer" disabled selected>Select Categories</option>
                                @foreach ($category as $dataCategory)
                                    <option class="cursor-pointer" value="{{ $dataCategory->id }}"
                                        {{ old('category_id') ? 'selected' : '' }}>{{ $dataCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                {{-- Name --}}
                <div class="flex flex-wrap -mx-3 mb-3 mt-2" x-data="{ show: true }">
                    <div class="w-full md:w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-last-name">
                            Name
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" name="name">
                    </div>
                </div>

                {{-- phone - role --}}
                <div class="flex flex-wrap -mx-3 mb-3 mt-2">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-first-name">
                            Qty
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" placeholder="12" name="qty">

                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-first-name">
                            Price
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="grid-first-name" type="text" placeholder="{{ number_format('100000') }}" name="price">
                    </div>

                </div>

                {{-- address - avatar --}}
                <div class="flex flex-wrap -mx-3 mb-3 mt-2">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="grid-first-name">
                            Image
                        </label>
                        <div class="flex items-center justify-center mt-2">
                            <label for="dropzone-file" class="file-upload">
                                <input id="dropzone-file" type="file" name="image" onchange="fileSelected(event)" />
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
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="grid-first-name">
                            Preview
                        </label>
                    </div>
                </div>
                <input type="submit" value="submit"
                    class="text-xs font-semibold leading-tight text-slate-400 bg-gradient-to-tl from-slate-600 to-slate-300 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
            </form>
        </a>
    </div>
    <!-- component -->
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
