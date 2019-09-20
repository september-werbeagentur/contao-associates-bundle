(() => {
    // polyfill for NodeList.forEach
    if (window.NodeList && !NodeList.prototype.forEach) {
        NodeList.prototype.forEach = Array.prototype.forEach;
    }

    const activeClass = 'active';
    const hiddenClass = 'hidden';
    const forms = document.querySelectorAll('.swa-associates-finder__form');

    function initForms() {
        forms.forEach(form => {
            form.closest('.mod_article').classList.remove('block');
            const selects = form.querySelectorAll('.swa-select');
            const typesSelect = form.querySelector('.swa-select[data-for="types"]');
            const servicesSelect = form.querySelector('.swa-select[data-for="services"]');

            function updateServices(id) {
                const options = servicesSelect.querySelectorAll('.swa-select__option');
                if (id !== '0') {
                    options.forEach(option => {
                        if (option.dataset.pid === '0') return;
                        if (id === option.dataset.pid) {
                            option.classList.remove(hiddenClass);
                        } else {
                            option.classList.add(hiddenClass);
                        }
                    });
                    options.forEach(o => {
                        o.dataset.pid === '0'
                            ? o.classList.add(activeClass)
                            : o.classList.remove(activeClass);
                    });
                    form.querySelector('input[name="services"]').value = options[0].dataset.value;
                    servicesSelect.querySelector('.swa-select__input-text').innerHTML = options[0].innerHTML;
                } else {
                    options.forEach(option => {
                        option.classList.remove(hiddenClass);
                    });
                }
            }

            function updateTypes(pid) {
                const options = typesSelect.querySelectorAll('.swa-select__option');
                const target = form.querySelector('input[name="types"');
                if (pid !== '0') {
                    options.forEach(option => {
                        if (option.dataset.value === '0') return;
                        if (pid === option.dataset.value) {
                            options.forEach(o => o.classList.remove(activeClass));
                            option.classList.add(activeClass);
                            target.value = option.dataset.value;
                            typesSelect.querySelector('.swa-select__input-text').innerHTML = option.innerHTML;
                        }
                    });
                }
            }

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
                        if (select === servicesSelect) updateTypes(option.dataset.pid);
                        else if (select === typesSelect) updateServices(option.dataset.value);
                    });
                });

                input.addEventListener('click', e => {
                    select.classList.contains(activeClass) ? close() : open();
                });
            });
        });
    }

    initForms();
})();
