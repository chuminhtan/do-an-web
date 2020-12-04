@extends('admin.layout.index')
@section('main-container')
                    <!-- TITLE -->
                    <h3 class="page-title">TIÊU ĐỀ</h3>
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Tổng kết trong tuần</h3>
							<p class="panel-subtitle">Thời gian: Theo tuần (Code thêm khoảng thời gian vào)</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-bag"></i></span>
										<p>
											<span class="number">Code số lượng</span>
											<span class="title">Lượng bán</span>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="metric">
										<span class="icon"><i class="fa fa-money"></i></span>
										<p>
											<span class="number">Code số tiền</span>
											<span class="title">Tổng tiền</span>
										</p>
									</div>
								</div>
							</div>
							<!-- BAR CHART-->
							<div class="row">
								<div class="panel">
									<div class="panel-body">
										<div id="demo-bar-chart" class="ct-chart"></div>
									</div>
								</div>
							</div>
							<!-- END BAR CHART-->
						</div>
					</div>
					<!-- END OVERVIEW-->
					<div class="panel panel-headline">
						<!-- RECENT PURCHASES -->
						<div class="panel-heading">
							<h3 class="panel-title">Top 3 bán chạy</h3>
						</div>
						<div class="panel-body no-padding">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Hạng</th>
										<th>Mã</th>
										<th>Tên</th>
										<th>Số lượng</th>
										<th>Doanh số</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><i class="fa fa-star" style="color: #f08632;"></i><i class="fa fa-star" style="color:#f08632;"></i><i class="fa fa-star" style="color: #f08632;"></i></td>
										<td>Mã sp</td>
										<td>Tên sp</td>
										<td>Số lượng</td>
										<td>Tổng tiền</td>
									</tr>
									<tr>
										<td><i class="fa fa-star" style="color:#f08632;"></i><i class="fa fa-star" style="color:#f08632;"></i></td>
										<td>Mã sp</td>
										<td>Tên sp</td>
										<td>Số lượng</td>
										<td>Tổng tiền</td>
									</tr>
									<tr>
										<td><i class="fa fa-star" style="color: #f08632;"></i></td>
										<td>Mã sp</td>
										<td>Tên sp</td>
										<td>Số lượng</td>
										<td>Tổng tiền</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- END RECENT PURCHASES -->
					</div>
@endsection