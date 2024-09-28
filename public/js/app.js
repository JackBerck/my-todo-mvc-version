// Tampilkan form tambah todo
const addTodo = document.querySelector("#open-add-todo-form");
const modalContent = document.querySelector("#add-form > div");
const addForm = document.querySelector("#add-form");
addTodo.addEventListener("click", () => {
  document.getElementById("add-form").classList.remove("hidden");
  document.getElementById("add-form").classList.add("flex");
  document.getElementById("todo_title").focus();
});

// Tutup form tambah todo
const closeAddTodoForm = document.querySelector("#close-add-todo-form");
closeAddTodoForm.addEventListener("click", () => {
  document.getElementById("add-form").classList.remove("flex");
  document.getElementById("add-form").classList.add("hidden");
});

// Tutup modal ketika mengklik di luar elemen modal
addForm.addEventListener("click", (event) => {
  if (!modalContent.contains(event.target)) {
    addForm.classList.remove("flex");
    addForm.classList.add("hidden");
  }
});

// Hitung karakter sisa pada input judul todo
const todoTitle = document.querySelectorAll('input[name="todo_title"]');
const maxCharacters = document.querySelectorAll(".max-characters");
todoTitle.forEach((title) => {
  title.addEventListener("input", () => {
    const titleLength = title.value.length;
    const remainingCharacters = 50 - titleLength;
    maxCharacters.forEach((element) => {
      element.textContent = `${remainingCharacters} karakter tersisa`;
    });
  });
});

// Cari todo
const todoSearch = document.querySelector("#todo_search");
const todoList = document.querySelectorAll("#todo_list > div");
todoSearch.addEventListener("input", () => {
  const searchValue = todoSearch.value;
  todoList.forEach((todo) => {
    const todoTitle = todo.querySelector("h2").textContent;
    if (todoTitle.toLowerCase().includes(searchValue.toLowerCase())) {
      todo.style.display = "block";
    } else {
      todo.style.display = "none";
    }
  });
});

// Tampilkan todo yang diarsipkan
const openArchivedTodo = document.querySelector("#open-archived-todo");
const archivedTodo = document.querySelector("#archived-todo");
const archivedTodoContent = document.querySelector("#archived-todo > div");
openArchivedTodo.addEventListener("click", () => {
  archivedTodo.classList.remove("hidden");
  archivedTodo.classList.add("flex");
});

// Tutup todo yang diarsipkan
const closeArchivedTodo = document.querySelector("#close-archived-todo");
closeArchivedTodo.addEventListener("click", () => {
  archivedTodo.classList.remove("flex");
  archivedTodo.classList.add("hidden");
});

// Tutup modal ketika mengklik di luar elemen modal
archivedTodo.addEventListener("click", (event) => {
  if (!archivedTodoContent.contains(event.target)) {
    archivedTodo.classList.remove("flex");
    archivedTodo.classList.add("hidden");
  }
});

// Mengubah format tanggal
// Mengubah format tanggal
const createdAtElements = document.querySelectorAll(".created-at"); // Pilih semua elemen dengan kelas "created-at"
const options = {
  weekday: "long",
  year: "numeric",
  month: "long",
  day: "numeric",
};

// Loop melalui semua elemen dan format tanggalnya
createdAtElements.forEach((element) => {
  const originalDate = new Date(element.textContent); // Ambil tanggal asli dari text content
  const formattedDate = originalDate.toLocaleDateString("id-ID", options); // Format tanggal
  element.textContent = formattedDate; // Ganti isi dengan tanggal yang sudah diformat
});

// Tampilkan form edit todo
document.addEventListener("DOMContentLoaded", () => {
  const editButtons = document.querySelectorAll(".edit-todo");
  const editFormContainer = document.getElementById("edit-form");
  const editFormContent = document.querySelector("#edit-form > div");
  const editForm = document.getElementById("edit-form");
  const editTodoTitle = document.getElementById("edit-todo-title");
  const editTodoDescription = document.getElementById("edit-todo-description");
  const editTodoId = document.getElementById("edit-todo-id");
  const closeEditButton = document.getElementById("close-edit-todo-form");

  // Event listener untuk tombol edit
  editButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const todoId = button.getAttribute("data-id");
      const todoTitle = button.getAttribute("data-title");
      const todoDescription = button.getAttribute("data-description");

      // Isi form dengan data todo
      editTodoId.value = todoId;
      editTodoTitle.value = todoTitle;
      editTodoDescription.value = todoDescription;

      // Tampilkan modal form
      editForm.classList.remove("hidden");
      editForm.classList.add("flex");
    });
  });

  // Tutup form edit
  closeEditButton.addEventListener("click", () => {
    editForm.classList.remove("flex");
    editForm.classList.add("hidden");
  });

  // Tutup modal ketika mengklik di luar elemen modal
  editFormContainer.addEventListener("click", (event) => {
    if (!editFormContent.contains(event.target)) {
      editFormContainer.classList.remove("flex");
      editFormContainer.classList.add("hidden");
    }
  });
});
