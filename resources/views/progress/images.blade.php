@extends('layout')

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/basic.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    .dropzone {
        border:2px dashed #999999;
        border-radius: 10px;
    }
    .dropzone .dz-default.dz-message {
        height: 171px;
        background-size: 132px 132px;
        margin-top: -101.5px;
        background-position-x:center;

    }
    .dropzone .dz-default.dz-message span {
        display: block;
        margin-top: 145px;
        font-size: 20px;
        text-align: center;
    }
</style>
@endpush

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Advance Images</h4>
  </div>
  <div class="panel-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ url('/advance-images/'.$advance) }}" enctype="multipart/form-data" class="dropzone" id="fileupload">
        @csrf
        <div class="form-group">
            <div class="fallback">
                <input name="file" type="files" multiple accept="image/jpeg, image/png, image/jpg" />
              </div>
        </div>
      </form>
  </div>
</div>

<div class="panel panel-flat">
    <div class="panel-heading">
      <h4 class="panel-title">Advance Images List</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-togglable table-hover datatable datatable-header-basic">
                <thead>
                    <tr>
                        <th data-hide="phone, tablet">#</th>
                        <th data-toggle="true">Image Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($images as $image)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$image->image}}</td>
                    <td>
                        <img src="{{ url('/storage/'.$image->path) }}" alt="{{$image->image}}" height="100px">
                    </td>
                    <td>
                        <form action="{{ url('advance-image/destroy', $image->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit">
                                <i class="icon-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script type="text/javascript">
  Dropzone.options.fileupload = {
    accept: function (file, done) {
      if (file.type != "application/vnd.ms-excel" && file.type != "image/jpeg, image/png, image/jpg") {
        done("Error! Files of this type are not accepted");
      } else {
        done();
      }
    }
  }

Dropzone.options.fileupload = {
  acceptedFiles: "image/jpeg, image/png, image/jpg"
}

if (typeof Dropzone != 'undefined') {
  Dropzone.autoDiscover = false;
}

;
(function ($, window, undefined) {
  "use strict";

  $(document).ready(function () {
    // Dropzone Example
    if (typeof Dropzone != 'undefined') {
      if ($("#fileupload").length) {
        var dz = new Dropzone("#fileupload"),
          dze_info = $("#dze_info"),
          status = {
            uploaded: 0,
            errors: 0
          };
        var $f = $('<tr><td class="name"></td><td class="size"></td><td class="type"></td><td class="status"></td></tr>');
        dz.on("success", function (file, responseText) {

            var _$f = $f.clone();

            _$f.addClass('success');

            _$f.find('.name').html(file.name);
            if (file.size < 1024) {
              _$f.find('.size').html(parseInt(file.size) + ' KB');
            } else {
              _$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
            }
            _$f.find('.type').html(file.type);
            _$f.find('.status').html('Uploaded <i class="entypo-check"></i>');

            dze_info.find('tbody').append(_$f);

            status.uploaded++;

            dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');

            toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {
              timeOut: 50000000
            });

          })
          .on('error', function (file) {
            var _$f = $f.clone();

            dze_info.removeClass('hidden');

            _$f.addClass('danger');

            _$f.find('.name').html(file.name);
            _$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
            _$f.find('.type').html(file.type);
            _$f.find('.status').html('Uploaded <i class="entypo-cancel"></i>');

            dze_info.find('tbody').append(_$f);

            status.errors++;

            dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');

            toastr.error('Your File Uploaded Not Successfully!!', 'Error Alert', {
              timeOut: 5000
            });
          });
      }
    }
  });
})(jQuery, window); 
</script>
@endpush