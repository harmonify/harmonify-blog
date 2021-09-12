function goBack() {
    window.history.back();
}

function scrollToTop() {
    const c = document.documentElement.scrollTop || document.body.scrollTop;
    if (c > 0) {
        window.requestAnimationFrame(scrollToTop);
        window.scrollTo(0, c - c / 8);
    }
};

function listenSluggable() {
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function () {
        fetch(`/dashboard/posts/checkSlug?title=${title.value}`)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
    });
}

function disableTrixFileUpload() {
    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    })
}