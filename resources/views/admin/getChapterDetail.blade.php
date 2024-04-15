@include('layout.admin.header')

<style>
    .error {
        color: red;
    }
</style>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <!-- <li><a href="#">Table</a></li> -->
                    <li class="active">Add Chapter</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@if (session()->has('course'))
    <div class="alert alert-success">
        {{ session()->get('course') }}
    </div>
@endif
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">View Chapter</strong>
                    </div>
                    <div class="card-body">


                        <form method="post" action="{{ url('admin/update-chapter') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $chapter->id }}">
                            <div class="form-group">
                                <label class="form-label required">Select Topic</label>
                                <select class="form-select" name="topic_id" aria-label="Default select example"
                                    readonly>
                                    <option selected>Open this select menu</option>
                                    @foreach ($topic as $topics)
                                        <option value="{{ $topics->id }}"
                                            {{ $chapter->topic_id == $topics->id ? 'selected' : '' }}>
                                            {{ $topics->topic_name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="form-label required">Chapter Image</label>
                                <br>
                                <img src="{{ asset('ChapterImage/' . $chapter->image) }}" alt="Girl in a jacket"
                                    style="width: 100px;height: 70px;">
                            </div><br>

                            <div class="form-group">
                                <label class="form-label required">Chapter Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input name="chapter_name" id="last_name"
                                    class="form-control form-control-lg form-control-solid"
                                    value="{{ $chapter->chapter_name }}" readonly>

                            </div>

                            <div class="form-group">
                                <label class="form-label required">Chapter Sub Title</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input name="chapter_subtitle" id="last_name"
                                    class="form-control form-control-lg form-control-solid"
                                    value="{{ $chapter->chapter_subtitle }}" readonly>

                            </div>



                            <div class="form-group">
                                <label class="form-label required"> Upload PDF</label>
                                <input type="file" name="pdf" accept="application/pdf" />
                            </div><br>


                            <div class="form-group">
                                <label class="form-label required">Chapter Description</label>
                                <textarea class="ckeditor form-control" value="{{ $chapter->chapter_description }}" name="chapter_description" readonly>{{ $chapter->chapter_description }}</textarea>

                            </div><br>
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->
@include('layout.admin.footer')

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
