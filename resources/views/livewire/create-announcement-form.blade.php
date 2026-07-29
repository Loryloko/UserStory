<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            
            <div class="card shadow-sm p-4 bg-white border-0 rounded-3">
                <h2 class="mb-4 fw-bold text-dark text-center">{{ __('ui.createAnnouncementTitle') }}</h2>
                
                @if (session()->has('successMessage'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center border-0 shadow-sm mb-4" role="alert">
                        <div>{{ session('successMessage') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form wire:submit.prevent="store">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('ui.announcementTitleLabel') }}</label>
                        <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" placeholder="{{ __('ui.announcementTitlePlaceholder') }}">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">{{ __('ui.priceLabel') }}</label>
                            <div class="input-group">
                                <span class="input-group-text">€</span>
                                <input type="number" step="0.01" wire:model="price" class="form-control @error('price') is-invalid @enderror" placeholder="0.00">
                                @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">{{ __('ui.categoryLabel') }}</label>
                            <select wire:model="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                <option value="">{{ __('ui.chooseCategoryPlaceholder') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ __("ui.$category->name") }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('ui.descriptionLabel') }}</label>
                        <textarea wire:model="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('ui.descriptionPlaceholder') }}"></textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">{{ __('ui.imagesLabel') }}</label>
                        <input type="file" wire:model="temporary_images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror">
                        @error('temporary_images.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        
                        @if (!empty($images))
                            <p class="mt-3 mb-0 fw-semibold text-muted">{{ __('ui.previewImagesTitle') }}</p>
                            <div class="row border border-4 border-success rounded shadow py-4 bg-light">
                                @foreach ($images as $key => $image)
                                    <div class="col d-flex flex-column align-items-center my-3">
                                        <div class="img-preview mx-auto shadow rounded" 
                                             style="background-image: url('{{ $image->temporaryUrl() }}');">
                                        </div>
                                        <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{ $key }})">X</button>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">
                        {{ __('ui.publishAnnouncementBtn') }}
                    </button>

                </form>
            </div>

        </div>
    </div>
</div>
