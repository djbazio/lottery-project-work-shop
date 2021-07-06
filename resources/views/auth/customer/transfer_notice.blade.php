@extends('layouts.normal_user.app')

@section('content')

    <script>
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
                    var form = $('#tranfer_form')[0];
                    var data = new FormData(form);
                    let _url = "{{ route('customer.transfer_notice.store') }}";
                    let _token = $('meta[name="csrf-token"]').attr('content');
                    // data.append("bank_id", rate_value);
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
                            Swal.fire(
                                'สำเร็จ!',
                                'ข้อมูลของท่านถูกบันทึกเรียบร้อยแล้ว',
                                'success',
                            )
                            clearForm();
                            // window.location.reload;
                        },
                        error: function(err) {
                            console.log("ไม่สำเร็จ");
                            // console.log(err);
                            Swal.fire(
                                'ไม่สำเร็จ!',
                                "กรุณากรอกให้ครบ",
                                'error'
                            );
                            clearTextAddError();
                            $('#moneyError').text(err.responseJSON.errors.money);
                            $('#name_accountError').text(err.responseJSON.errors.name_account);
                            $('#name_bankError').text(err.responseJSON.errors.name_bank);
                            $('#noError').text(err.responseJSON.errors.no);
                            $('#bank_idError').text(err.responseJSON.errors.bank_id);
                            $('#picError').text(err.responseJSON.errors.pic);
                        }
                    });
                }
            })
        }

        function clearTextAddError() {
            $('#moneyError').text("");
            $('#name_accountError').text("");
            $('#name_bankError').text("");
            $('#noError').text("");
            $('#bank_idError').text("");
            $('#picError').text("");
        }

        function clearForm() {
            clearTextAddError();
            blah.src = "{{ asset('images/unitity/NotFound.jpg') }}";
            $("#tranfer_form")[0].reset();
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


    <!--
                                                                                                                                                                                                                                                            ========================================
                                                                                                                                                                                                                                                                Single Blog Sections
                                                                                                                                                                                                                                                            ========================================                                                                                           -->
    <section id="single-blog" class="single-blog-layout pa-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="comment-layout">
                        <h4>แจ้งโอน</h4>
                        <p class="text-danger">* กรุณาตรวจสอบให้ดีก่อนกดยืนยัน</p>
                        <form id="tranfer_form">
                            <div class="input-full">
                                <input name="no" placeholder="เลขที่บัญชี" id="no">
                                <span id="noError" class="alert-message text-danger"></span>
                            </div>
                            <div class="input-full">
                                <input name="name_account" placeholder="ชื่อบัญชี" id="name_account">
                                <span id="name_accountError" class="alert-message text-danger"></span>

                            </div>
                            <div class="input-full">
                                <input name="name_bank" placeholder="ชื่อธนาคาร" id="name_bank">
                                <span id="name_bankError" class="alert-message text-danger"></span>

                            </div>
                            <div class="input-full">
                                <input type="number" name="money" placeholder="จำนวนเงิน" id="money">
                                <span id="moneyError" class="alert-message text-danger"></span>

                            </div>
                            <div class="input-half">
                                <label><b>อัพโหลดสลิป</b></label>
                                <input type="file" name="pic" placeholder="" id="pic">
                                <span id="picError" class="alert-message text-danger"></span>
                            </div>
                            <div class="input-half" align="center">
                                <img id="blah" src="{{ asset('images/unitity/NotFound.jpg') }}" alt="your image"
                                    width="200px" height="200px" />
                            </div>
                            <label><b>โอนไปยัง</b>
                                <span id="bank_idError" class="alert-message text-danger"></span>
                            </label>
                            <table class="table">
                                <thead>
                                    <tr align="center">
                                        <th scope="col"></th>
                                        <th scope="col">ชื่อธนาคาร</th>
                                        <th scope="col">เลขที่บัญชี</th>
                                        <th scope="col">เลือก</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($my_banks as $my_bank)
                                        <tr align="center">
                                            <td><img src='{{ asset("{$my_bank->logo}") }}' alt="" width="100"
                                                    height="100"></td>
                                            <td>{{ $my_bank->name }}</td>
                                            <td>{{ $my_bank->no }}</td>
                                            <td> <input type="radio" name="bank_id" value="{{ $my_bank->id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="input-submit">
                                <button type="button" class="button button-primary" onclick="createPost()">บันทึก</button>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="blog-content-wrap mb-50">
                        <img src="https://via.placeholder.com/770x500/ededed/999/" alt="Behome" class="img-fluid">
                        <h2>Make website that surpasses amongst all the latest trends</h2>
                        <ul class="list-inline post-hierarchy">
                            <li class="list-inline-item"><a href="#"><i class="far fa-user primary-color"></i> Adam Shon</a>
                            </li>
                            <li class="list-inline-item"><a href="#"><i class="far fa-comment primary-color"></i> 0
                                    Comment</a></li>
                            <li class="list-inline-item"><a href="#"><i class="far fa-folder-open primary-color"></i>
                                    Realestate</a></li>
                            <li class="list-inline-item"><a href="#"><i class="far fa-clock primary-color"></i> August 22,
                                    2019</a></li>
                        </ul>
                        <p>Maecenas cursus mauris libero, a imperdiet enim pellentesque id. Aliquam erat volutpat. endisse
                            sit amet sapien at risus efficitur sagittis. Pellentesque non ullamcorper justo. Vivamus
                            commodo, sem et vestibulum eleifend, odio tristique enim.</p>
                        <p>Before founding Consulting WP in early 2001, Brandon started two Internet companies in Silicon
                            Valley. Previously, Brandon held various management positions in New York at Simon Brothers,
                            most recently as Vice President in Goldhill Group, focusing on new business development and risk
                            management. He has also worked as a senior financial risk management consultant to the financial
                            services industry; software engineer</p>
                        <ul class="list-blog">
                            <li>Work fewer hours — and make more money</li>
                            <li>A strong business plan requires going beyond intuition and experience</li>
                            <li>Focusing on new business development and risk management.</li>
                            <li>Before founding Consulting WP in early 2018, Brandon</li>
                        </ul>
                        <div class="quote">
                            <p class="mb-0">Ocusing on new business development and risk management. he has also worked as a
                                senior financial risk management consultant to the financial services industry; software
                                engineer</p>
                        </div>
                        <div class="blog-row row mb-40">
                            <div class="col-md-6">
                                <img src="https://via.placeholder.com/370x350/ededed/999/" alt="Behome" class="img-fluid">
                            </div>
                            <div class="col-md-6 align-self-center">
                                <h4>Business Planning & Strategy</h4>
                                <ul class="list-blog">
                                    <li>Work fewer hours — and make more money</li>
                                    <li>A strong business plan requires going beyond intuition and experience</li>
                                    <li>Focusing on new business development and risk management.</li>
                                    <li>Before founding Consulting WP in early 2018, Brandon</li>
                                </ul>
                            </div>
                        </div>
                        <h4>Setting the mood with incense</h4>
                        <p>Before founding Consulting WP in early 2001, Brandon started two Internet companies in Silicon
                            Valley. Previously, Brandon held various management positions in New York at Simon Brothers,
                            most recently as Vice President in Goldhill Group, focusing on new business development and risk
                            management. He has also worked as a senior.</p>
                        <div class="blog-tag">
                            <ul class="list-inline">
                                <li class="list-inline-item heading-primary">Tag: </li>
                                <li class="list-inline-item"><a href="#">Branding</a></li>
                                <li class="list-inline-item"><a href="#">UI/UX</a></li>
                                <li class="list-inline-item"><a href="#">Marketing</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    {{-- <div class="blog-author-layout d-flex mb-30">
                        <div class="img">
                            <img src="https://via.placeholder.com/100/ededed/000/" class="rounded-circle" alt="Behome">
                        </div>
                        <div class="content align-self-center">
                            <h4><a href="#">Admin</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do iusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            </p>
                            <a href="#" class="button button-primary button-small">View More</a>
                        </div>
                    </div> --}}
                    {{-- <div class="comment-layout">
                        <h4>Leave A Reply</h4>
                        <p>* Your Email Address will not be published</p>
                        <form>
                            <div class="input-full">
                                <textarea name="message" placeholder="Your Message"></textarea>
                            </div>
                            <div class="input-half">
                                <input type="text" name="name" placeholder="Your Name">
                            </div>
                            <div class="input-half">
                                <input type="email" name="email" placeholder="Your Email">
                            </div>
                            <div class="input-submit">
                                <button type="submit" class="button button-primary">Send Message</button>
                            </div>
                        </form>
                    </div> --}}
                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-item item-category mb-30">
                            <h4>Categories</h4>
                            <ul class="category-lists">
                                <li><a href="#">Finance & Accounting</a></li>
                                <li><a href="#">Financial Services</a></li>
                                <li><a href="#">Funding Trends</a></li>
                                <li><a href="#">Industrial Products</a></li>
                                <li><a href="#">Press Releases</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item item-tag mb-30">
                            <h4>Blog Tags</h4>
                            <ul>
                                <li><a href="#">Branding</a></li>
                                <li><a href="#">UI/UX</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Marketing</a></li>
                                <li><a href="#">Corporate</a></li>
                                <li><a href="#">Website</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item item-recent mb-30">
                            <h4>Recently Viewed</h4>
                            <div class="recent-item d-flex mb-30">
                                <div class="img">
                                    <img src="https://via.placeholder.com/75/ededed/000/" alt="Behome">
                                </div>
                                <div class="content align-self-center">
                                    <h6 class="mb-1">Home in Merrick Way</h6>
                                    <p class="mb-0">$54,000</p>
                                </div>
                            </div>

                            <div class="recent-item d-flex mb-30">
                                <div class="img">
                                    <img src="https://via.placeholder.com/75/ededed/000/" alt="Behome">
                                </div>
                                <div class="content align-self-center">
                                    <h6 class="mb-1">Villa on Grand Avenue</h6>
                                    <p class="mb-0">$54,000</p>
                                </div>
                            </div>

                            <div class="recent-item d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/75/ededed/000/" alt="Behome">
                                </div>
                                <div class="content align-self-center">
                                    <h6 class="mb-1">Blue Pearl Therapeutic</h6>
                                    <p class="mb-0">$54,000</p>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-item sidebar-contact">
                            <div class="sidebar-author">
                                <img src="https://via.placeholder.com/370x270/ededed/999/" alt="Behome" class="img-fluid">
                                <div class="hover">
                                    <div class="author d-flex">
                                        <div class="img">
                                            <img src="{{ asset('be_home_template/Upload/img/property/thumb-6.png') }}"
                                                alt="Behome">
                                        </div>
                                        <h6 class="mb-0 align-self-center color-white">Dilliama Nelissa</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="contact">
                                <form>
                                    <input type="text" name="name" placeholder="Your Name*">
                                    <input type="email" name="email" placeholder="Your Email*">
                                    <textarea name="message" placeholder="Your Message*"></textarea>
                                    <button type="submit" class="d-block button button-primary">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
