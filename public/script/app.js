document.addEventListener('DOMContentLoaded', () => {
  const documentsList = document.getElementById('dropdownCat');
  const pathname = window.location.href;

  if (!pathname.includes("documents") && !pathname.match(/categories\/\d+/)) {
    documentsList.classList.add("hidden");
  }
});




