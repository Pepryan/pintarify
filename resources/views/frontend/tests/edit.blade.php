@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.test.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.tests.update", [$test->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="course_id">{{ trans('cruds.test.fields.course') }}</label>
                            <select class="form-control select2" name="course_id" id="course_id">
                                @foreach($courses as $id => $course)
                                    <option value="{{ $id }}" {{ (old('course_id') ? old('course_id') : $test->course->id ?? '') == $id ? 'selected' : '' }}>{{ $course }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('course'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.test.fields.course_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="lesson_id">{{ trans('cruds.test.fields.lesson') }}</label>
                            <select class="form-control select2" name="lesson_id" id="lesson_id">
                                @foreach($lessons as $id => $lesson)
                                    <option value="{{ $id }}" {{ (old('lesson_id') ? old('lesson_id') : $test->lesson->id ?? '') == $id ? 'selected' : '' }}>{{ $lesson }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('lesson'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('lesson') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.test.fields.lesson_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="title">{{ trans('cruds.test.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $test->title) }}">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.test.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.test.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $test->description) }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.test.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_published" value="0">
                                <input type="checkbox" name="is_published" id="is_published" value="1" {{ $test->is_published || old('is_published', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_published">{{ trans('cruds.test.fields.is_published') }}</label>
                            </div>
                            @if($errors->has('is_published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.test.fields.is_published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection