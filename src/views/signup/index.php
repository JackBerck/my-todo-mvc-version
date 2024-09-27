<?php Flasher::flash(); ?>

<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="w-full bg-slate-50 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Selamat datang di Catatanku!
            </h1>
            <form class="space-y-4 md:space-y-6" action="<?= BASE_URL ?>signup/addUser" method="post">
                <div>
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                    <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5" placeholder="Masukkan username..." required="">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5" placeholder="name@company.com" required="">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5" required="">
                </div>
                <div>
                    <label for="verify-password" class="block mb-2 text-sm font-medium text-gray-900">Verifikasi Password</label>
                    <input type="password" name="verify-password" id="verify-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5" required="">
                </div>
                <div class="flex items-center justify-between">
                </div>
                <button type="submit" name="signup" class="w-full text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar</button>
                <p class="text-sm font-light text-gray-500">
                    Sudah punya akun? <a href="<?= BASE_URL ?>login" class="font-medium text-purple-600 hover:underline">Masuk</a>
                </p>
            </form>
        </div>
    </div>
</div>