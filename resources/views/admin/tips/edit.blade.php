@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Edit Tip</h1>

    <form method="POST" action="/admin/tips/{{ $tip->id }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Title</label>
        <input type="text" name="title" value="{{ $tip->title }}"
               class="w-full border p-2 mb-4" required>

        <label>Description</label>
        <textarea name="description" class="w-full border p-2 mb-4" required>{{ $tip->description }}</textarea>

        <label>Benefits</label>
        <textarea name="benefits" class="w-full border p-2 mb-4" required>{{ $tip->benefits }}</textarea>

        <label>Energy Saving</label>
        <input type="text" name="energy_saving" value="{{ $tip->energy_saving }}"
               class="w-full border p-2 mb-4" required>

        <label>Current Image (if any)</label><br>
        @if($tip->image)
            <img src="{{ asset('storage/' . $tip->image) }}" class="w-40 rounded mb-4">
        @endif

        <label>Change Image</label>
        <input type="file" name="image" class="w-full border p-2 mb-4">

        <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
    </form>

</div>
@endsection