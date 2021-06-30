@extends('layouts.main_template')
@section('content')
    <script>
        function new_save() {
            $("#post_id").val("");
            createPost();
        }

        function createPost() {
            Swal.fire({
                title: 'คุณแน่ใจใช่หรือไม่?',
                text: "คุณต้องการบันทีกใช่หรือไม่?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = $('#edit_website')[0];
                    var data = new FormData(form);

                    let _url = "{{route('admin.data.websiteDetail.store')}}";
                    let _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: _url,
                        type: "POST",
                        enctype: 'multipart/form-data',
                        processData: false, // Important!
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: data,
                        success: function(res) {
                            console.log("สำเร็จ");
                            Swal.fire(
                                'สำเร็จ!',
                                'ข้อมูลของท่านถูกบันทึกเรียบร้อยแล้ว',
                                'success'
                            )
                            $('#old_image').val(res.data)
                            clearTextAddError();
                        },
                        error: function(err) {
                            console.log("ไม่สำเร็จ");
                            // console.log(err);
                            Swal.fire(
                                'ไม่สำเร็จ!',
                                'มีข้อผิดพลาดบางอย่าง',
                                'error'
                            )
                            clearTextAddError();
                            $('#nameError').text(err.responseJSON.errors.name);
                            $('#logoError').text(err.responseJSON.errors.logo);
                        }
                    });
                }
            })

        }

        function clearTextAddError() {
            $('#nameError').text("");
            $('#logoError').text("");
        }
    </script>


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดการข้อมูลเว็บไซต์</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">จัดการข้อมูลเว็บไซต์</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">


            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">แก้ไขข้อมูลเว็บไซต์</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="edit_website">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">ชื่อเว็บไซต์</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="โปรดกรอกข้อมูลที่เป็นตัวอักษร" value="{{ $detail_webside->name }}">
                            <span id="nameError" class="alert-message text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label for="logo">โลโก้เว็บไซต์ (ถ้ามี)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="hidden" id="old_image" name="old_image" value="{{$detail_webside->logo}}">
                                    <input type="file" class="custom-file-input custom-file-upload" id="logo" name="logo">
                                    <label class="custom-file-label" for="logo">เลือกไฟล์</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">อัพโหลด</span>
                                </div>
                            </div>
                            <span id="logoError" class="alert-message text-danger"></span>
                        </div>
                        <div align='center'>
                            <img id="blah" src="{{ asset($detail_webside->logo) }}" alt="your image" width="200px"
                                height="200px" />
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" onclick="new_save()">บันทึก</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
    </section>

    <div class="modal fade" id="post-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="text_addcus">เพิ่มรายชื่อ</h4>
                </div>
                <div class="modal-body">
                    <form name="userForm" class="form-horizontal">
                        <input type="hidden" name="post_id" id="post_id" value="">
                        <div class="form-group">
                            <label for="eno">เลขลอตเตอรี่</label>
                            <input type="number" class="form-control" id="eno" name="no"
                                placeholder="โปรดกรอกข้อมูลที่เป็นตัวเลข">
                            <span id="enoError" class="alert-message text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="eprice">ราคา</label>
                            <input type="number" class="form-control" id="eprice" name="price"
                                placeholder="โปรดกรอกข้อมูลที่เป็นตัวเลข">
                            <span id="epriceError" class="alert-message text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="enum">จำนวน</label>
                            <input type="number" class="form-control" name="num" id="enum"
                                placeholder="โปรดกรอกข้อมูลที่เป็นตัวเลข">
                            <span id="enumError" class="alert-message text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="estatus">สถานะ</label>
                            <select class="form-control" id="estatus" name="status">
                                <option value="" disabled selected>เลือกสถานะ</option>
                                <option value="0">เปิดขาย</option>
                                <option value="1">ไม่เปิดขาย</option>
                            </select>
                            <span id="estatusError" class="alert-message text-danger"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="createPost()">บันทึก</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        //อัพโหลดโชวรูปและชื่อ logoคือid inputfile [input id='logo']
        logo.onchange = evt => {
            const [file] = logo.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }


        //name
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
@endsection
