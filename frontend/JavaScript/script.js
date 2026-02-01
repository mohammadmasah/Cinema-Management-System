const deleteBtn = document.querySelectorAll(".btn-delete");

  deleteBtn.forEach((button) => {
    button.addEventListener("click", function () {
      const movieId = this.getAttribute("data-id");

      if (confirm("are you sure you want delete movie #" + movieId + "?")) {
        window.location.href = "../backend/libraries/delete.php?id=" + movieId;
      }
    });
  });
