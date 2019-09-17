(() => {
    // polyfill for NodeList.forEach
    if (window.NodeList && !NodeList.prototype.forEach) {
        NodeList.prototype.forEach = Array.prototype.forEach;
    }

    function initForms() {
        const activeClass = 'active';
        const forms = document.querySelectorAll('.swa-associates-finder__form');

        forms.forEach(form => {
            form.closest('.mod_article').classList.remove('block');
            const selects = document.querySelectorAll('.swa-select');

            selects.forEach(select => {
                const target = form.querySelector(`input[name="${select.dataset.for}"]`);
                const options = select.querySelectorAll('.swa-select__option');
                const input = select.querySelector('.swa-select__input');
                const inputText = select.querySelector('.swa-select__input-text');

                function open() {
                    selects.forEach(select => {
                        select.classList.remove(activeClass);
                    });
                    select.classList.add(activeClass);
                }

                function close() {
                    select.classList.remove(activeClass);
                }

                options.forEach(option => {
                    option.addEventListener('click', e => {
                        options.forEach(option => option.classList.remove(activeClass));
                        option.classList.add(activeClass);
                        target.value = option.dataset.value;
                        inputText.innerHTML = option.innerHTML;
                        close();
                    });
                });

                input.addEventListener('click', e => {
                    if (select.classList.contains(activeClass)) {
                        close();
                    } else {
                        open();
                    }
                });
            });
        });
    }

    initForms();
})();
