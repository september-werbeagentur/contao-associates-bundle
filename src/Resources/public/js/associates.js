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

            selects.forEach(select => {
                const target = form.querySelector(`input[name="${select.dataset.for}"]`);
                const options = select.querySelectorAll('.swa-select__option');
                const input = select.querySelector('.swa-select__input');
                const inputText = select.querySelector('.swa-select__input-text');
                const isServices = select.dataset.for === 'services';
                const isTypes = select.dataset.for === 'types';

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
                        if (isServices) updateTypes(form, option.dataset.pid);
                        if (isTypes) updateServices(form, option.dataset.value);
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

    function updateServices(form, value) {
        const options = form.querySelectorAll('.swa-select[data-for="services"] .swa-select__option');
        if (!options) return;
        options.forEach(option => {
            if (value === '0' || value === option.dataset.pid)
                option.classList.remove(hiddenClass);
            else
                option.classList.add(hiddenClass);
        });
    }

    function updateTypes(form, pid) {
        const options = form.querySelectorAll('.swa-select[data-for="types"] .swa-select__option');
        if (!options) return;
        options.forEach(option => {
            if (pid === '0' || pid === option.dataset.value)
                option.classList.remove(hiddenClass);
            else
                option.classList.add(hiddenClass);
        });
    }

    initForms();
})();
