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
    <h2 style="text-align: center">Dealer Name:- {{ $customerName->customer_name }}</h2>
    <h4 style="text-align: center">Dealer Mobile Number:- {{ $customerName->customer_mobile }}</h4>
    <h4 style="color: black; padding-bottom: 0; text-align: center;">
	  <strong>Dealer  
       <span style="color: red">( {{ date('d-m-Y', strtotime($start_date)) }}</span> 
       Date To <span style="color: red">{{ date('d-m-Y', strtotime($end_date)) }} )</span> Date Amount 
	</strong>
	</h4>
<table border="1" width="100%" style="text-align: center;">
	<thead>
		<tr>
			<td>Date</td>
			<td>Bottle Quantity</td>
            <td>Bottle Rate</td>
            <td>Old Due</td>
            <td>Cash In</td>
            <td>Due Amount</td>
            <td>Total Amount</td>
		</tr>
	</thead>
	<tbody>
		@foreach($delarReports as $row)
		<tr>
			<td>{{ date('d-m-Y', strtotime($row->date)) }}</td>
            <td>{{ $row->water_quantity }}</td>
            <td>{{ $row->water_price }} TK</td>
            <td>{{ $row->old_due }} TK</td>
            <td>{{ $row->paid_amount }} TK</td>
            <td>{{ $row->due_amount }} TK</td>
            <td>{{ $row->total_amount }} TK</td>
		</tr>
		@endforeach
		<tr>
            <td></td>
            <td style="text-align: right; color:green;">Total Bottle:- {{ $delarWaterQ }}</td>
            <td></td>
            <td style="color:green;">Old Due:- {{ $oldDue }}</td>
            <td style="color:green;">CashIn:- {{ $delarPaidAmount }} TK</td>
            <td style="color:green;">Due:- {{ $delarDueAmount }} TK</td>
			<td style="color:green;">Total:- {{ $delarTotalAmount }} TK</td>
		</tr>
		<tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="color:green;">NewDue:- {{ $delarNewDue }} TK</td>
			<td></td>
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