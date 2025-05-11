<div class="mb-4">
    <label class="block mb-1">Name</label>
    <input type="text" name="name" value="{{ old('name', $expert->name ?? '') }}" class="w-full border px-3 py-2 rounded">
</div>

<div class="mb-4">
    <label class="block mb-1">Email</label>
    <input type="email" name="email" value="{{ old('email', $expert->email ?? '') }}" class="w-full border px-3 py-2 rounded">
</div>

<div class="mb-4">
    <label class="block mb-1">Location</label>
    <input type="text" name="location" value="{{ old('location', $expert->location ?? '') }}" class="w-full border px-3 py-2 rounded">
</div>

<div class="mb-4">
    <label class="block mb-1">Skills</label>
    <select name="skills[]" multiple class="w-full border px-3 py-2 rounded">
        @foreach ($skills as $skill)
            <option value="{{ $skill->id }}"
                @if (isset($expert) && $expert->skills->contains($skill->id)) selected @endif>
                {{ $skill->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="block mb-1">Certificate (PDF)</label>
    <input type="file" name="certificate" class="w-full border px-3 py-2 rounded">
</div>

<div class="mb-4">
    <label class="block mb-1">Photo</label>
    <input type="file" name="photo" class="w-full border px-3 py-2 rounded">
</div>

<button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded" type="submit">
    {{ isset($expert) ? 'Update' : 'Create' }}
</button>
