@extends('include.master')


@section('title','Inventory | Reporte de Facturas')


@section('page-title','Reporte de Facturas')


@section('content')




<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					
				Reporte de Facturas
					
				</h2>

						<h2 class="pull-right">
					
			<a href="{{ url('print-report') }}?type={{ $type }}&start_date={{ $start_date }}&end_date={{ $end_date }}&category_id={{ $category_id }}&product_id={{ $product_id }}&stock_id={{ $stock_id }}&vendor_id={{ $vendor_id }}&customer_id={{ $customer_id }}&user_id={{ $user_id }}" target="_blank" type="button" class="btn bg-teal btn-circle waves-effect waves-circle waves-float">
                               <i class="material-icons">print</i>
                                     </a>
					
				</h2>
			</div>


			<div class="body">

				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<td colspan="8" style="border: none !important;">
									<h3 style="text-align: center;">{{ $company->name }}</h3>
								</td>

							</tr>		

							<tr style="border: none !important;">
								<td colspan="8" style="border: none !important;">
									<p style="text-align: center;">{{ $company->address }} <br>
										 {{ $company->phone }}</p></td>

							</tr>  				

							<tr style="border: none !important;">
								<td colspan="8" style="border: none !important;"><p style="text-align: center;font-weight: bold;">Informe desde {{ date('j M Y',strtotime($start_date)) }} A {{ date('j M Y',strtotime($end_date)) }}</p></td>

							</tr>
							<tr>
							    <th>Factura No.</th>
								<th>Fecha Factura</th>
								<th>Cliente</th>
								<th>Vendedor</th>
								<th>Detalles</th>
								<th>Importe Total</th>
								<th>Importe Pagado</th>
								<th>Deuda</th>
							</tr>
						</thead>
						

						<tbody>
							<?php
							$total_amount = 0;
							$total_paid  = 0;
							$total_discount  = 0;
							?>
							@foreach($data as $value)

							<?php 
							$total_amount += $value->total_amount;
							$total_paid += $value->paid_amount;
							?>
							<tr>

								<td>{{ $value->id }}</td>
								<td>{{ date("j M Y", strtotime($value->sell_date) ) }}</td>
								<td>{{ $value->customer->customer_name }}</td>
								<td>{{ $value->user->name }}</td>
								<td><a href="{{ route('invoice.show',$value->id) }}" target="_blank" type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                                         <i class="material-icons">print</i>
                                     </a></td>
								<td>{{ $value->total_amount }}</td>
								<td>{{ $value->paid_amount }}</td>
								<td>{{ $value->total_amount - $value->paid_amount }}</td>
							</tr>
							@endforeach

							<tr>
								<th colspan="5" style="text-align: right;">Total =</th>
								<th >{{ round($total_amount) }}</th>
								<th >{{ round($total_paid) }}</th>
								<th >{{ round($total_amount-$total_paid) }}</th>
							</tr>

							
						</tbody>
					</table>
				</div>
				

			</div>


		</div>
	</div>
</div>




@endsection

