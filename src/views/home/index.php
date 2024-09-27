<?php
$todoModel = new Todo_model();
$todoList = $todoModel->getAllTodo();
$archivedTodoList = $todoModel->getArchivedTodo();
?>

<div class="md:relative max-w-screen-sm mx-auto px-4 py-4 md:px-12 md:py-12 md:shadow-lg mt-24 bg-slate-50">
    <div class="">
        <h1 class="text-slate-900 font-bold text-4xl mb-4">Catatanku</h1>
        <a href="<?= BASE_URL ?>home/logout" class="px-4 py-2 bg-red-500 rounded-md inline-block text-slate-50 font-semibold absolute top-4 right-4 md:top-4 md:right-4">Keluar</a>
    </div>
    <div class="flex items-center gap-4 mb-2">
        <form action="" class="w-8/12">
            <div class="relative text-sm md:text-base">
                <input type="text" id="todo_search" name="todo_search" class="peer bg-transparent h-10 w-full rounded-lg text-slate-900 placeholder-transparent ring-2 px-2 ring-slate-900 focus:ring-purple-700 focus:outline-none" placeholder="">
                <label for="todo_search" class="absolute cursor-text left-2 -top-3 text-sm text-slate-900 bg-slate-50 mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-slate-900 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-purple-700 peer-focus:text-sm transition-all z-10">Cari catatan...</label>
            </div>
        </form>
        <button id="open-add-todo-form" class="block text-slate-100 bg-purple-700 focus:outline-none font-medium rounded-lg md:px-2 md:py-2.5 text-center text-sm" type="button">Tambahkan catatan</button>
    </div>
    <button id="open-archived-todo" class="block text-purple-700 focus:outline-none font-medium text-sm underline" type="button">Cek catatan diarsipkan...</button>
</div>
<!-- Todo List Start -->
<div id="todo_list" class="max-w-screen-xl rounded-md p-2 mt-4 mx-auto flex flex-wrap gap-8 justify-center">
    <?php foreach ($todoList as $todo) : ?>
        <div class="flex-initial max-w-xs lg:max-w-sm bg-slate-50 border-b-2 p-4 pt-7 text-justify flex flex-col relative shadow-sm rounded-md">
            <small class="absolute top-4 right-4 text-xs created-at"><?= $todo['created_at'] ?></small>
            <h2 class="text-lg font-bold"><?= $todo['title'] ?></h2>
            <p><?= $todo['description'] ?></p>
            <div class="mt-2 flex items-center gap-2">
                <button type="button"
                    name="edit"
                    class="edit-todo bg-purple-700 text-slate-100 px-3 py-2 text-sm rounded-md"
                    data-id="<?= $todo['todo_id'] ?>"
                    data-title="<?= $todo['title'] ?>"
                    data-description="<?= $todo['description'] ?>">
                    Edit
                </button>
                <form action="<?= BASE_URL ?>home/deleteTodo" method="post">
                    <input type="hidden" name="todo_id" value="<?= $todo["todo_id"] ?>">
                    <button type="submit" name="delete" class="bg-red-500 text-slate-100 px-3 py-2 text-sm rounded-md">Hapus</button>
                </form>
                <form action="<?= BASE_URL ?>home/archiveTodo" method="post">
                    <input type="hidden" name="todo_id" value="<?= $todo["todo_id"] ?>">
                    <button type="submit" name="archive" class="bg-green-500 text-slate-100 px-3 py-2 text-sm rounded-md">Arsipkan</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- Todo List End -->
<!-- Add Todo Form Start -->
<div id="add-form" class="fixed w-full h-full bg-slate-900/50 top-0 left-0 z-50 items-center justify-center hidden">
    <div class="p-4 w-full max-w-xl max-h-full">
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
            <form class="p-4 md:p-5 space-y-4" method="post" action="<?= BASE_URL ?>home/addTodo">
                <div class="relative">
                    <input type="text" id="todo_title" name="todo_title" class="peer bg-transparent h-10 w-full rounded-lg text-dark-base placeholder-transparent ring-2 px-2 ring-dark-base focus:ring-purple-700 focus:outline-none" placeholder="" required="" value="">
                    <label for="todo_title" class="absolute cursor-text left-2 -top-3 text-sm text-dark-base bg-slate-50 mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-dark-base peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-purple-700 peer-focus:text-sm transition-all z-10">Masukkan judul...</label>
                    <p class="max-characters text-sm text-slate-600">50 karakter tersisa</p>
                </div>
                <div class="relative">
                    <textarea type="text" id="todo_description" name="todo_description" class="peer bg-transparent h-16 w-full rounded-lg text-dark-base placeholder-transparent ring-2 px-2 ring-dark-base focus:ring-purple-700 focus:outline-none pt-1" placeholder="" required=""></textarea>
                    <label for="todo_description" class="absolute cursor-text left-2 -top-3 text-sm text-dark-base bg-slate-50 mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-dark-base peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-purple-700 peer-focus:text-sm transition-all">Masukkan deskripsi...</label>
                </div>
                <button type="submit" class="text-slate-50 bg-purple-700 hover:bg-purple-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Tambahkan catatan</button>
            </form>
        </div>
    </div>
