// Opens a book from the shelf as an open book in a dialog.
var dialog = document.getElementById('book-dialog');
var books = document.querySelectorAll('.book');

books.forEach(function (book) {
    book.addEventListener('click', function () {
        document.getElementById('book-title').textContent = book.dataset.title;
        document.getElementById('book-author').textContent = book.dataset.author;
        document.getElementById('book-year').textContent = book.dataset.year;
        document.getElementById('book-year-row').hidden = book.dataset.year === '';
        document.getElementById('book-category').textContent = book.dataset.category;
        document.getElementById('book-call').textContent = book.dataset.call;
        document.getElementById('book-summary').textContent = book.dataset.summary;
        dialog.style.setProperty('--cloth', getComputedStyle(book).getPropertyValue('--cloth'));
        document.body.classList.add('book-open');
        dialog.showModal();
    });
});

document.getElementById('book-close').addEventListener('click', function () {
    dialog.close();
});

dialog.addEventListener('click', function (event) {
    if (event.target === dialog) {
        dialog.close();
    }
});

dialog.addEventListener('close', function () {
    document.body.classList.remove('book-open');
});

document.getElementById('book-print').addEventListener('click', function () {
    window.print();
});
