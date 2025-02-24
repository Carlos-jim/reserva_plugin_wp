document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("employeeModal");
    var btn = document.getElementById("openModal");
    var span = document.getElementsByClassName("close")[0];
    var cancel = document.querySelector(".cancel");

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    cancel.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
