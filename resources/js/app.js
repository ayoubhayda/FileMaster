import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Get the file input element
const fileInput = document.getElementById('dropzone-file');

// Get the file name element
const fileNameElement = document.getElementById('file-name');
const UploadIconElement = document.getElementById('upload-icon');

// Add an event listener for file selection
fileInput.addEventListener('change', (event) => {
  // Get the selected file
  const file = event.target.files[0];

  // Display the file name
  fileNameElement.innerHTML = `<span class="font-semibold text-green-600">${file.name}</span>`;
  UploadIconElement.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mb-3 text-green-600">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>`;
});

