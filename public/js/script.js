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

function listenSluggable(checkSlugUri, from, to) {
    const title = document.querySelector(`#${from}`);
    const slug = document.querySelector(`#${to}`);

    title.addEventListener('change', function () {
        fetch(`${checkSlugUri}?title=${title.value}`)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
    });
}

function disableTrixFileUpload() {
    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    })
}

function copyText(input) {
    const copyText = document.querySelector(input);
    copyText.select();
    document.execCommand('copy');
}
