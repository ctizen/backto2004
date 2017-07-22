(function() {
    var parser = new DOMParser();
    var body = document.body;
    var html = document.documentElement;
    var loading = false;
    var page = 1;

    window.addEventListener('load', function() {
        var sort = document.querySelector('input#sortOrder').value;
        window.addEventListener('scroll', function() {
            var height = Math.max( body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight );

            if ((height - window.innerHeight - window.scrollY < 2000) && !loading) {
                loading = true;
                setTimeout(function() {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'www/index.php?raw=true&sort=' + sort + '&page=' + (++page), true);
                    xhr.send(null);
                    xhr.onreadystatechange = function(e) {
                        var xhr = e.target;
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var doc = parser.parseFromString(xhr.responseText, "text/html");
                            var marker = document.querySelector('tr.load_more');
                            doc.querySelector('tbody.insertion_data').childNodes.forEach(function(node) {
                                marker.parentNode.appendChild(node);
                            });
                            marker.parentNode.removeChild(marker);
                        }

                        if (xhr.readyState === 4) {
                            loading = false;
                        }
                    }
                }, 0);
            }
        });
    });
})();