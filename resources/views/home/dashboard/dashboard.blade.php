@extends('home.layouts.layout')

@section('migaspan')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Timeline</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dasboard</a></li>
                <li class="breadcrumb-item active">Home</li>
            </ol>
        </div>
    </div>
@endsection


@section('content')
    <div class="col-lg-12">
        <div class="card">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Timeline</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                @include('home.dashboard.timeline')
                <!--second tab-->
                @include('home.dashboard.profile')
                @include('home.dashboard.settings')
            </div>
        </div>
@endsection



@push('scripts')
    <script>


        $(document).ready(function() {
            @forEach($documentstimeline as $document)
            $('#link{{$document->id}}').click(function() {
                $('#formlike{{$document->id}}').submit();
                return false;
            });
            @endforeach
        });


    </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
            <script src="/adminlte/bower_components/ckeditor/ckeditor.js"></script>
            <script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
            <script>
                new Drift(document.querySelector('img'), {
                    paneContainer: document.querySelector('p')
                });
            </script>

            <script>

                var myDropzone = new Dropzone('.dropzone', {
                    url: 'settings/{{$user->id}}/photo',
                    paramName: 'user',
                    acceptedFiles: 'image/jpeg,image/jpg,image/png',
                    maxFilesize: 10,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'

                    },
                    dictDefaultMessage:
                        '<br><br><p>Arrastra aquí tu foto</p>'
                });

                Dropzone.autoDiscover = false;
            </script>
@endpush