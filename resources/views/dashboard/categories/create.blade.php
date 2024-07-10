@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new category</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/categories/store" method="post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label @error('name') is-invalid @enderror">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus
                    value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label @error('slug') is-invalid @enderror">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" required
                    value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('input', function() {
            const nameValue = name.value.trim().toLowerCase();
            const generatedSlug = nameValue.split(' ').join('-');
            slug.value = generatedSlug;
        });
    </script>
@endsection
