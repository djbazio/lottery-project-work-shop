@extends('layouts.normal_user.app')

@section('content')


    <!--
                                                                                                                                                                                                                                                                                                                                                ========================================
                                                                                                                                                                                                                                                                                                                                                    Single Blog Sections
                                                                                                                                                                                                                                                                                                                                                ========================================                                                                                           -->
    <section id="single-blog" class="single-blog-layout pa-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="comment-layout">
                        <h4>ประวัติแจ้งโอน</h4>
                        <p class="text-danger">* กรุณาตรวจสอบให้ดี</p>

                        <table class="table">
                            <thead>
                                <tr align="center">
                                    <th scope="col">รูปสลิป</th>
                                    <th scope="col">เลขที่บัญชี</th>
                                    <th scope="col">ชื่อธนาคาร</th>
                                    <th scope="col">ชื่อบัญชี</th>
                                    <th scope="col">จำนวนเงิน</th>
                                    <th scope="col">โอนไปยัง</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">อัพเดทเมื่อ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transfer_notice_histories as $transfer_notice_history)
                                    <tr align="center">
                                        <td class="align-middle">
                                            <a href="#" class="pop">
                                                <img src="{{ asset($transfer_notice_history->pic) }}"
                                                    alt="{{ $transfer_notice_history->pic }}" width="100" height="100">
                                            </a>
                                        </td>
                                        <td class="align-middle">{{ $transfer_notice_history->no }}</td>
                                        <td class="align-middle">{{ $transfer_notice_history->name_bank }}</td>
                                        <td class="align-middle">{{ $transfer_notice_history->name_account }}</td>
                                        <td class="align-middle">{{ $transfer_notice_history->money }}</td>
                                        <td class="align-middle">
                                            {{ $transfer_notice_history->my_bank->name }}
                                            <br>
                                            {{ $transfer_notice_history->my_bank->no }}
                                        </td>
                                        <td class="align-middle">
                                            @if ($transfer_notice_history->status == 0)
                                                รอการยืนยัน
                                            @elseif ($transfer_notice_history->status == 1)
                                                สำเร็จ
                                            @else
                                                มีข้อผิดพลาด
                                            @endif
                                        </td>
                                        <th scope="row" class="align-middle">
                                            {{ Carbon\Carbon::parse($transfer_notice_history->updated_at)->locale('th')->diffForHumans() }}
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $transfer_notice_histories->links() !!}
                        </div>
                    </div>

                </div>
                {{-- <div class="col-md-4">
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
                </div> --}}
            </div>
        </div>
    </section>

    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <img src="" class="imagepreview" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $(function() {
            $('.pop').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');
            });
        });
    </script>
@endsection
