
// document.addEventListener('DOMContentLoaded', (event) => {
//             const pages = document.querySelectorAll('.page');
//             const prevButton = document.getElementById('prev');
//             const nextButton = document.getElementById('next');
//             let currentPage = <?php echo $page; ?>;

//             const updatePagination = () => {
//                 pages.forEach((page, index) => {
//                     page.classList.remove('active');
//                     if (parseInt(page.textContent) === currentPage) {
//                         page.classList.add('active');
//                     }
//                 });
//             };

//             prevButton.addEventListener('click', (event) => {
//                 event.preventDefault();
//                 if (currentPage > 1) {
//                     currentPage--;
//                     window.location.href = `?page=${currentPage}`;
//                 }
//             });

//             nextButton.addEventListener('click', (event) => {
//                 event.preventDefault();
//                 if (currentPage < <?php echo $total_pages; ?>) {
//                     currentPage++;
//                     window.location.href = `?page=${currentPage}`;
//                 }
//             });

//             pages.forEach((page) => {
//                 page.addEventListener('click', (event) => {
//                     event.preventDefault();
//                     currentPage = parseInt(page.textContent);
//                     window.location.href = `?page=${currentPage}`;
//                 });
//             });

//             updatePagination();
//         });

window.onload=()=>{
    const tran=document.querySelector(".company-container");
    tran.classList.add("active");
}

      document.addEventListener('DOMContentLoaded', (event) => {
    const pages = document.querySelectorAll('.page');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    let currentPage = 0;

    const updatePagination = () => {
        pages.forEach((page, index) => {
            page.classList.remove('active');
            if (index === currentPage) {
                page.classList.add('active');
                page.parentElement.classList.remove('hidden');
            } else if (index === 0 || index === pages.length - 1 || (index > currentPage - 2 && index < currentPage + 2)) {
                page.parentElement.classList.remove('hidden');
            } else {
                page.parentElement.classList.add('hidden');
            }
        });

        // Toggle visibility of the dots
        const dots = document.querySelector('.dots');
        if (currentPage === pages.length - 1) {
            dots.classList.add('hidden');
        } else {
            dots.classList.remove('hidden');
        }
    };

    prevButton.addEventListener('click', (event) => {
        event.preventDefault();
        if (currentPage > 0) {
            currentPage--;
            updatePagination();
        }
    });

    nextButton.addEventListener('click', (event) => {
        event.preventDefault();
        if (currentPage < pages.length - 1) {
            currentPage++;
            updatePagination();
        }
    });

    pages.forEach((page, index) => {
        page.addEventListener('click', (event) => {
            event.preventDefault();
            currentPage = index;
            updatePagination();
        });
    });

    updatePagination();
});

