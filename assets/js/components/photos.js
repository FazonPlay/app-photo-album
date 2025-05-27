import { getPhotos, addPhoto, removePhoto } from "../services/photo.js";

export const refreshPhotoList = async (page = 1) => {
    const photoList = document.getElementById('photo-list');
    const pagination = document.getElementById('photo-pagination');
    const data = await getPhotos(page);

    if (data.results) {
        photoList.innerHTML = data.results.map(photo => `
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="${photo.file_path}" class="card-img-top" alt="${photo.title}">
                    <div class="card-body">
                        <h5 class="card-title">${photo.title}</h5>
                        <button class="btn btn-danger btn-sm delete-photo" data-id="${photo.photo_id}">Delete</button>
                    </div>
                </div>
            </div>
        `).join('');
        // Pagination (simple)
        const totalPages = Math.ceil(data.count / 20);
        pagination.innerHTML = '';
        for (let i = 1; i <= totalPages; i++) {
            pagination.innerHTML += `<li class="page-item${i === page ? ' active' : ''}"><a class="page-link" href="#">${i}</a></li>`;
        }
        pagination.querySelectorAll('a').forEach((a, idx) => {
            a.addEventListener('click', e => {
                e.preventDefault();
                refreshPhotoList(idx + 1);
            });
        });
        // Delete buttons
        document.querySelectorAll('.delete-photo').forEach(btn => {
            btn.addEventListener('click', async e => {
                e.preventDefault();
                if (confirm('Delete this photo?')) {
                    const id = btn.dataset.id;
                    const result = await removePhoto(id);
                    if (result.success) refreshPhotoList(page);
                }
            });
        });
    } else {
        photoList.innerHTML = '<div class="alert alert-danger">Failed to load photos.</div>';
    }
};

export const handleAddPhoto = () => {
    const form = document.getElementById('add-photo-form');
    const errorDiv = document.getElementById('photo-errors');
    form.addEventListener('submit', async e => {
        e.preventDefault();
        const formData = new FormData(form);
        const result = await addPhoto(formData);
        if (result.success) {
            form.reset();
            errorDiv.classList.add('d-none');
            refreshPhotoList(1);
        } else {
            errorDiv.textContent = (result.errors || ['Failed to add photo']).join(', ');
            errorDiv.classList.remove('d-none');
        }
    });
};