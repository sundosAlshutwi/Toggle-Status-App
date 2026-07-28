document.addEventListener("DOMContentLoaded", function () {
    const table = document.getElementById("dataTable");

    table.addEventListener("click", function (e) {
        if (!e.target.classList.contains("toggle-btn")) return;

        const btn = e.target;
        const id = btn.getAttribute("data-id");
        btn.disabled = true;

        fetch("toggle.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "id=" + encodeURIComponent(id)
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.success) {
                    const cell = document.getElementById("status-" + data.id);
                    cell.textContent = data.status;
                } else {
                    alert(data.message || "حدث خطأ أثناء تحديث الحالة");
                }
            })
            .catch(() => alert("تعذر الاتصال بالسيرفر"))
            .finally(() => {
                btn.disabled = false;
            });
    });
});
