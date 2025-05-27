<div class="row">
    <div class="col">
        <h1 class="pt-2 pb-2 text-center">All Photos</h1>
        <form id="add-photo-form" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="photo-title" class="form-label">Title</label>
                <input type="text" class="form-control" id="photo-title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="photo-file" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo-file" name="photo" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Photo</button>
        </form>
        <div id="photo-errors" class="alert alert-danger d-none"></div>
        <div class="row mt-4" id="photo-list"></div>
        <nav>
            <ul class="pagination justify-content-center" id="photo-pagination"></ul>
        </nav>
    </div>
</div>
<script src="./assets/js/services/photo.js" type="module"></script>
<script src="./assets/js/components/photos.js" type="module"></script>
<script type="module">
    import { refreshPhotoList, handleAddPhoto } from './assets/js/components/photos.js';
    document.addEventListener('DOMContentLoaded', () => {
        refreshPhotoList(1);
        handleAddPhoto();
    });
</script>