(() => {
    // polyfill for NodeList.forEach
    if (window.NodeList && !NodeList.prototype.forEach) {
        NodeList.prototype.forEach = Array.prototype.forEach;
    }

    function initForms() {
        const activeClass = 'selected';
        const forms = document.querySelectorAll('.swa-associates-finder__form');

        forms.forEach(form => {
            const selects = document.querySelectorAll('.swa-select');

            selects.forEach(select => {
                const target = form.querySelector(`input[name="${select.dataset.for}"]`);
                console.log(target);
                const options = select.querySelectorAll('.swa-select__option');
                const selected = select.querySelector('.swa-select__selected');

                options.forEach(option => {
                    option.addEventListener('click', e => {
                        options.forEach(option => option.classList.remove(activeClass));
                        option.classList.add(activeClass);
                        target.value = option.dataset.value;
                        selected.innerHTML = option.innerHTML;
                    });
                });
            });
        });
    }

    initForms();
})();
