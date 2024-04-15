@include('layout.admin.header')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Chapter List</h1>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <!-- <li><a href="#">Table</a></li> -->
                    <li class="active">Chapter List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@if (session()->has('chapter'))
    <div class="alert alert-success">
        {{ session()->get('chapter') }}
    </div>
@endif


<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"></strong>
                        <a href="{{ url('admin/add-chapter') }}" style="float: right;" class="add">
                            <i class="fa fa-plus" aria-hidden="true" id="icn"></i>Add Chapter
                        </a>
                    </div>
                    <div class="card-body">

                        @foreach ($chapter as $chapters)
                            <div class="col-sm-3">
                                <div class="boxcoures">
                                    <img src="{{ asset('ChapterImage/' . $chapters->image) }}" alt=""
                                        class="image">
                                    <h5 class="cour">{{ $chapters->chapter_subtitle }}</h5>
                                    <?php $text = strip_tags($chapters->chapter_description);
                                    $desc = Str::limit($text, 100); ?>
                                    <p class="textcoure">{{ $desc }}</p>
                                    <div class="overlay">
                                        <div class="text">
                                            <a href="{{ url('/admin/chapter-detail/' . $chapters->id) }}"><i
                                                    class="fa fa-eye" aria-hidden="true" id="icn"
                                                    style="background-color: #fff; padding: 3px;"></i></a>
                                            <a href="{{ url('/admin/edit-chapter/' . $chapters->id) }}"><i
                                                    class="fa fa-pencil" aria-hidden="true" id="icn"
                                                    style="background-color: #fff; padding: 3px;"></i></a>
                                            <a href="{{ url('/admin/delete-chapter/' . $chapters->id) }}"
                                                class=""><i class="fa fa-trash" aria-hidden="true" id="del"
                                                    style="background-color: #fff; padding: 3px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->






@include('layout.admin.footer')
