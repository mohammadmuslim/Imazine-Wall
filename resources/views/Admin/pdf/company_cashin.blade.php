<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
</head>
<body>
	<h2 style="text-align:center; color: #4e73df; padding-bottom: 5px; margin-left: 20px;" class="text-primary"><strong>Rusha Drinking Water</strong></h2>
	<h5 style="text-align: center; color: black; padding-bottom: 0">
	  <strong>shop owner number:- 01644645165</strong>
	</h5>
    <hr style="padding-bottom: 0px;">
    <h4 style="color: black; padding-bottom: 0">
	  <strong>Company  
       <span style="color: red">( {{ date('d-m-Y', strtotime($start_date)) }}</span> 
       Date To <span style="color: red">{{ date('d-m-Y', strtotime($end_date)) }} )</span> Date Cash In 
	</strong>
	</h4>
<table border="1" width="100%" style="text-align: center;">
	<thead>
		<tr>
			<td>Serial</td>
			<td>Date</td>
			<td>Cash In</td>
		</tr>
	</thead>
	<tbody>
		@foreach($companyCashins as $key => $row)
		<tr>
			<td>{{ $key+1 }}</td>
			<td>{{ date('d-m-Y', strtotime($row->date)) }}</td>
			<td>{{ $row->today_cach_in }}  TK</td>
		</tr>
		@endforeach
		<tr>
			<td style="text-align: right; color:green;" colspan="2">Total CashIn:-</td>
			<td style="color:green;">{{ $companyCashinTotal }}  TK</td>
		</tr>
	</tbody>
</table>
@php 
$date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
@endphp
<br>
<strong>
	Printing Time:- {{ $date->format('F j, Y, g:i a') }}
</strong>
<hr>
<table width="100%">
	<tbody>
		<tr>
			<td style="text-align: right;">Owner Signature</td>
		</tr>
	</tbody>
</table>
</body>
</html>