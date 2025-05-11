<div class="form-group">
    <label for="skills">Skills</label>
    <select name="skills[]" multiple class="form-control">
        @foreach($skills as $skill)
            <option value="{{ $skill->id }}"
                {{ isset($expert) && $expert->skills->contains($skill->id) ? 'selected' : '' }}>
                {{ $skill->name }}
            </option>
        @endforeach
    </select>
</div>
