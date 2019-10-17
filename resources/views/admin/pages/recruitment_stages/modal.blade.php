<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mdl-insert-update" aria-hidden="true" id="mdl-insert-update">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="card">
				<div class="card-body">
				<h4 class="card-title"><span id="title-modal">  </span></h4>
					<form class="forms-sample" id="frm-insert" action="" method="">
						@csrf
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Name</label>
							<div class="col-sm-9 input-wrapper">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name">
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">PIC</label>
							<div class="col-sm-9 input-wrapper">
								<div class="form-check">
		                            <label class="form-check-label">
		                              	<input type="radio" class="form-check-input" name="by_vendor" id="radioVendor" value="1">
		                              	Vendor
		                            </label>
	                          	</div>
	                          	<div class="form-check">
	                            	<label class="form-check-label">
	                              		<input type="radio" class="form-check-input" name="by_vendor" id="radioInternal" value="0" checked>
	                              		Internal
	                            	</label>
	                          	</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="name" class="col-sm-3 col-form-label">Note</label>
							<div class="col-sm-9 input-wrapper">
								<textarea name="note" id="note" rows="5" class="form-control"></textarea>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-white-text" id="add-new-btn">Submit</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</form>
				</div>
			</div>
    	</div>
	</div>
</div>