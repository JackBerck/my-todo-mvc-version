    <div class="max-w-screen-sm mx-auto px-4 py-4 md:px-12 md:py-12 md:shadow-lg mt-24 bg-slate-50">
        <h1 class="text-slate-900 font-bold text-4xl mb-4">Catatanku</h1>
        <div class="flex items-center gap-4 mb-2">
            <form action="" class="w-8/12">
                <div class="relative text-sm md:text-base">
                    <input type="text" id="todo_search" name="todo_search" class="peer bg-transparent h-10 w-full rounded-lg text-slate-900 placeholder-transparent ring-2 px-2 ring-slate-900 focus:ring-purple-700 focus:outline-none" placeholder="">
                    <label for="todo_search" class="absolute cursor-text left-2 -top-3 text-sm text-slate-900 bg-slate-50 mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-slate-900 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-purple-700 peer-focus:text-sm transition-all z-10">Cari catatan...</label>
                </div>
            </form>
            <button id="open-add-todo-form" class="block text-slate-100 bg-purple-700 focus:outline-none font-medium rounded-lg md:px-2 md:py-2.5 text-center text-sm" type="button">Tambahkan catatan</button>
        </div>
        <button class="block text-purple-700 focus:outline-none font-medium text-sm underline" type="button">Cek catatan diarsipkan...</button>
    </div>
    <div class="max-w-screen-xl rounded-md p-2 mt-4 mx-auto flex flex-wrap gap-8 justify-center">
        <div class="flex-initial max-w-xs lg:max-w-sm bg-slate-50 border-b-2 p-4 pt-7 text-justify flex flex-col relative shadow-sm rounded-md">
            <small class="absolute top-4 right-4 text-xs">Kamis, 14 April 2022</small>
            <h2 class="text-lg font-bold">Functional Component</h2>
            <p>Functional component merupakan React component yang dibuat menggunakan fungsi JavaScript. Agar fungsi JavaScript dapat disebut component ia harus mengembalikan React element dan dipanggil layaknya React component.</p>
            <div class="mt-2 flex items-center gap-2">
                <button type="button" name="edit" class="bg-purple-700 text-slate-100 px-3 py-2 text-sm rounded-md">Edit</button>
                <button type="button" name="delete" class="bg-red-500 text-slate-100 px-3 py-2 text-sm rounded-md">Hapus</button>
                <button type="button" name="archive" class="bg-green-500 text-slate-100 px-3 py-2 text-sm rounded-md">Arsipkan</button>
            </div>
        </div>
        <div class="flex-initial max-w-xs lg:max-w-sm bg-slate-50 border-b-2 p-4 pt-7 text-justify flex flex-col relative shadow-sm rounded-md">
            <small class="absolute top-4 right-4 text-xs">Kamis, 14 April 2022</small>
            <h2 class="text-lg font-bold">Module Bundler</h2>
            <p>Dalam konteks pemrograman JavaScript, module bundler merupakan tools yang digunakan untuk menggabungkan seluruh modul JavaScript yang digunakan oleh aplikasi menjadi satu berkas.</p>
            <div class="mt-2 flex items-center gap-2">
                <button type="button" name="edit" class="bg-purple-700 text-slate-100 px-3 py-2 text-sm rounded-md">Edit</button>
                <button type="button" name="delete" class="bg-red-500 text-slate-100 px-3 py-2 text-sm rounded-md">Hapus</button>
                <button type="button" name="archive" class="bg-green-500 text-slate-100 px-3 py-2 text-sm rounded-md">Arsipkan</button>
            </div>
        </div>
    </div>
    <div id="add-form" class="fixed w-full h-full bg-slate-900/50 top-0 left-0 z-50 items-center justify-center hidden">
        <div class="p-4 w-full max-w-xl max-h-full  ">
            <div class="relative bg-slate-50 rounded-lg shadow">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-slate-900">Tambahkan catatan</h3>
                    <button id="close-add-todo-form" type="button" class="text-slate-900 bg-transparent hover:bg-gray-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form class="p-4 md:p-5 space-y-4" method="post" action="">
                    <div class="relative">
                        <input type="text" id="todo_title" name="todo_title" class="peer bg-transparent h-10 w-full rounded-lg text-dark-base placeholder-transparent ring-2 px-2 ring-dark-base focus:ring-purple-700 focus:outline-none" placeholder="" required="" value="">
                        <label for="todo_title" class="absolute cursor-text left-2 -top-3 text-sm text-dark-base bg-slate-50 mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-dark-base peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-purple-700 peer-focus:text-sm transition-all z-10">Masukkan judul...</label>
                        <p class="text-sm text-slate-600" id="max-characters">50 karakter tersisa</p>
                    </div>
                    <div class="relative">
                        <textarea type="text" id="todo_body" name="todo_body" class="peer bg-transparent h-16 w-full rounded-lg text-dark-base placeholder-transparent ring-2 px-2 ring-dark-base focus:ring-purple-700 focus:outline-none pt-1" placeholder="" required=""></textarea>
                        <label for="todo_body" class="absolute cursor-text left-2 -top-3 text-sm text-dark-base bg-slate-50 mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-dark-base peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-purple-700 peer-focus:text-sm transition-all">Masukkan deskripsi...</label>
                    </div>
                    <div class="flex items-center">
                        <input id="todo_archive" type="checkbox" class="w-4 h-4 text-purple-700 border-dark-base rounded" value="">
                        <label for="todo_archive" class="ms-2 text-sm font-medium text-dark-base">Arsipkan catatan?</label>
                    </div>
                    <button type="submit" class="text-slate-50 bg-purple-700 hover:bg-purple-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Tambahkan catatan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const addTodo = document.querySelector('#open-add-todo-form');
        const modalContent = document.querySelector('.p-4.w-full.max-w-xl.max-h-full');
        const addForm = document.querySelector('#add-form');
        addTodo.addEventListener('click', () => {
            document.getElementById('add-form').classList.remove('hidden');
            document.getElementById('add-form').classList.add('flex');
            document.getElementById('todo_title').focus();
        });

        const closeAddTodoForm = document.querySelector('#close-add-todo-form');
        closeAddTodoForm.addEventListener('click', () => {
            document.getElementById('add-form').classList.remove('flex');
            document.getElementById('add-form').classList.add('hidden');
        });

        // Tutup modal ketika mengklik di luar elemen modal
        addForm.addEventListener('click', (event) => {
            if (!modalContent.contains(event.target)) {
                addForm.classList.remove('flex');
                addForm.classList.add('hidden');
            }
        });

        const todoTitle = document.querySelector('#todo_title');
        const maxCharacters = document.querySelector('#max-characters');
        todoTitle.addEventListener('input', () => {
            const characters = todoTitle.value.length;
            const remainingCharacters = 50 - characters;
            maxCharacters.textContent = `${remainingCharacters} karakter tersisa`;
            if (remainingCharacters < 1) {
                todoTitle.value = todoTitle.value.substring(0, 49);
            }
        });
    </script>