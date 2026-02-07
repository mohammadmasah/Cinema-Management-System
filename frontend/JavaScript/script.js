console.log("JS is loaded!");
const deleteBtn = document.querySelectorAll(".btn-delete");

deleteBtn.forEach((button) => {
  button.addEventListener("click", function () {
    const movieId = this.getAttribute("data-id");

    if (confirm("are you sure you want delete movie #" + movieId + "?")) {
      window.location.href = "../../backend/libraries/delete_movies.php?id=" + movieId;
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
  form.action = "../../backend/libraries/update_movies.php";

  const submitBtn = document.getElementById("submit-btn");
  if (submitBtn) {
    submitBtn.innerText = "Confirm Update";
    submitBtn.style.backgroundColor = "orange";
  }
}

document.addEventListener("click", async (e) => {
  const btn = e.target.closest(".btn-delete-room");
  if (
    !btn ||
    !confirm("Are you sure you want to deactivate (Soft Delete) this hall")
  )
    return;

  const listItem = btn.closest("li");
  const url = `../../backend/controllers/delete_room.php?id=${btn.dataset.id}`;

  try {
    const response = await fetch(url);
    const data = await response.json();
    if (data.success) listItem.remove();
  } catch (err) {
    console.error("Delete failed");
  }
});

function editRoom(btn) {
  document.getElementById("form-room-id").value = btn.getAttribute("data-id");
  document.getElementById("form-room-name").value =
    btn.getAttribute("data-name");
  document.getElementById("form-room-capacity").value =
    btn.getAttribute("data-capacity");
  document.getElementById("form-room-type").value =
    btn.getAttribute("data-type");

  const form = document.getElementById("room-form");
  form.action = "../../backend/controllers/update_room.php";

  const submitBtn = document.getElementById("submit-btn-room");
  if (submitBtn) {
    submitBtn.innerText = "Confirm Update";
  }
}

function editScreening(btn) {
  console.log("Edit button clicked!");

  const id = btn.getAttribute("data-id");
  const movie = btn.getAttribute("data-movie");
  const room = btn.getAttribute("data-room");
  const time = btn.getAttribute("data-time");

  const formId = document.getElementById("form-screening-id");
  const movieSelect = document.getElementById("form-movie-id");
  const roomSelect = document.getElementById("form-room-id");
  const timeInput = document.getElementById("form-start-time");

  if (formId && movieSelect && roomSelect && timeInput) {
    formId.value = id;
    movieSelect.value = movie;
    roomSelect.value = room;
    timeInput.value = time;

    document.getElementById("screening-form").action =
      "../../backend/controllers/update_screening.php";
    document.getElementById("form-title").innerText = "Update Screening";
    document.getElementById("submit-btn").innerText = "Confirm Update";
    document.getElementById("cancel-btn").style.display = "inline";

    window.scrollTo({ top: 0, behavior: "smooth" });
  } else {
    alert("error: same elemnts is not find");
    console.log({ formId, movieSelect, roomSelect, timeInput });
  }
}



