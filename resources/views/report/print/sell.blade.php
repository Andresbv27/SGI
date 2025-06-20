<!DOCTYPE html>
<html>
<head>
	<title>Reporte de Ventas</title>
	<link href="{{ url('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
   <div class="container">
   	 <div class="row">
   	 								<table class="table table-bordered table-condensed">
						<thead>
							<tr>
								<td colspan="11" style="border: none !important;">
									<h3 style="text-align: center;">{{ $company->name }}</h3>
								</td>

							</tr>		

							<tr style="border: none !important;">
								<td colspan="11" style="border: none !important;">
									<p style="text-align: center;">{{ $company->address }} <br>
										 {{ $company->phone }}</p></td>

							</tr>  	  			

							<tr style="border: none !important;">
								<td colspan="11" style="border: none !important;"><p style="text-align: center;font-weight: bold;">Informe desde {{ date('j M Y',strtotime($start_date)) }} A {{ date('j M Y',strtotime($end_date)) }}</p></td>

							</tr>
							<tr>
							<th>Producto</th>
								<th>Comprobante</th>
								<th>Fecha Venta</th>
								<th>Cliente</th>
								<th>Vendedor</th>
								<th>Cantidad</th>
								<th>Precio Compra Unit.</th>
								<th>Precio Venta Unit.</th>
								<th>Descuento Importe</th>
								<th>Importe total Compras</th>
								<th>Importe total Ventas</th>
							
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
							$total_quantity += $value->sold_quantity;
							$total_buy_price += $value->total_buy_price;
							$total_sold_price += $value->total_sold_price;
							$total_discount += $value->discount_amount;
							?>
							<tr>

								<td>{{ $value->product->product_name }}</td>
								<td>{{ $value->chalan_no }}</td>
								<td>{{ date("j M Y", strtotime($value->selling_date) ) }}</td>
								<td>{{ $value->customer->customer_name }}</td>
								<td>{{ $value->user->name }}</td>
								<td>{{ $value->sold_quantity }}</td>
								<td>{{ $value->buy_price }}</td>
								<td>{{ $value->sold_price }}</td>
								<td>{{ $value->discount_amount }}</td>
								<td>{{ $value->total_buy_price }}</td>
								<td>{{ $value->total_sold_price }}</td>
								
							</tr>
							@endforeach

							<tr>
								<th colspan="5" style="text-align: right;">Total =</th>
								<th >{{ round($total_quantity) }}</th>
								<th ></th>
								<th ></th>
								<th >{{ round($total_discount) }}</th>
								<th >{{ round($total_buy_price) }}</th>
								<th >{{ round($total_sold_price) }}</th>
							
							</tr>


						</tbody>
					</table>
   	 </div>
   </div>
   <script type="text/javascript">
   	 window.print();
   </script>
</body>
</html>