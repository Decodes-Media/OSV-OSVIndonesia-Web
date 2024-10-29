document.addEventListener("DOMContentLoaded", function () {
    const projects = document.querySelectorAll(".project-item");
    const loadMoreBtn = document.getElementById("load-more-btn");
    let projectsPerPage = 5;
    let currentPage = 1;

    function showProjects() {
        const end = currentPage * projectsPerPage;
        projects.forEach((project, index) => {
            if (index < end) {
                project.style.display = "block";
            } else {
                project.style.display = "none";
            }
        });

        if (end >= projects.length) {
            loadMoreBtn.style.display = "none";
        } else {
            loadMoreBtn.style.display = "block";
        }
    }

    showProjects();

    loadMoreBtn.addEventListener("click", function () {
        currentPage++;
        showProjects();
    });
});
