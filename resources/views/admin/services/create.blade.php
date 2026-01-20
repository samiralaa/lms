@extends('layouts.app')

@section('title', 'Add New Service')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <h2 class="fw-bold text-primary mb-4">
                <i class="bi bi-wrench"></i> Add New Service
            </h2>

            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Service Name -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Service Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter service name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label class="form-label fw-bold">Upload Icon</label>
                    <input type="file" id="iconInput" name="icon"
                        class="form-control @error('icon') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Upload an icon for this service.</small>
                    @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Service Description -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Service Description</label>
                    <textarea name="description" id="descriptionInput" class="form-control @error('description') is-invalid @enderror"
                        placeholder="Enter service description">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
               {{-- category --}}
               <div class="mb-3">
                   <label for="category" class="form-label fw-bold">Category</label>
                   <select id="category" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option value="">Select a category</option>
                    <option value="">Product</option>
                    <option value="">Service</option>
                   </select>
               </div>


                <div id="iconPreviewContainer" class="mt-3"></div>

                <!-- Submit & Cancel Buttons -->
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('services') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Save Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Icon Preview and Removal -->
<script>
    document.getElementById('iconInput').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('iconPreviewContainer');
        previewContainer.innerHTML = ''; // Clear previous images

        if (event.target.files.length > 0) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const colDiv = document.createElement('div');
                colDiv.className = 'position-relative d-inline-block';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-thumbnail rounded';

                const removeBtn = document.createElement('button');
                removeBtn.className = 'btn btn-danger btn-sm position-absolute top-0 end-0 m-1';
                removeBtn.innerHTML = '&times;';
                removeBtn.onclick = function() {
                    colDiv.remove();
                    document.getElementById('iconInput').value = ''; // Clear input field
                };

                colDiv.appendChild(img);
                colDiv.appendChild(removeBtn);
                previewContainer.appendChild(colDiv);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
