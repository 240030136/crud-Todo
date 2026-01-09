// search
const searchInput = document.getElementById('searchTodo');

searchInput.addEventListener('keyup', () => {
    const keyword = searchInput.value.toLowerCase();
    const todos = document.querySelectorAll('.todo-search-item');

    todos.forEach(todo => {
        const title = todo.dataset.title;
        const desc  = todo.dataset.desc;

        if (title.includes(keyword) || desc.includes(keyword)) {
            todo.style.display = 'flex';
        } else {
            todo.style.display = 'none';
        }
    });
});
