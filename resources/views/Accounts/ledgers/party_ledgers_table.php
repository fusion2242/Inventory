					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title center">Party Ledgers</h5>
						</div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Sno.</th>
										<th>Date</th>
										<th>Narration</th>
										<th>Debit</th>
										<th>Credit</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$i=1;
								foreach ($data as $value) : ?>

									<tr>
										<td><?=$i++?></td>
										<td><?=$value->date;?></td>
										<td><?=$value->narration;?></td>
										<td class="debit">	
										<?php 
											if($value->type == 'debit'){
												echo $value->amount;
											}
										?>
										</td>
										<td class="credit">
										<?php 
											if($value->type == 'credit'){
												echo $value->amount;
											}
										?>											
										</td>
									</tr>
								<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th></th>
										<th></th>
										<th></th>
										<th>Closing Balance</th>
										<th></th>
										<th id="total"></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>					


<script type="text/javascript">
	$(function(){
		var credit = 0;
		var debit = 0;
		var ClosingBalance = 0;

		$('tr').find('.debit').each(function(){
			var totalDebit = $(this).text();
	        if (!isNaN(totalDebit) && totalDebit.length !== 0) {
            	 debit += parseInt(totalDebit);
         	}
		}); .
		$('tr').find('.credit').each(function(){
			var totalCredit = $(this).text();
	        if (!isNaN(totalCredit) && totalCredit.length !== 0) {
            	 credit += parseInt(totalCredit);
         	}
		});



		if(credit > debit){
			ClosingBalance = credit - debit;
		}else{
			ClosingBalance = debit - credit;
		}

				alert(credit);
		alert(debit);
		alert(ClosingBalance);

		$('#total').text(ClosingBalance);

	});
 

</script>					