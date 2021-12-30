<!-- Khai báo sử dụng layout admin -->
@extends('admin.layout.index')

<!-- Khai báo định nghĩa phần main-container trong layout admin-->
@section('main-container')
<!-- Page Heading -->
@include('admin.order.layout.order-title')

<!-- Page Body -->
<div class="row">
    {{-- Cột Bên trái --}}
    <div class="col-md-8">

        {{-- Chi Tiết Đơn Hàng --}}
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="text-center font-weight-bold mb-3">Giỏ Hàng</h5>
                <form action="{{ url("admin/order/info/update-quantity" ) }}" method="POST">
                    @csrf
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã Sản Phẩm</th>
                                <th>Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th class="text-right">Đơn Giá</th>
                                <th class="text-center">Số Lượng</th>
                                <th class="text-right font-weight-bold">Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody id="table_body_order_detail">
                            <input type="number" name="order_id" hidden value="{{ $order->ma_don_hang}}">
                            @php
                            $number = 1
                            @endphp

                            @if ( isset($orderDetailList) )
                            @foreach($orderDetailList as $orderDetail)
                            <tr>
                                <td>{{ $number }}</td>
                                <td>
                                    {{ $orderDetail->ma_san_pham }}
                                    <input type="number" class="id_list" name="product_id_list[]" hidden
                                        value="{{ $orderDetail->ma_san_pham}}">
                                </td>
                                <td>
                                    <image src="{{ asset("storage/product/$orderDetail->anh_san_pham") }}" alt="img"
                                        width="80">
                                </td>
                                <td>{{ $orderDetail->ten_san_pham }}</td>
                                <td class="text-primary text-right" id="{{ $orderDetail->ma_san_pham }}-price"
                                    value="{{ $orderDetail->gia }}">
                                    {{ $orderDetail->gia }}</td>
                                <td>
                                    <input type="number" name="quantity_updated_list[]"
                                        id="{{ $orderDetail->ma_san_pham }}-quantity" min="0"
                                        class="form-control text-center text-center font-weight-bold"
                                        value={{ $orderDetail->so_luong_ban }} onchange="changeProductQuantity(this);">
                                </td>
                                <td class="text-primary font-weight-bold text-right amount"
                                    id="{{ $orderDetail->ma_san_pham }}-amount" class="text-right"
                                    value="{{ $orderDetail->thanh_tien }}">{{ $orderDetail->thanh_tien }}</td>
                            </tr>
                            @php
                            $number++
                            @endphp
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-2">
                            <p class="text-primary font-weight-bold text-right">Tổng Tiền</p>
                        </div>
                        <div class="col-md-2">
                            <p class="text-danger font-weight-bold text-right" id="amount_total"></p>
                        </div>

                    </div>
                    <div class="d-flex justify-content-between">
                        <!-- btn modal thêm sản phẩm -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".addProduct"><i
                                class="fas fa-cart-plus"></i></button>
                        <!-- btn cập nhật sản phẩm -->
                        <button class="btn btn-primary" type="submit" id="btn_update_order_detail">Cập Nhật</button>
                    </div>
                </form>

                <!-- Modal -->
                <div class="modal fade addProduct" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-primary text-center font-weight-bold"
                                    id="exampleModalLabel">Chọn Sản Phẩm
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    {{-- table add product --}}
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Mã</th>
                                                <th>Ảnh</th>
                                                <th>Tên</th>
                                                <th>Giá Bán</th>
                                                <th>Danh Mục</th>
                                                <th>Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ( isset($productList) )
                                            @foreach($productList as $product)
                                            <tr>
                                                <td id="{{ $product->ma_san_pham }}-add_product_id">
                                                    {{ $product->ma_san_pham }}</td>
                                                <td>
                                                    <image id="{{ $product->ma_san_pham }}-add_product_image"
                                                        src="{{ asset("storage/product/$product->anh_san_pham") }}"
                                                        alt="img" width="80">
                                                </td>
                                                <td id="{{ $product->ma_san_pham }}-add_product_name"
                                                    value="{{ $product->ten_san_pham }}">

                                                    {{ $product->ten_san_pham }}</td>
                                                <td id="{{ $product->ma_san_pham }}-add_product_price"
                                                    value="{{ $product->gia }}">
                                                    {{ $product->gia }}</td>
                                                <td>{{ $product->ten_danh_muc }}</td>
                                                <td><button class="btn btn-primary"
                                                        id="{{ $product->ma_san_pham }}-add_product"
                                                        onclick="addProduct(this);"><i
                                                            class="fas fa-plus-square"></i></button></td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    @if (isset($productList))
                                    {{ $productList->links() }}
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tình Trạng Đơn Hàng -->
        <div class="card">
            <div class="card-body">
                <h5 class="text-center font-weight-bold mb-3">Nhân Viên</h5>

                {{-- form --}}
                <form method="POST" action="{{ url("admin/order/info/confirm/2") }}">
                    @csrf
                    <input type="number" name="order_id" value="{{ $order->ma_don_hang }}" hidden>

                    <!-- Ghi Chú -->
                    <div class=" row">
                        <div class="col-md-2">
                            <p>Ghi Chú:</p>
                        </div>
                        <div class="col-md-10">
                            <textarea name="user_note" class="font-weight-bold form-control"
                                rows="5">{{ $order->ghi_chu_nhan_vien }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-5 mt-5 d-flex justify-content-center">
                        <a href="{{ url("admin/order/info/cancel/$order->ma_don_hang") }}"
                            class="btn btn-danger mr-5">Hủy Đơn Hàng</a>
                        <button type="submit" class="btn btn-success">Xác Nhận Đơn Hàng</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        {{-- Thông Tin Khách Hàng - Cột bên phải --}}
        <div class="card">
            <div class="card-body">
                <h5 class="text-center font-weight-bold mb-3">Khách Hàng</h5>
                <form action="{{ url('admin/order/info/update-customer') }}" method="POST">
                    <input type="number" name="order_id" value="{{ $order->ma_don_hang }}" hidden>
                    @csrf
                    <div class="row mb-3">
                        <p class="col-md-4">Họ Tên:</p>
                        <input type="text" name="customer_name" class="col-md-8 form-control font-weight-bold"
                            value="{{ $order->ten_khach_hang }}" required>
                    </div>
                    <div class="row mb-3">
                        <p class="col-md-4">Điện Thoại:</p>
                        <input type="text" name="customer_phone" class="col-md-8 form-control font-weight-bold"
                            value="{{ $order->dien_thoai_khach_hang }}" required>
                    </div>
                    <div class="row mb-3">
                        <p class="col-md-4">Địa Chỉ:</p>
                        <textarea name="customer_address" class="col-md-8 font-weight-bold form-control" cols="30"
                            rows="4" required>{{ $order->dia_chi_giao_hang }}</textarea>
                    </div>
                    <div class="row mb-3">
                        <p class="col-md-4">Ngày Giao:</p>
                        <input type="datetime-local" name="customer_time_delivery" class="form-control col-md-8"
                            id="customer_time"
                            value="{{ date("Y-m-d", strtotime($order->thoi_gian_giao_hang))."T".date("H:m", strtotime($order->thoi_gian_giao_hang)) }}"
                            required>
                    </div>
                    <div class="row mb-3">
                        <p class="col-md-4">Ghi Chú:</p>
                        <textarea name="customer_note" class="col-md-8 font-weight-bold form-control" cols="30"
                            rows="4">{{ $order->ghi_chu_khach_hang }}</textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Cập Nhật</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Lịch Sử -->
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="text-center font-weight-bold mb-3">Lịch Sử</h5>
                <textarea name="order_history" class=" form-control" rows="15" readonly>{{ $order->lich_su }}</textarea>
            </div>
        </div>
    </div>
    <!-- kết thúc main-container -->
    @endsection
    {{-- Javascript --}}
    @section('script')
    <script>
        // Kiểm tra biến errors từ server gửi về. Nếu có lỗi xuất popup thông báo
        @if(count($errors) > 0)
        Swal.fire({
            title: 'Thất Bại',
            text: 'Vui lòng kiểm tra lại thông tin',
            icon: 'error',
            confirmButtonText: 'OK'
        })
        @endif

        // Change Product Quantity
        const changeProductQuantity = (inputQuantity) => {
            const productId = inputQuantity.id.split("-")[0];
            const productPrice = document.getElementById(`${productId}-price`).getAttribute('value');
            const productQuantity = inputQuantity.value

            const amount_dom = document.getElementById(`${productId}-amount`)

            let amount = parseInt(productPrice) * parseInt(productQuantity);

            if (isNaN(amount)) {
                amount = 0;
            }
            amount_dom.innerHTML = amount
            amount_dom.setAttribute('value', amount)

            getTotalAmount()
        }

        // Get total amount
        const getTotalAmount = () => {
            const amount_total_dom = document.querySelector('#amount_total')
            const amount_list_dom = document.querySelectorAll('.amount');
            const amount_list = Array.from(amount_list_dom);
            console.log(amount_list);

            let amount_total = 0;

            amount_list.forEach((amount) => {
                amount_total += parseInt(amount.getAttribute('value'))
            })

            console.log(amount_total)
            amount_total_dom.innerHTML = amount_total
        }
        getTotalAmount();

        // Add Product
        const addProduct = (btnAdd) => {
            const table_body_order_detail_dom = document.querySelector('#table_body_order_detail')
            const product_id = btnAdd.id.split('-')[0]
            const product_image = document.getElementById(`${product_id}-add_product_image`).src;
            const product_name = document.getElementById(`${product_id}-add_product_name`).getAttribute('value')
            const product_price = document.getElementById(`${product_id}-add_product_price`).getAttribute('value')

            const id_list_dom = document.querySelectorAll('.id_list')
            const id_list = Array.from(id_list_dom)
            console.log(id_list)
            let number = id_list.length
            for (let i = 0; i < number; i++) {
                console.log(id_list[i])
                if (product_id == id_list[i].value) {
                    return
                }
            }


            console.log(product_id)
            console.log(product_name)
            console.log(product_price)
            console.log(product_image)

            let tr_html = ` <tr>
                                <td>%number%</td>
                                <td>
                                    %product_id%
                                    <input type="number" class="id_list" name="product_id_list[]" hidden
                                        value="%product_id%">
                                </td>
                                <td>
                                    <image src="%product_image%" alt="img"
                                        width="80">
                                </td>
                                <td>%product_name%</td>
                                <td class="text-primary text-right" id="%product_id%-price"
                                    value="%product_price%">
                                    %product_price%</td>
                                <td>
                                    <input type="number" name="quantity_updated_list[]"
                                        id="%product_id%-quantity" min="0"
                                        class="form-control text-center text-center font-weight-bold"
                                        value="0" onchange="changeProductQuantity(this);">
                                </td>
                                <td class="text-primary font-weight-bold text-right amount"
                                    id="%product_id%-amount" class="text-right"
                                    value="0">0</td>
                            </tr>`
            tr_html = tr_html.replaceAll('%number%', ++number)
            tr_html = tr_html.replaceAll('%product_id%', product_id)
            tr_html = tr_html.replaceAll('%product_name%', product_name)
            tr_html = tr_html.replaceAll('%product_price%', product_price)
            tr_html = tr_html.replaceAll('%product_image%', product_image)

            table_body_order_detail_dom.insertAdjacentHTML('beforeend', tr_html)
        }
    </script>
    @endsection