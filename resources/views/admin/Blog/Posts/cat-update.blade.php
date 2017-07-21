<div class="col-md-8">
    <!-- <select id="category" name="category" class="form-control" multiple required autofocus> -->
    @if (isset($categories) && $categories)
        @foreach ($categories as $category)
          <div class="control-group">
            <div class="controls">
              <input id="{{ $category->system_name }}" type="checkbox" {{ in_array($category->id, $categories_used_ids) ? 'checked' : '' }} name="category[]" value="{{ $category->id }}"><label for="{{ $category->system_name }}">{{ $category->name }}<span></span></label>
            </div>
          </div>
          <!-- <option value="{{ $category->system_name }}">{{ $category->name }}</option> -->
        @endforeach
    @endif
    <!-- </select> -->

    @if ($errors->has('category'))
        <span class="help-block">
            <strong>{{ $errors->first('category') }}</strong>
        </span>
    @endif
</div>
