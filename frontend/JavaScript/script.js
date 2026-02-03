console.log("JS is loaded!");
const deleteBtn = document.querySelectorAll(".btn-delete");

deleteBtn.forEach((button) => {
  button.addEventListener("click", function () {
    const movieId = this.getAttribute("data-id");

    if (confirm("are you sure you want delete movie #" + movieId + "?")) {
      window.location.href = "../backend/libraries/delete.php?id=" + movieId;
    }
  });
});

function editMovie(btn) {
  document.getElementById("form-movie-id").value = btn.getAttribute("data-id");
  document.getElementById("form-title").value = btn.getAttribute("data-title");
  document.getElementById("form-director").value =
    btn.getAttribute("data-director");
  document.getElementById("form-duration").value =
    btn.getAttribute("data-duration");
  document.getElementById("form-release-year").value =
    btn.getAttribute("data-year");

  const form = document.getElementById("movie-form");
  form.action = "../backend/libraries/update_movies.php";

  const submitBtn = document.getElementById("submit-btn");
  if (submitBtn) {
    submitBtn.innerText = "Confirm Update";
    submitBtn.style.backgroundColor = "orange";
  }
}

document.addEventListener("click", async (e) => {
  const btn = e.target.closest(".btn-delete-room");
  if (!btn || !confirm("Are you sure you want to deactivate (Soft Delete) this hall")) return;

  const listItem = btn.closest("li");
  const url = `/W-WEB-102-PAR-1-1-my_cinema-26/backend/controllers/delete_room.php?id=${btn.dataset.id}`;

  try {
    const response = await fetch(url);
    const data = await response.json();
    if (data.success) listItem.remove();
  } catch (err) {
    console.error("Delete failed");
  }
});