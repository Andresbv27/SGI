@extends('include.master')


@section('title','Inventory | Reporte de Ganancias')


@section('page-title','Reporte de Ganancias')


@section('content')




<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					
				Reporte de Ganancias
					
				</h2>

				<h2 class="pull-right">
					
			<a href="{{ url('print-report') }}?type={{ $type }}&start_date={{ $start_date }}&end_date={{ $end_date }}&category_id={{ $category_id }}&product_id={{ $product_id }}&stock_id={{ $stock_id }}&vendor_id={{ $vendor_id }}&customer_id={{ $customer_id }}&user_id={{ $user_id }}" target="_blank" type="button" class="btn bg-teal btn-circle waves-effect waves-circle waves-float">
                               <i class="material-icons">print</i>
                                     </a>
					
				</h2>
			</div>


			<div class="body">

				<div class="table-responsive">
					<table class="table table-bordered table-condensed">
						<thead>
							<tr>
								<td colspan="5" style="border: none !important;">
									<h3 style="text-align: center;">{{ $company->name }}</h3>
								</td>

							</tr>		

							<tr style="border: none !important;">
								<td colspan="5" style="border: none !important;">
									<p style="text-align: center;">{{ $company->address }} <br>
										 {{ $company->phone }}</p></td>

							</tr>  	 			

							<tr style="border: none !important;">
								<td colspan="5" style="border: none !important;"><p style="text-align: center;font-weight: bold;">Informe desde {{ date('j M Y',strtotime($start_date)) }} A {{ date('j M Y',strtotime($end_date)) }}</p></td>

							</tr>
							<tr>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Importe total de Venta</th>
								<th>Importe total de compra</th>
								<th>Ganancias</th>
							
							</tr>
						</thead>


						<tbody>
							<?php
							$total_quantity = 0;
							$total_buy_price = 0;
							$total_sold_price  = 0;
							$total_discount  = 0;
							?>
							@foreach($data as $value)

							<?php 
							$total_quantity += $value->total_quantity;
							$total_buy_price += $value->total_buy_price;
							$total_sold_price += $value->total_sold_price;
							?>
							<tr>

								<td>{{ $value->product->product_name }}</td>
								<td>{{ $value->total_quantity }}</td>
								<td>{{ $value->total_sold_price }}</td>
								<td>{{ $value->total_buy_price }}</td>
							
								<td>{{ $value->total_sold_price - $value->total_buy_price }}</td>
								
							</tr>
							@endforeach

							<tr>
								<th style="text-align: right;">Total =</th>
								<th>{{ round($total_quantity) }}</th>
								<th>{{ round($total_sold_price) }}</th>
								<th>{{ round($total_buy_price) }}</th>
								<th>{{ round($total_sold_price-$total_buy_price) }}</th>
							
							</tr>


						</tbody>
					</table>
				</div>


			</div>


		</div>
	</div>
</div>




@endsection

