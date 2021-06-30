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
                    var form;
                    var id = $("#post_id").val();
                    var old_image = $("#old_image").val();
                    if (id == "") {
                        form = $('#bank_form')[0];
                    } else {
                        form = $('#ebank_form')[0];
                    }
                    var data = new FormData(form);
                    data.append("id", id);
                    data.append("old_image", old_image);
                    let _url = "{{ route('admin.data.bank.store') }}";
                    let _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        enctype: 'multipart/form-data',
                        processData: false, // Important!
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        url: _url,
                        type: "POST",
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(res) {
                            console.log("สำเร็จ");
                            if (id != "") {
                                $("#table_crud #row_" + id + " td:nth-child(3)").html("<img src='" +
                                    "{{ URL::asset('') }}" + res.data.logo +
                                    "' width = '100px' height = '100px'>");
                                $("#table_crud #row_" + id + " td:nth-child(4)").html(res.data
                                    .name);
                                $("#table_crud #row_" + id + " td:nth-child(5)").html(res.data.no);
                                blah.src = "{{ asset('images/unitity/NotFound.jpg') }}";
                                $('.custom-file-label').html("เลือกไฟล์");
                                $("#ebank_form")[0].reset();
                                $("#bank_form")[0].reset();
                            } else {
                                $('#table_crud tbody').prepend("<tr align='center' id='row_" + res.data
                                    .id + "'" +
                                    ">" +

                                    "<th id='td_choese" +
                                    "' class='align-middle' hidden='true'>" +
                                    "<div align='center'>" +
                                    "<input type='checkbox' class='form-check' name='select'" +
                                    "id='select_input' value='" + res.data.id + "'>" +
                                    "</div>" +
                                    "</th>" +

                                    "<td class='align-middle'>" + res.data.id + "</td>" +
                                    "<td class='align-middle'>" +
                                    "<img src='{{ URL::asset('') }}" + res.data.logo + "'" +
                                    "alt='' width = '100px' height = '100px'>" +
                                    "</td>" +
                                    "<td class='align-middle'>" + res.data.name + "</td>" +
                                    "<td class='align-middle'>" + res.data.no + "</td>" +
                                    "<td align='center' class='align-middle'>" +
                                    "<a href='javascript:void(0)' class='btn btn-warning'" +
                                    "data-id='" + res.data.id +
                                    "' onclick='editPost(event.target)' id='btn_edit'>แก้ไข</a> " +
                                    " <a href='javascript:void(0)' class='btn btn-danger'" +
                                    "data-id='" + res.data.id +
                                    "' onclick='deletePost(event.target)' id='btn_delete'>ลบ</a>" +
                                    "</td>" +
                                    "</tr>"
                                );
                                $("#no").val('');
                                $("#name").val('');
                                $("#logo").val('');
                                clearTextAddError();
                                processBtnCancel();
                            }
                            Swal.fire(
                                'สำเร็จ!',
                                'ข้อมูลของท่านถูกบันทึกเรียบร้อยแล้ว',
                                'success'
                            )
                            $('#post-modal').modal('hide');
                            // countRow++;
                            clearTextModalError();
                        },
                        error: function(err) {
                            console.log("ไม่สำเร็จ");
                            console.log(err);
                            if (id == "") {
                                clearTextAddError();
                                $('#noError').text(err.responseJSON.errors.no);
                                $('#nameError').text(err.responseJSON.errors.name);
                                $('#logoError').text(err.responseJSON.errors.logo);
                            } else {
                                clearTextModalError();
                                $('#enoError').text(err.responseJSON.errors.no);
                                $('#enameError').text(err.responseJSON.errors.name);
                                $('#elogoError').text(err.responseJSON.errors.logo);
                            }
                        }
                    });
                }
            })

        }

        function clearTextAddError() {
            $('#noError').text("");
            $('#nameError').text("");
            $('#logoError').text("");
            blah.src = "{{ asset('images/unitity/NotFound.jpg') }}";
            $('.custom-file-label').html("เลือกไฟล์");
            $("#ebank_form")[0].reset();
            $("#bank_form")[0].reset();

        }

        function clearTextModalError() {
            $('#enoError').text("");
            $('#enameError').text("");
            $('#elogoError').text("");
        }

        function editPost(event) {
            $('.custom-file-label').html("เลือกไฟล์");
            var id = $(event).data("id");
            let _url = "/admin/api/getBankData/" + id;
            let _token = $('meta[name="csrf-token"]').attr('content');
            clearTextModalError();
            $("#text_addcus").html("แก้ไขข้อมูลธนาคาร");
            $('#post-modal').modal('show');

            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    _token: _token,
                },
                success: function(res) {
                    // console.log(_url);
                    // console.log(res);
                    if (res) {
                        $("#post_id").val(res.id);
                        $("#eno").val(res.no);
                        $("#ename").val(res.name);
                        $("#eblah").attr('src', '{{ URL::asset('') }}' + res.logo);
                        $("#old_image").val(res.logo);

                        // $('#epost-modal').modal('show');
                    }
                }
            });
        }

        function deletePost(event) {
            Swal.fire({
                title: 'คูณแน่ใจใช่หรือไม่?',
                text: "คุณต้องการลบข้อมูลใช่หรือไม่?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(event).data("id");
                    let _url = "/admin/data/delete/bank/" + id;
                    let _token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: _url,
                        type: "DELETE",
                        data: {
                            _token: _token,
                        },
                        success: function(res) {
                            console.log(res);
                            if (res.code == '200') {
                                $("#row_" + id).remove();
                                Swal.fire(
                                    'สำเร็จ!',
                                    'ข้อมูลถูกลบเรียบร้อยแล้ว',
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'ไม่สำเร็จ!',
                                    res.error,
                                    'error'
                                )
                            }
                        }
                    });
                }
            })
        }
    </script>

    <script>
        function select_all() {
            $("[id='select_input']").prop('checked', true);
        }

        function reset_select() {
            $("[id='select_input']").prop('checked', false);

        }

        function showInputChouse(event) {
            var btn_chouse = document.getElementById("btn_chouse");
            var delete_select = document.getElementById("delete_select");
            var chk = btn_chouse.getAttribute("status");
            var reset_select = document.getElementById("reset_select");
            var select_all = document.getElementById("select_all");
            if (chk == 0) {
                document.getElementById("th_choese").hidden = false;
                $("[id='td_choese']").prop('hidden', false);
                $("[id='th_choese']").prop('hidden', false);
                $("[id='btn_delete']").prop('hidden', true);

                // console.log("fwf")
                //ปุ่มยกเลิก
                btn_chouse.innerHTML = "ยกเลิก";
                btn_chouse.setAttribute("status", "1");
                btn_chouse.setAttribute("class", "btn btn-warning");
                //ปุ้มเพิ่มรรายชื่อ

                //ปุ่มลบทั้งหมด
                delete_select.hidden = false;
                //reset
                reset_select.hidden = false;
                //เลือกทั้งหมด
                select_all.hidden = false;

            } else {
                processBtnCancel();
            }

            console.log(chk);
        }

        function processBtnCancel() {
            var btn_chouse = document.getElementById("btn_chouse");
            var delete_select = document.getElementById("delete_select");
            var chk = btn_chouse.getAttribute("status");
            var reset_select = document.getElementById("reset_select");
            var select_all = document.getElementById("select_all");
            document.getElementById("th_choese").hidden = true;
            $("[id='td_choese']").prop('hidden', true);
            $("[id='th_choese']").prop('hidden', true);
            $("[id='btn_delete']").prop('hidden', false);

            //เลือก
            btn_chouse.innerHTML = "เลือก";
            btn_chouse.setAttribute("status", "0");
            btn_chouse.setAttribute("class", "btn btn-info");
            //ปุ่มลบทั้งหมด
            delete_select.hidden = true;
            //reset
            reset_select.hidden = true;
            //เลือกทั้งหมด
            select_all.hidden = true;
            this.reset_select();
        }

        function select_delete() {
            var arr = [];
            var _url = "{{ route('admin.data.delete.all_bank') }}";
            let _token = $('meta[name="csrf-token"]').attr('content');
            $("input:checkbox[name=select]:checked").each(function() {
                arr.push({
                    id: $(this).val()
                });
            });
            var filtarr = arr.filter(function(el) {
                return el != null;
            });
            //  console.log(arr);

            if (filtarr.length > 0) {
                Swal.fire({
                    title: 'คุณแน่ใจใช่หรือไม่?',
                    text: "คุณต้องการลบข้อมูลที่เลือกใช่หรือไม่?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ตกลง!',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: _url,
                            data: {
                                _token: _token,
                                pass: filtarr,
                            },
                            success: function(res) {
                                console.log("Sucess");
                                if (res.code == '200') {
                                    var response = res.data;
                                    // console.log(response[0].id);
                                    for (let i = 0; i < response.length; i++) {
                                        $("#row_" + response[i].id).remove();
                                        // console.log(response[i].id)
                                    }
                                    Swal.fire(
                                        'สำเร็จ!',
                                        res.message,
                                        'success'
                                    )
                                }
                            },
                            error: function(err) {
                                Swal.fire(
                                    'เกิดข้อผิดพลาด!',
                                    "เกิดข้อผิดพลาดบางอย่าง",
                                    'error',
                                )
                            }
                        });
                    }
                })
            } else {
                Swal.fire(
                    'มีข้อผิดพลาด!',
                    "คุณยังไม่ได้เลือกรายการ",
                    'warning'
                )
            }

        }
    </script>



    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">จัดการข้อมูลธนาคาร</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">จัดการข้อมูลธนาคาร</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ข้อมูลธนาคาร</h3>

                            <div class="card-tools">
                                <button class="btn btn-info" status="0" onclick="showInputChouse(event)"
                                    id="btn_chouse">เลือก</button>
                                <a href="javascript:void(0)" class="btn btn-success" hidden="true" id="select_all"
                                    onclick="select_all()">เลือกทั้งหมด</a>
                                <a href="javascript:void(0)" class="btn btn-info" hidden="true" id="reset_select"
                                    onclick="reset_select()">รีเซต</a>
                                <a href="javascript:void(0)" class="btn btn-danger" hidden="true" id="delete_select"
                                    onclick="select_delete()">ลบข้อมูลที่เลือก</a>
                                {{-- <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap" id="table_crud">
                                <thead>
                                    <tr align="center">
                                        <th id="th_choese" hidden>เลือก</th>
                                        <th>ID</th>
                                        <th>โลโก้</th>
                                        <th>ชื่อธนาคาร</th>
                                        <th>เลขที่บัญชี</th>
                                        <th>อื่นๆ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($my_banks as $my_bank)
                                        <tr id="row_{{ $my_bank->id }}" align="center">
                                            <th id="td_choese" class="align-middle" hidden>
                                                <div align="center">
                                                    <input type="checkbox" class="form-check" name="select"
                                                        id="select_input" value="{{ $my_bank->id }}">
                                                </div>
                                            </th>
                                            <td class="align-middle">{{ $my_bank->id }}</td>
                                            <td class="align-middle">
                                                <img src="{{ asset($my_bank->logo) }}"
                                                    alt="{{ asset($my_bank->logo) }}" width="100px" height="100px">

                                            </td>
                                            <td class="align-middle">{{ $my_bank->name }}</td>
                                            <td class="align-middle">{{ $my_bank->no }}</td>
                                            <td class="align-middle" align="center">
                                                <a href="javascript:void(0)" class="btn btn-warning"
                                                    data-id="{{ $my_bank->id }}" onclick="editPost(event.target)"
                                                    id='btn_edit'>แก้ไข</a>
                                                <a href="javascript:void(0)" class="btn btn-danger"
                                                    data-id="{{ $my_bank->id }}" onclick="deletePost(event.target)"
                                                    id='btn_delete'>ลบ</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {!! $my_banks->links() !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">เพิ่มข้อมูลธนาคาร</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form enctype="multipart/form-data" id="bank_form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no">เลขที่บัญชีธนาคาร</label>
                                    <input type="number" class="form-control" id="no" name="no"
                                        placeholder="โปรดกรอกข้อมูลที่เป็นตัวเลข">
                                    <span id="noError" class="alert-message text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">ชื่อธนาคาร</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="โปรดกรอกข้อมูลที่เป็นตัวอักษรภาษาไทย">
                                    <span id="nameError" class="alert-message text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logo">โลโก้ธนาคาร (ถ้ามี)</label>
                            <div class="input-group">
                                <div class="custom-file">
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
                            <img id="blah" src="{{ asset('images/unitity/NotFound.jpg') }}" alt="your image"
                                width="200px" height="200px" />
                        </div>
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
                    <h4 class="modal-title" id="text_addcus"></h4>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="ebank_form">
                        <input type="hidden" name="post_id" id="post_id" value="">
                        <input type="hidden" name="old_image" id="old_image" value="">
                        <div class="form-group">
                            <label for="eno">เลขที่บัญชี</label>
                            <input type="number" class="form-control" id="eno" name="no"
                                placeholder="โปรดกรอกข้อมูลที่เป็นตัวเลข">
                            <span id="enoError" class="alert-message text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="ename">ชื่อธนาคาร</label>
                            <input type="text" class="form-control" id="ename" name="name"
                                placeholder="โปรดกรอกข้อมูลที่เป็นตัวเลข">
                            <span id="enameError" class="alert-message text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="elogo">โลโก้ธนาคาร (ถ้ามี)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input custom-file-upload" id="elogo" name="logo">
                                    <label class="custom-file-label" for="elogo">เลือกไฟล์</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">อัพโหลด</span>
                                </div>
                            </div>
                            <span id="elogoError" class="alert-message text-danger"></span>
                        </div>
                        <div align='center'>
                            <img id="eblah" src="{{ asset('images/unitity/NotFound.jpg') }}" alt="your image"
                                width="200px" height="200px" />
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

        elogo.onchange = evt => {
            const [file] = elogo.files
            if (file) {
                eblah.src = URL.createObjectURL(file)
            }
        }

        //name
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
@endsection