</div>
<!-- Add Todo Form End -->
<!-- Archived Todo Start -->
<div id="archived-todo" class="fixed w-full h-full bg-slate-900/50 top-0 left-0 z-50 items-center justify-center hidden">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <div class="relative bg-slate-50 rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900 ">Catatan yang diarsipkan</h3><button id="close-archived-todo" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"><svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                    </svg><span class="sr-only">Close modal</span></button>
            </div>
            <div class="p-4 max-h-[512px] overflow-y-auto">
                <?php foreach ($archivedTodoList as $todo) : ?>
                    <div class="border-b-2 border-b-purple-700 pb-2 p-1 text-justify">
                        <h2 class="text-lg font-bold"><?= $todo['title'] ?></h2>
                        <p><?= $todo['description'] ?></p>
                        <div class="mt-2 flex items-center gap-2">
                            <form action="<?= BASE_URL ?>home/deleteTodo" method="post">
                                <input type="hidden" name="todo_id" value="<?= $todo["todo_id"] ?>">
                                <button type="submit" name="delete" class="bg-red-500 text-slate-50 px-3 py-2 text-sm rounded-md">Hapus</button>
                            </form>
                            <form action="<?= BASE_URL ?>home/unarchiveTodo" method="post">
                                <input type="hidden" name="todo_id" value="<?= $todo["todo_id"] ?>">
                                <button type="submit" name="restore" class="bg-green-500 text-slate-50 px-3 py-2 text-sm rounded-md">Kembalikan</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- Archived Todo End -->
<!-- Edit Todo Form Start -->
<!-- Edit Todo Form -->
<div id="edit-form" class="fixed w-full h-full bg-slate-900/50 top-0 left-0 z-50 items-center justify-center hidden">
    <div class="p-4 w-full max-w-xl max-h-full">
        <div class="relative bg-slate-50 rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-slate-900">Edit Catatan</h3>
                <button id="close-edit-todo-form" type="button" class="text-slate-900 bg-transparent hover:bg-gray-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                    </svg>
                </button>
            </div>
            <form id="edit-todo-form" class="p-4 md:p-5 space-y-4" method="post" action="<?= BASE_URL ?>home/updateTodo">
                <input type="hidden" id="edit-todo-id" name="todo_id">
                <div class="relative">
                    <input type="text" id="edit-todo-title" name="todo_title" class="todo_title peer bg-transparent h-10 w-full rounded-lg text-dark-base placeholder-transparent ring-2 px-2 ring-dark-base focus:ring-purple-700 focus:outline-none" required>
                    <label for="edit-todo-title" class="absolute cursor-text left-2 -top-3 text-sm text-dark-base bg-slate-50 mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-dark-base peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-purple-700 peer-focus:text-sm transition-all z-10">Masukkan judul...</label>
                    <p class="max-characters text-sm text-slate-600">50 karakter tersisa</p>
                </div>
                <div class="relative">
                    <textarea id="edit-todo-description" name="todo_description" class="peer bg-transparent h-16 w-full rounded-lg text-dark-base placeholder-transparent ring-2 px-2 ring-dark-base focus:ring-purple-700 focus:outline-none pt-1" required></textarea>
                    <label for="edit-todo-description" class="absolute cursor-text left-2 -top-3 text-sm text-dark-base bg-slate-50 mx-1 px-1 peer-placeholder-shown:text-base peer-placeholder-shown:text-dark-base peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-purple-700 peer-focus:text-sm transition-all z-10">Masukkan deskripsi...</label>
                </div>
                <button type="submit" class="text-slate-50 bg-purple-700 hover:bg-purple-700 font-medium rounded-lg text-sm px-5 py-2.5">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
