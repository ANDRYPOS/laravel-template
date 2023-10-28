<footer class="pt-4">
    <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
            <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                    <script>
                        function updateClock() {
                            var now = new Date();
                            var hours = now.getHours();
                            var minutes = now.getMinutes();
                            var seconds = now.getSeconds();

                            var options = {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            var date = now.toLocaleDateString('id-ID', options);

                            // Format waktu dengan menambahkan "0" di depan angka tunggal
                            var timeString =
                                (hours < 10 ? "0" : "") + hours + ":" +
                                (minutes < 10 ? "0" : "") + minutes + ":" +
                                (seconds < 10 ? "0" : "") + seconds;

                            var dateTimeString = ' ' + timeString;

                            document.getElementById("clock").innerHTML = dateTimeString;
                        }

                        // Panggil updateClock setiap detik
                        setInterval(updateClock, 1000);
                    </script>

                    <a href="https://bit.ly/3CU1yol" class="font-semibold text-slate-700" target="_blank"> Andri
                        Elistiawan </a><i class="fa fa-heart"></i><span id="clock"></span>

                </div>
            </div>
            {{--  <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com"
                            class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                            target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation"
                            class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                            target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://creative-tim.com/blog"
                            class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                            target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license"
                            class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                            target="_blank">License</a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
</footer>
