@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ @$product->id }}">
                        <div class="row">
                            <div class="row">
                                <div class="col-xl-4 col-lg-12">
                                    <div class="form-group">
                                        <div class="image-upload">
                                            <div class="thumb">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview mt-3 {{ @$product->image ? 'has-image' : null }}"
                                                        style="background-image: url({{ getImage(getFilePath('product') . '/' . @$product->image, getFileSize('product')) }})">
                                                        <button type="button" class="remove-image"><i
                                                                class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="avatar-edit">
                                                    <input type="file" class="profilePicUpload p-0" name="image"
                                                        id="profilePicUpload1" accept=".png, .jpg, .jpeg" @if (!@$product) required @endif>
                                                    <label for="profilePicUpload1"
                                                        class="bg--success remove-star">@lang('Upload Image')</label>
                                                    <small class="mt-2  ">@lang('Supported files'): <b>@lang('jpeg'),
                                                            @lang('jpg'), @lang('png').</b> @lang('Image will be resized into')
                                                        {{ getFileSize('product') }} </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>@lang('Category')</label>
                                                <select name="category_id" class="form-control" required>
                                                    <option value="">@lang('Select One')</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id', @$product->category_id) == $category->id ? 'selected' : '' }}>
                                                            {{ __($category->name) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>@lang('Name')</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name', @$product->name) }}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>@lang('Price')</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">{{ $general->cur_sym }}</span>
                                                    <input type="number" step="any" name="price" class="form-control"
                                                        value="{{ getAmount(old('price', @$product->price)) }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="justify-content-between d-flex flex-wrap">
                                                    <span>
                                                        <label>@lang('Accounts')</label>
                                                        <i class="las la-info-circle text--primary" title=""
                                                            data-bs-original-title="@lang('The document must be in .txt format, with each account separated by a new line. You can download a demo template to understand the formatting')"
                                                            aria-label="@lang('The document must be in .txt format, with each account separated by a new line. You can download a demo .txt to understand the formatting')">
                                                        </i>
                                                    </span>
                                                    <a href="{{ route('admin.product.download.demo.txt') }}" class="">
                                                        <i class="las la-download"></i>@lang('Demo Format')
                                                    </a>
                                                </div>
                                                <input type="file" name="file" class="form-control"
                                                    accept="text/plain" @if (!@$product) required @endif>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>@lang('Description') </label>
                                                <i class="las la-info-circle text--primary" title=""
                                                    data-bs-original-title="@lang('This text is what users read when making a purchase, in order to understand the product')"
                                                    aria-label="@lang('This text is what users read when making a purchase, in order to understand the product')">
                                                </i>
                                                <textarea name="description" class="form-control nicEdit" rows="12">{{ old('description', @$product->description) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
<style>
    .avatar-preview {
        position: relative;
    }
    .avatar-preview .profilePicPreview:after {
        height: 100%;
        width: 100%;
        display: flex;
        background: #AFAFAF !important;
        font-size: 70px;
        content: "{{ getFileSize('product') }}";
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        justify-content: center;
        align-items: center;
        color: #656565;
    }
    .avatar-preview .has-image:after {
        display: none;
    }
    .remove-star:after{
        display: none;
    }
</style>
@endpush


