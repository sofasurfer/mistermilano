document.addEventListener("DOMContentLoaded", function () {
    const projectBlocks = document.querySelectorAll('.c-content__projects');
    const queryParams = new URLSearchParams(window.location.search);
    const currentCategoryOnLoad = queryParams.get('category') || false;

    for (let project of projectBlocks) {
        const filterElements = project.querySelectorAll('.c-filter-list li');
        const projectElements = project.querySelectorAll('.c-content__projects__item');
        const projectCategory = project.dataset.category;
        // if (currentCategoryOnLoad === projectCategory) {
        //     project.classList.add('c-active');
        // }

        for (let button of filterElements) {
            button.addEventListener('click', (event) => {
                event.preventDefault();
                const filter = button.dataset.filter;
                const filter_url = `?category=${filter}`;
                window.history.pushState(null, null, filter_url);

                filterProjectElements(projectElements, filter);
            });
        }
    }

    let filterProjectElements = (elements, filter) => {
        if (!elements) {
            return
        }

        for (let project of elements) {
            const projectCategory = JSON.parse(project.dataset.filter);

            if (projectCategory.includes(filter)) {
                console.log('YES')
                project.classList.add('c-active');
            } else {
                console.log('NO')
                project.classList.remove('c-active');
            }
        }
    }
});
