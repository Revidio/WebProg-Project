@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-4">Add New Tip</h1>

    <form method="POST" action="/admin/tips" enctype="multipart/form-data">
        @csrf

        <label>Title</label>
        <input type="text" name="title" class="w-full border p-2 mb-4" required>

        <label>Description</label>
        <textarea name="description" class="w-full border p-2 mb-4" required></textarea>

        <label>Benefits (one per line)</label>
        <textarea name="benefits" class="w-full border p-2 mb-4" required></textarea>

        <label>Energy Saving</label>
        <input type="text" name="energy_saving" class="w-full border p-2 mb-4" required>

        <label>Image (optional)</label>
        <input type="file" name="image" class="w-full border p-2 mb-4">

        <button class="px-4 py-2 bg-green-600 text-white rounded">Save</button>
    </form>

</div>
@endsection