<!-- Edit Todo Form End -->
<script>
    // Tampilkan form tambah todo
    const addTodo = document.querySelector('#open-add-todo-form');
    const modalContent = document.querySelector('#add-form > div');
    const addForm = document.querySelector('#add-form');
    addTodo.addEventListener('click', () => {
        document.getElementById('add-form').classList.remove('hidden');
        document.getElementById('add-form').classList.add('flex');
        document.getElementById('todo_title').focus();
    });

    // Tutup form tambah todo
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

    // Hitung karakter sisa pada input judul todo
    const todoTitle = document.querySelectorAll('input[name="todo_title"]');
    const maxCharacters = document.querySelectorAll('.max-characters');
    todoTitle.forEach((title) => {
        title.addEventListener('input', () => {
            const titleLength = title.value.length;
            const remainingCharacters = 50 - titleLength;
            maxCharacters.forEach((element) => {
                element.textContent = `${remainingCharacters} karakter tersisa`;
            });
        });
    });

    // Cari todo
    const todoSearch = document.querySelector('#todo_search');
    const todoList = document.querySelectorAll('#todo_list > div');
    todoSearch.addEventListener('input', () => {
        const searchValue = todoSearch.value;
        todoList.forEach((todo) => {
            const todoTitle = todo.querySelector('h2').textContent;
            if (todoTitle.toLowerCase().includes(searchValue.toLowerCase())) {
                todo.style.display = 'block';
            } else {
                todo.style.display = 'none';
            }
        });
    });

    // Tampilkan todo yang diarsipkan
    const openArchivedTodo = document.querySelector('#open-archived-todo');
    const archivedTodo = document.querySelector('#archived-todo');
    const archivedTodoContent = document.querySelector('#archived-todo > div');
    openArchivedTodo.addEventListener('click', () => {
        archivedTodo.classList.remove('hidden');
        archivedTodo.classList.add('flex');
    });

    // Tutup todo yang diarsipkan
    const closeArchivedTodo = document.querySelector('#close-archived-todo');
    closeArchivedTodo.addEventListener('click', () => {
        archivedTodo.classList.remove('flex');
        archivedTodo.classList.add('hidden');
    });

    // Tutup modal ketika mengklik di luar elemen modal
    archivedTodo.addEventListener('click', (event) => {
        if (!archivedTodoContent.contains(event.target)) {
            archivedTodo.classList.remove('flex');
            archivedTodo.classList.add('hidden');
        }
    });

    // Mengubah format tanggal
    // Mengubah format tanggal
    const createdAtElements = document.querySelectorAll('.created-at'); // Pilih semua elemen dengan kelas "created-at"
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    };

    // Loop melalui semua elemen dan format tanggalnya
    createdAtElements.forEach((element) => {
        const originalDate = new Date(element.textContent); // Ambil tanggal asli dari text content
        const formattedDate = originalDate.toLocaleDateString('id-ID', options); // Format tanggal
        element.textContent = formattedDate; // Ganti isi dengan tanggal yang sudah diformat
    });

    // Tampilkan form edit todo
    document.addEventListener('DOMContentLoaded', () => {
        const editButtons = document.querySelectorAll('.edit-todo');
        const editFormContainer = document.getElementById('edit-form');
        const editFormContent = document.querySelector('#edit-form > div');
        const editForm = document.getElementById('edit-form');
        const editTodoTitle = document.getElementById('edit-todo-title');
        const editTodoDescription = document.getElementById('edit-todo-description');
        const editTodoId = document.getElementById('edit-todo-id');
        const closeEditButton = document.getElementById('close-edit-todo-form');

        // Event listener untuk tombol edit
        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const todoId = button.getAttribute('data-id');
                const todoTitle = button.getAttribute('data-title');
                const todoDescription = button.getAttribute('data-description');

                // Isi form dengan data todo
                editTodoId.value = todoId;
                editTodoTitle.value = todoTitle;
                editTodoDescription.value = todoDescription;

                // Tampilkan modal form
                editForm.classList.remove('hidden');
                editForm.classList.add('flex');
            });
        });

        // Tutup form edit
        closeEditButton.addEventListener('click', () => {
            editForm.classList.remove('flex');
            editForm.classList.add('hidden');
        });

        // Tutup modal ketika mengklik di luar elemen modal
        editFormContainer.addEventListener('click', (event) => {
            if (!editFormContent.contains(event.target)) {
                editFormContainer.classList.remove('flex');
                editFormContainer.classList.add('hidden');
            }
        });
    });
</script>